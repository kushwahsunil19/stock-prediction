<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_type == 'superadmin') {
            return $next($request);
        } else {
            return Redirect('admin/accounts')->with('error', 'You are not authorized to access this page.');
        }
        // Redirect or return error
    }
}
