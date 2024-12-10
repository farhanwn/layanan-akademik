<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input dari form login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',  // Menggunakan email
            'password' => 'required|string|min:6',
        ]);

        // Jika validasi gagal, beri tahu pengguna
        if ($validator->fails()) {
            Alert::info('Gagal Login', "Email atau password salah!");
            return redirect()->back()->withInput();
        }

        // Menyiapkan kredensial dari form login
        $credentials = $request->only('email', 'password');  // Menggunakan email
        // Proses login
        if (Auth::attempt($credentials)) {
            // Setelah login berhasil, periksa role dan arahkan ke dashboard yang sesuai
            if (Auth::user()->role === 'superadmin') {
                return redirect(route('admin-dashboard')); // Dashboard untuk superadmin
            }

            if (Auth::user()->role === 'mahasiswa') {
                return redirect(route('mahasiswa-dashboard')); // Dashboard untuk mahasiswa
            }

            if (Auth::user()->role === 'dosen') {
                return redirect(route('dosen-dashboard')); // Dashboard untuk dosen
            }

            if (Auth::user()->role === 'tpa') {
                return redirect(route('tpa-dashboard')); // Dashboard untuk tpa
            }
        }

        // Jika login gagal
        Alert::info('Login failed', "Email atau password salah!");
        return redirect()->back();
    }


    // Fungsi logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
