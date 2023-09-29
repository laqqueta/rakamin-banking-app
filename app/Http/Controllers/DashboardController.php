<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan ID akun dari session
        $accountId = $request->session()->get('id');
        $users = User::find($accountId);

        // Mengambil objek akun berdasarkan ID
        // $users = User::findOrFail($accountId);

        // Mengambil objek akun berdasarkan ID
        // @dd($accountId);
        // @dd(session()->all());
        
        // Sekarang Anda dapat mengakses properti objek pengguna, seperti nama atau email
        $name = $users->account_name;
        $account_address = $users->account_address;
        $email = $users->email;
        $phone_number = $users->phone_number;
        $balance = $users->balance;


        return view('dashboard', compact('users'));
    }
}
