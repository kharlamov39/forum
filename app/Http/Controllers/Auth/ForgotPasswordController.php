<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create() 
    {
        return view('auth.forgot-password.index');
    }

    public function store(Request $request) 
    {
        $request->validate(
            [
                'email' => ['required', 'email']
            ], 
            [
                'email.required' => 'Поле email обязательно для заполнения.',
                'email.email' => 'Поле email должно быть действительным адресом электронной почты.',
            ]
        );

        $status = Password::sendResetLink(
            $request->only('email')
        );

        
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Письмо для сброса пароля успешно отправлено');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email'=> 'Данный email не найден']);
    }

}
