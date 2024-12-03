<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($role === 'siswa' && $user->role !== 'siswa') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        if ($role === 'pengajar' && $user->role !== 'pengajar') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }


        return $next($request);
    }
}
