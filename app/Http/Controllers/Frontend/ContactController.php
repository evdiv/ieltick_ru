<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MessageSent;
use Session;


class ContactController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('frontend.contact');
    }    


    public function store(Request $request)
    {

        // Honey Pot
        if ($request->fullname || $request->phone || $request->website) {
            Session::flash('success', 'Ваше сообщение успешно отправлено.');

            return redirect()->back()->withSuccess('Your form has been submitted'); 
        }

        if(auth()->user()) {
            $validated = request()->validate([
                'message' => 'required|min:10'
            ]);

            Message::create([
                'name' => auth()->user()->name, 
                'email' => auth()->user()->email, 
                'message' => request('message')
            ]);

        } else {
            $validated = request()->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'message' => 'required|min:10'

            ]);

            Message::create($validated);
        }

        $validated['name'] = empty($validated['name']) ? auth()->user()->name : $validated['name'];
        $validated['email'] = empty($validated['email']) ? auth()->user()->email : $validated['email'];        

        Mail::to(config('mail.admin'))->send(
            new MessageSent($validated)
        );

        Session::flash('success', 'Ваше сообщение успешно отправлено. Спасибо за подготовку к IELTS Speaking вместе с нами.');
        return view('frontend.contact');
    }
}
