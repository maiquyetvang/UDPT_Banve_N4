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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmineventController;
use App\Http\Controllers\AdminController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
    Route::get('choose-registration', [AuthController::class, 'showRegistrationChoice'])->name('choose.registration');
    Route::get('/user-signup', [UserController::class, 'showSignUpForm'])->name('user.signup');
    Route::post('/signup', [UserController::class, 'signUp'])->name('signup.post');
    Route::get('/eadmin-signup', [AdmineventController::class, 'showSignUpForm'])->name('eadmin.signup');
    Route::post('/ea_signup', [AdmineventController::class, 'signUp'])->name('eadmin_signup.post');
    Route::get('/eadmin-signup/policy', [AdmineventController::class, 'policy'])->name('eadmin.policy');
    
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User
Route::middleware(['checkRole:CUSTOMER'])->group(function () {
    Route::get('/profile', [UserController::class, 'getProfile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('user.updateprofile');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.changepass');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change');
    Route::get('/event/find', [EventController::class, 'find'])->name('event.find');
    Route::get('/event/hot', [EventController::class, 'hot'])->name('event.hot');
});

// Event Admin
Route::middleware(['checkRole:EVENT_ADMIN'])->group(function () {
    Route::get('/eadmin', [AdmineventController::class, 'index'])->name('eadmin.home');
    Route::get('/eadmin/profile', [AdmineventController::class, 'getProfile'])->name('eadmin.profile');
    Route::post('/eadmin/profile', [AdmineventController::class, 'updateProfile'])->name('eadmin.updateprofile');
    Route::get('/eadmin/change-password', [AdmineventController::class, 'showChangePasswordForm'])->name('eadmin.changepass');
    Route::post('/admin/change-password', [AdmineventController::class, 'changePassword'])->name('password.change');
    Route::get('/eadmin/contract', [AdmineventController::class, 'contract'])->name('eadmin.contract');
});

// Admin
Route::middleware(['checkRole:ADMIN'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/customers', [AdminController::class, 'getAllCustomer'])->name('customers.list');
    Route::get('admin/customers/{username}', [AdminController::class, 'getCustomerByUsername'])->name('admin.customers.show');
    Route::get('admin/event-admins', [AdminController::class, 'getAllAdminevent'])->name('admin.event-admins');
    Route::get('/admin/event-admins/{username}', [AdminController::class, 'getAdmineventByUsername'])->name('admin.adminevent.detail');
    Route::get('/admin/pending-eadmin', [AdminController::class, 'getPendingEventAdmin'])->name('admin.pending-eadmin');
    Route::post('admin/eventadmin/reject/{username}', [AdminController::class, 'rejectEventAdmin'])->name('admin.eventadmin.reject');
    Route::post('admin/eventadmin/approve/{username}', [AdminController::class, 'approveEventAdmin'])->name('admin.eventadmin.approve');
});