<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showSignUpForm()
    {
        return view('users.signup');
    }
    public function showProfile()
    {
        
        return view('users.profile');
    }
}