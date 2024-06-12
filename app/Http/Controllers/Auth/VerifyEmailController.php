<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function index() 
    {
        return view('auth.verify-email.index');
    }

    public function send(Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Ссылка для подтверждения отправлена!');
    }

    public function verify(EmailVerificationRequest $request) 
    {
        $request->fulfill();
        return redirect()->intended('/');
    }
}
