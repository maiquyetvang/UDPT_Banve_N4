<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập.');
        }

        if ($user['role'] !== $role) {
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