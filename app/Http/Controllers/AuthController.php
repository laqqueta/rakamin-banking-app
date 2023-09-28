<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi'
        ]);

        $LoginInfo = [
            'email' => $request->email,
            'password' => $request->password
        ];

        session()->put([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // dd(session()->all());
        // dd("testing");

        if (Auth::attempt($LoginInfo)) {
            return redirect('/dashboard')->with('success', 'Login Success');
        } else {
            return redirect('login')->withErrors('Username & Password Yang Dimasukkan Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
