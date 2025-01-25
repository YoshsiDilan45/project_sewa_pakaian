<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->check()) {
                $roleId = auth()->user()->role_id;
            
                if ($roleId === 1) {
                    // Jika user adalah superadmin
                    return redirect()->intended('/admin');
                } elseif ($roleId === 2) {
                    // Jika user adalah owner
                    return redirect()->intended('/owner');
                } elseif ($roleId === 3) {
                    // Jika user adalah courier
                    return redirect()->intended('/courier');
                } else {
                    // Jika role tidak dikenali, arahkan ke halaman login
                    return redirect()->route('auth')->with('error', 'Role tidak dikenali.');
                }
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}