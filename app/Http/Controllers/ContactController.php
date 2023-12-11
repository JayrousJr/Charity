<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/site/contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|string|mix:6|max:255',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:3|max:1500',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/site/contact#sendmessage')->withErrors($validator)->withInput();
        } else {
            $inputs = new Message();

            $inputs->name = request()->name;
            $inputs->email = request()->email;
            $inputs->message = request()->message;
            $inputs->subject = request()->subject;

            $inputs->save();

            // Including the Email sending here
            // Mail::to($mailto)->send(new MessageEmail($formData));
            // Mail::to($formData->email)->send(new MessageEmailFeedback($formData));

            session()->flash('success', 'Your Message Has Been Sent Successiful!');
            return redirect('/site/contact');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
