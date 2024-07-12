<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Pengguna tidak terautentikasi, arahkan ke halaman login
            return redirect()->route('login');
        }

        // Pengguna terautentikasi, lanjutkan permintaan
        $user = Auth::user();

        // Verifikasi peran pengguna dan arahkan sesuai dengan perannya
        switch ($user->role_id) {
            case 1:
                // Role 1: Admin, arahkan ke dashboard admin
                // Lanjutkan permintaan ke middleware selanjutnya
                return $next($request);
                break;
            case 2:
                // Role 2: Pengguna lain, sesuaikan dengan kebutuhan Anda
                // Contoh: arahkan ke dashboard pengguna biasa
                // Lanjutkan permintaan ke middleware selanjutnya
                return $next($request);
                break;
            default:
                // Role lainnya, sesuaikan dengan kebutuhan Anda
                break;
        }
    }
}
