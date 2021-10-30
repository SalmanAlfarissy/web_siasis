<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class AuthAdmin
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (empty(session('admin.id'))){
            return redirect('staf/login');
        }

        return $next($request);
    }
}
