<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Message;
use App\Models\SocialNet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    function index()
    {
        $address = About::whereIn('id', ['1'])->get();
        $social = SocialNet::all();
        return view('/site/contact', compact('address', 'social'));
    }

    function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:255', 'min:5'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'message' => ['required', 'string', 'max:1500', 'min:50'],
        ];

        $messages = [
            'name.required' => 'Please Enter Your Names',
            'email.required' => 'Please Enter email',
            'subject.required' => 'Please type in the Message Subject',
            'message.required' => 'Please type in the Message',
            'subject.max' => 'Make subject simple, don\'t exceed 255 characters',
            'message.max' => 'Message must not exceed 1500 characters',
            'subject.min' => 'Subject must atleast have 5 characters',
            'message.min' => 'Message must atleast have 50 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('contact#message')->withErrors($validator)->withInput();
        } else {

            $formData = new Message();
            $formData->name = request()->name;
            $formData->subject = request()->subject;
            $formData->message = request()->message;
            $formData->user_id = request()->user_id;
            $formData->email = request()->email;

            $formData->save();

            session()->flash('message', 'Thanks for Contacting us, Your Message was Sent Successiful!');

            // Including the Email sending here
            // Mail::to($mailto)->send(new MessageEmail($formData));
            // Mail::to($formData->email)->send(new MessageEmailFeedback($formData));

            session()->flash('success', 'Your Message Has Been Sent Successiful!');
            return redirect()->route('contact.index');
        }
    }
}
