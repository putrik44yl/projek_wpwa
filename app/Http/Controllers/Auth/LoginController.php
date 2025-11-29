<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect setelah login berdasarkan role user.
     */
    protected function redirectTo()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return '/admin/dashboard';
        }

        if ($role === 'pengurus') {
            return '/pengurus/dashboard';
        }

        if ($role === 'anggota') {
            return '/anggota/dashboard';
        }

        // default kalau role tidak dikenal
        return '/home';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
