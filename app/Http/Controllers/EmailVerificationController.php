<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{


    public function send()
    {


        if (Auth::user()->hasVerifiedEmail())
        {
            return redirect()->route('home');
        }
        Auth::user()->sendEmailVerificationNotification();
       return back()->with('verificationEmailSent',true);
    }

    public function verify(Request $request)
    {

        if ($request->user()->hasVerifiedEmail())
        {
            return redirect()->route('home');
        }
        $request->user()->markEmailAsVerified();
        return redirect()->route('home')->with('emailHasVerify',true);
    }
}
