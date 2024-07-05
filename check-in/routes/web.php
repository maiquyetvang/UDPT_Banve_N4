<?php

use Illuminate\Support\Facades\Route;

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





Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/events/show-check-in', [EventController::class, 'showCheckIn'])->name('events.showCheckIn');
Route::get('/events/check-in', [EventController::class, 'checkIn'])->name('events.checkIn');
Route::post('/events/process-check-in', [EventController::class, 'processCheckIn'])->name('events.processCheckIn');