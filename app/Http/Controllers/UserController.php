<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->put('user_id', Auth::id());

            return redirect('/dashboard');
        } else {
            return redirect('/login')->withErrors(['email' => 'Email atau password salah.']);
        }
    }

    public function logout(Request $request)
    {

        $request->session()->forget('user_id');

        return redirect('/login');
    }

    // public function editProfile()
    // {
    //     // Tampilkan halaman edit profil
    //     return view('profile.edit');
    // }

    // public function updateProfile(Request $request)
    // {
    //     // Logika untuk menyimpan perubahan profil
    // }

    // public function showBalance()
    // {
    //     // Ambil saldo pengguna dari database
    //     $user = Auth::user();
    //     $balance = $user->accounts()->sum('balance');
    //     return view('profile.balance', compact('balance'));
    // }
}
