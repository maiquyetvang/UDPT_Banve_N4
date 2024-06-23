<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmineventController extends Controller
{
    //
    public function showSignUpForm()
    {
        return view('adminevents.signup');
    }
}