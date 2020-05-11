<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Services\ExamService;
use App\Models\Subscription;
use App\Models\Order;
use App\Models\Lesson;

class SubscriptionService
{

    private $examService;


    public function __construct(ExamService $examService) 
    {
        $this->examService = $examService;     
    }


    public function getAll() 
    {
        //dd(config('app.register_for_demo'));

        if (auth()->guest() && config('app.register_for_demo')) {
            return $this->getForGuest();
        } 
        return $this->getForRegistered();
    }


    public function getById($id) 
    {   
        return Subscription::findOrFail($id);
    }    


    public function hasAvailableExams($id) 
    {
        $subscription = $this->getById($id);

        return count($this->examService->getAvailable()) >= $subscription->exams;
    }


    public function store($id)
    {
        $subscription = $this->getById($id);

        $order = Order::create([
            'user_id' => auth()->id(),
        ]);

        while($subscription->exams--) {
            Lesson::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'exam_id' => $this->examService->getAvailable()[0]->id
            ]);
        }

       return $order;
    }

    public function storeDemo()
    {
        $order = Order::create([
            'user_id' => auth()->id(),
        ]);

        Lesson::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'exam_id' => 1
        ]);
    }


    private function getForGuest() 
    {
        return Subscription::where('active', 1)
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
    }


    public function getForRegistered() 
    {
        return Subscription::where('active', 1)
                        ->where('price', '>', 0)
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
    }
}