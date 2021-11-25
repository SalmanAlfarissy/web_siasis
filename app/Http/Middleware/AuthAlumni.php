<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class AuthAlumni
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (empty(session('alumni.id'))){
            return redirect('siswa/login');
        }

        return $next($request);
    }
}
