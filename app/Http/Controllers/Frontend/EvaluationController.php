<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Services\PaymentService;
use App\Models\Evaluation;
use App\Mail\EvaluationPurchased;
use Illuminate\Support\Facades\Mail;
use Session;

class EvaluationController extends Controller
{
    public function __construct(LessonService $lessonService, PaymentService $paymentService)
    {
        $this->middleware('auth');
        $this->lessonService = $lessonService;
        $this->paymentService = $paymentService; 
    }


    public function show(Evaluation $evaluation)
    {
        $this->authorize('view', $evaluation);

        return view('frontend.evaluation', compact('evaluation'));
    }


    public function create($id)
    {
        if(!$this->lessonService->canBeEvaluated($id)) {
            return view('frontend.subscription')->withErrors('This exam can not be evaluated at the moment');
        }

        $lesson = $this->lessonService->getById($id);
        $lesson['route'] = 'evaluate';
        $lesson['title'] = 'Send for evaluation ' . $lesson->exam->title;
        $lesson['price'] = env('EVALUATION_COST');

        return view('frontend.evaluate', compact('lesson'));
    }


    public function store()
    {
        $lessonId = request('productId');
        $payment = $this->paymentService->store(request('stripeToken'), env('EVALUATION_COST') * 100);

        if($payment['status'] !== 'success') {
             return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $payment['message']
            ], 422);
        }

        Session::flash('success', 'Thank you. Your Speaking Test has been sent for evaluation successfully!');
        $this->lessonService->sendForEvaluation($lessonId);

        $user = auth()->user();
        
        Mail::to($user->email)->send(
            new EvaluationPurchased($user)
        );

        Mail::to(config('mail.admin'))->send(
            new EvaluationPurchased($user)
        );        

        return response()->json(['status' => 'success'], 200);
    }
}
