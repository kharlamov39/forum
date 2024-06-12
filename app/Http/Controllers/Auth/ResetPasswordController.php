<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
   public function create(Request $request)
   {
      return view('auth.reset-password.index', ['request' => $request]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'token' => ['required'],
         'email' => ['required', 'email'],
         'password' => ['required', 'confirmed', 'min:4']
      ], [
         'email.required' => 'Поле email обязательно для заполнения.',
         'email.email' => 'Поле email должно быть действительным адресом электронной почты.',
         'password.required' => 'Поле пароль обязательно для заполнения.',
         'password.min' => 'Поле пароль должно содержать не менее :min символов.',
         'password.confirmed' => 'Подтверждение пароля не совпадает с паролем.',
      ]);


      $status = Password::reset(
         $request->only('email', 'token', 'password', 'password_confirmation'),
         function($user) use ($request) {
            $user->forceFill([
               'password' => $request->password,
               'remember_token' => Str::random(60)
            ])->save();      
         }
      );

      if ($status == Password::PASSWORD_RESET)  {
         return redirect()->route('login.index')->with('status', 'Пароль был успешно обновлен');
      }

      return back()->withInput($request->only('email'))->withErrors(['email' => 'Не удалось найти пользователя']);


   }

}
