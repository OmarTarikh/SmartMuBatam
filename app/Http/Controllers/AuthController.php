<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Halaman login
    public function index()
    {
        // Jika sudah login jangan kembali ke login
        if (Auth::check()) {

            switch (Auth::user()->role) {

                case 'superadmin':
                    return redirect('/dashboard');

                case 'cabang':
                    return redirect('/organisasi/cabang');

                case 'ranting':
                    return redirect('/organisasi/ranting');

                case 'aum':
                    return redirect('/unit-lembaga/aum/sekolah');

                case 'masjid':
                    return redirect('/unit-lembaga/masjid');

                case 'keuangan':
                    return redirect('/keuangan');
            }
        }

        return view('auth.login');
    }


    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            switch (Auth::user()->role)
            {
                case 'superadmin':
                    return redirect('/dashboard');

                case 'cabang':
                    return redirect('/organisasi/cabang');

                case 'ranting':
                    return redirect('/organisasi/ranting');

                case 'aum':
                    return redirect('/unit-lembaga/aum/sekolah');

                case 'masjid':
                    return redirect('/unit-lembaga/masjid');

                case 'keuangan':
                    return redirect('/keuangan');

                default:

                    Auth::logout();

                    return redirect('/login')
                        ->with('error','Role tidak dikenali');
            }
        }

        return back()
            ->with('error','Email atau password salah');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}