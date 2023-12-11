<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    function store(Request $request, Volunteer $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:30'],
            // 'catogory' => ['required'],
            'email' => ['required', 'email', 'max:255', Rule::unique('volunteers')->ignore($user->id)],
            'inspiration_words' => ['required', 'string', 'max:1000', 'min:3'],
        ];
        $messages = [
            'inspiration_words.required' => 'Please Leave some inspiration Words before you submit this form!',
            // 'catogory.required' => 'Please Select the Volunteer Category you want to be!',
            'inspiration_words.min' => 'Atleast 50 Characters can be typed in',
            'inspiration_words.max' => 'Do not exceed 1000 Characters',
            'email.unique' => 'The Volunteer  with this details already exist or you are already a volunteer',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // return redirect('/#volunteer')->withErrors($validator)->withInput();
            return redirect('/#volunteer')->withErrors($validator)->withInput();
        } else {
            $input = new Volunteer();

            $input->name = request()->name;
            $input->user_id = request()->user_id;
            $input->email = request()->email;
            $input->category = request()->category;
            $input->inspiration_words = request()->inspiration_words;



            $user = User::find(auth()->user()->id);
            $user->is_volunteer = 1;
            $user->volunteer_category = request()->category;
            $user->role = 'Volunteer';


            // saving data to model
            $input->save();
            $user->save();

            // Including the Email sending here
            // Mail::to($mailto)->send(new MessageEmail($formData));
            // Mail::to($formData->email)->send(new MessageEmailFeedback($formData));

            session()->flash('success', 'you have Successiful become a volunteer!');
            return redirect()->route('home');
        }
    }
}
