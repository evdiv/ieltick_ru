<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Services\SubscriptionService;
use App\Services\LessonService;
use App\Mail\ExamPurchased;
use App\Mail\EvaluationPurchased;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaypalController extends Controller
{
    private $_api_context;
    private $subscriptionService;
    private $lessonService;

    public function __construct(SubscriptionService $subscriptionService, LessonService $lessonService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->lessonService = $lessonService;

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function pay(Request $request)
    {
        //Get the product data
        $productId = request('productId');
        $productType = request('productType');
        $productTitle = "IELTS Speaking Обучающие экзамены";
        $productDescription = "IELTS Speaking Обучающие экзамены";
        $productPrice =  env('EVALUATION_COST');


        if($productType == 'subscription'){
            $subscription = $this->subscriptionService->getById($productId);

            if(!$this->subscriptionService->hasAvailableExams($productId)) {
                return back()->withErrors('Эта подписка не доступна на данный момент');
            }

            $productTitle = $subscription->title;
            $productPrice = $subscription->price;
            $productDescription = $subscription->description;
        }


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($productTitle) /** item name **/
            ->setCurrency('RUB')
            ->setQuantity(1)
            ->setPrice($productPrice); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('RUB')
            ->setTotal($productPrice);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($productDescription);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status/' . $productType . '/' . $productId)) /** Specify return URL **/
            ->setCancelUrl(URL::to('status/' . $productType . '/' . $productId));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                Session::flash('error', 'Connection timeout');
                return back();
            } else {
                Session::flash('error', 'PayPal Payment failed');
                return back();
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::flash('error', 'PayPal Payment failed');
        return back();
    }


    public function status($productType, $productId)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::flash('error', 'PayPal Payment failed');
            return back();
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        $user = auth()->user();
        
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            if($productType == 'evaluation') {
                Session::flash('success', 'Спасибо за оплату. Ваши записи были отправлены на оценку. <br/>
                                            <br/>Оценка занимает примерно 24 часа, 
                                            после её завершения отчёт будет доступен для скачивания.');

                $this->lessonService->sendForEvaluation($productId);
                $order = $this->lessonService->store($productId);
                
                \App\Models\Transaction::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'amount' => env('EVALUATION_COST'),
                    'complete' => 1
                ]);
                Mail::to($user->email)->send(
                    new EvaluationPurchased($user)
                );
                
                Mail::to(config('mail.admin'))->send(
                    new EvaluationPurchased($user)
                );                

            } else {
                Session::flash('success', 'Спасибо за оплату. IELTS Speaking Обучающие экзамены доступны для использования!');

                $subscription = $this->subscriptionService->getById($productId);
                $order = $this->subscriptionService->store($productId);

                \App\Models\Transaction::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'amount' => $subscription->price,
                    'complete' => 1
                ]);

                Mail::to($user->email)->send(
                    new ExamPurchased($user)
                );

                Mail::to(config('mail.admin'))->send( 
                    new ExamPurchased($user)
                );                
            }

            
            return Redirect::to('/lessons');
        }
        Session::flash('error', 'PayPal Payment failed');
        return back();
    }
}