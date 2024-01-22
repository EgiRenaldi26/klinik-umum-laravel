<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $role)
    {
        if(in_array(auth()->user()->role, $role)) {
            return $next($request);
        }

         // Tambahkan kode JavaScript untuk mengarahkan pengguna kembali dan menampilkan pesan alert
            $script = "
            <script>
                alert('Anda Tidak Diperbolehkan Untuk Halaman Ini');
                window.history.go(-1); // Kembali ke halaman sebelumnya
            </script>
        ";

        return response($script);
    }
}