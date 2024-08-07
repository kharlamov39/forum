<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('/register')->middleware('guest')->group( function() {
    Route::get('', [RegisterController::class, 'index'])->name('register.index');
    Route::post('', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('login.logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('forgot-password.create');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('forgot-password.store');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.reset.store');


Route::get('/email/verify', [VerifyEmailController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::post('/email/verify', [VerifyEmailController::class, 'send'])->middleware('auth')->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/users', [UsersController::class, 'index'])->middleware('admin')->name('users.index');
Route::delete('/users/{id}', [UsersController::class, 'delete'])->middleware('admin')->name('users.delete');

Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topics/create', [TopicController::class, 'create'])->middleware('auth')->name('topics.create');
Route::post('/topics/create', [TopicController::class, 'store'])->middleware('auth')->name('topics.store');
Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topics.show');

Route::post('/topics/{topicId}', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/topics/{topicId}/comments{commentId}', [CommentController::class, 'delete'])->middleware('admin')->name('comment.delete');


Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');