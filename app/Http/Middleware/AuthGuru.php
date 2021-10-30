<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class AuthGuru
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (empty(session('guru.id'))){
            return redirect('staf/login');
        }

        return $next($request);
    }
}
