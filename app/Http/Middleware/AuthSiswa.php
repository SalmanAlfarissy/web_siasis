<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class AuthSiswa
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (empty(session('siswa.id'))){
            return redirect('siswa/login');
        }

        return $next($request);
    }
}
