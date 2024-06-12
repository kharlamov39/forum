<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register.index');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed'
        ], 
        [
            'name.required' => 'Поле имя обязательно для заполнения.',
            'name.max' => 'Поле имя должно содержать не более :max символов.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.email' => 'Поле email должно быть действительным адресом электронной почты.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.min' => 'Поле пароль должно содержать не менее :min символов.',
            'password.confirmed' => 'Подтверждение пароля не совпадает с паролем.',
        ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        // event(new Registered($user));

        return redirect()->route('home');
    }
}
