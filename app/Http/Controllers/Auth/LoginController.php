<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\RecaptchaValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() { return view('auth.login'); }

    public function authenticate(Request $request, RecaptchaValidator $captcha)
    {
        $data = $request->validate([
            'email'           => 'required|email',
            'password'        => 'required',
            'recaptcha_token' => 'required',
        ]);

        $captcha->assert($data['recaptcha_token'], 'login');

        if (Auth::guard('agent')->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();
            return redirect()->intended(routeL('commissions'));
        }

        return back()->withErrors(['email' => __('Invalid credentials')]);
    }
}
