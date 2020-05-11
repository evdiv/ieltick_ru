<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\Services\PaymentService;
use App\Models\Transaction;
use App\Mail\ExamPurchased;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Session;

class SubscriptionController extends Controller
{

    private $subscriptionService;
    private $paymentService;  

    public function __construct(SubscriptionService $subscriptionService, PaymentService $paymentService) 
    {
        $this->subscriptionService = $subscriptionService;
        $this->paymentService = $paymentService;   
    }


    public function index()
    {
        $subscriptions = $this->subscriptionService->getForRegistered();
        return view('frontend.subscriptions', compact('subscriptions'));
    }


    public function create($id)
    {
        $subscription = $this->subscriptionService->getById($id);
        $subscription['route'] = 'subscriptions';

        if($this->subscriptionService->hasAvailableExams($id)) {

            return view('frontend.subscription', compact('subscription'));
        }
        
        return view('frontend.subscription', compact('subscription'))->withErrors('Этот пакет экзаменов в данный момент недоступен!');
    }


    public function store()
    {
        $subscriptionId = request('productId');
        $subscription = $this->subscriptionService->getById($subscriptionId);
        $user = auth()->user();

        if(!$this->subscriptionService->hasAvailableExams($subscriptionId)) {
            return view('frontend.subscription', compact('subscription'))->withErrors('Этот пакет экзаменов в данный момент недоступен!');
        }

        $payment = $this->paymentService->store(request('stripeToken'), $subscription->price * 100);

        if($payment['status'] !== 'success') {
            
            Session::flash('error', $payment['message']);

            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $payment['message']
            ], 422);
        }

        Session::flash('success', 'Спасибо за оплату. Подготовительные экзамены к IELTS Speaking добавлены в Ваш аккаунт!');

        $order = $this->subscriptionService->store($subscriptionId);

        Transaction::create([
            'user_id' => auth()->id(),
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


        return response()->json(['status' => 'success'], 200);
    }

}
