<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi'
        ]);

        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($loginInfo)) {
            // Retrieve the authenticated user's ID
            $userId = Auth::id();

            // Store the user's ID in the session
            session()->put('id', $userId);

            // $accountId = $request->session()->get('id');
            $users = User::find($userId);
            $name = $users->account_name;


            return redirect('/dashboard')->with('success', "Selamat Datang, $name");
        } else {
            return redirect('login')->withErrors('Username/Password Yang Dimasukkan Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
