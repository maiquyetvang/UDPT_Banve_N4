<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmineventController;
/*Home*/
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Chọn loại đăng ký
Route::get('choose-registration', [AuthController::class, 'showRegistrationChoice'])->name('choose.registration');
Route::get('user-signup', [UserController::class, 'showSignUpForm'])->name('user.signup');
Route::get('admin-signup', [AdmineventController::class, 'showSignUpForm'])->name('admin.signup');

Route::get('profile', [UserController::class, 'showProfile'])->name('profile.show');

Route::get('/event/find', [EventController::class, 'find'])->name('event.find');
Route::get('/event/hot', [EventController::class, 'hot'])->name('event.hot');