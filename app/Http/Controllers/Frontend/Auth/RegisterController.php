<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Services\SubscriptionService;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $user;
    protected $subscriptionService;


    public function __construct(UserRepository $user, SubscriptionService $subscriptionService)
    {
        $this->middleware('guest');
        $this->user = $user;
        $this->subscriptionService = $subscriptionService;
    }


    protected function redirectTo()
    {
        if(config('app.register_for_demo')) {

            //Get Demo Exam after Registration
            $this->subscriptionService->storeDemo();
        }
        
        if(!empty(request('subscription'))) {
            return '/subscriptions/' . request('subscription'); // return dynamicaly generated URL.
        }
        
        return '/lessons';
    }


    public function show()
    {
        return view('frontend.auth.register');
    }


    protected function create(RegisterRequest $request)
    {   
        access()->login($this->user->create($request->only('first_name', 'email', 'password')));
        event(new UserRegistered(access()->user()));

        return redirect($this->redirectTo());
    }
}
