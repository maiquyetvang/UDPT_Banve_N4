<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === strtoupper($role)) {
                return $next($request);
            }

            // Chuyển hướng đến trang chủ của vai trò hiện tại
            if ($user->role === 'CUSTOMER') {
                return redirect()->route('home.index');
            } elseif ($user->role === 'EVENT_ADMIN') {
                return redirect()->route('eadmin.home');
            } elseif ($user->role === 'ADMIN') {
                return redirect()->route('admin.home');
            }
        }

        return redirect()->route('login');
    }
}