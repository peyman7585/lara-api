<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class LoginController extends Controller
{


    public function show()
    {
        return view('auth.login');

    }

    public function store(LoginValidation $request)
    {

      $login=  Auth::attempt($request->only(['email','password']), $request->filled('remember'));
      if ($login)
      {
          session()->regenerate();
          return redirect()->intended();
      }
      return back()->with('failed','نام کاربری یا رمز عبور شما اشتباه است.');
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        redirect()->route('home');
    }
}
