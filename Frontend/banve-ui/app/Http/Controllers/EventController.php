<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function find()
    {
        // Logic for finding events
        return view('events.find');
    }

    public function hot()
    {
        // Logic for hot events
        return view('events.hot');
    }
}