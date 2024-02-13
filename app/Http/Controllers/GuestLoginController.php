<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GuestLoginController extends Controller
{
    public function guest()
    {
        $credentials = ['email' => 'guest@example.com', 'password' => 'Guest-12345-Password'];

        if (Auth::attempt($credentials)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect()->back()->withErrors([
            'email' => 'ゲストログインに失敗しました。'
        ]);  
    }
}