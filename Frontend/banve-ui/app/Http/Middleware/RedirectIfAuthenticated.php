<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $user = Session::get('user');

        if ($user) {
            switch ($user['role']) {
                case 'CUSTOMER':
                    return redirect()->route('home.index');
                case 'EVENT_ADMIN':
                    return redirect()->route('eadmin.home');
                case 'ADMIN':
                    return redirect()->route('admin.home');
            }
        }

        return $next($request);
    }
}