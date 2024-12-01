<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function show(Request $request)
    {
        return view('auth.register');
    }

    public function store(RequestValidation $request)
    {

        $users=User::create([
            'name'=>$request['name'],
           'email'=>$request['email'],
           'password'=>Hash::make($request['password']) ,
           'phone_number'=>$request['phone_number']
        ]);
        Auth::login($users);
        return redirect('/')->with('success','ثبت نام شما با موفقیت انجام شد.');

    }

}
