<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        //Tampilan index di dalam folder auth_manual
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        //Validasi inputan
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255'
        ]);

        //jika lolos validasi
        if (Auth::attempt($credentials)) {
            //buatkan session
            $request->session()->regenerate();

            //di arahkan ke dashboard
            return redirect()->intended(route('admin.index'));
        }

        //jika tidak lolos validasi maka tampil pesan login failed
        return back()->withInput()->with('failed','Login Failed!');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}