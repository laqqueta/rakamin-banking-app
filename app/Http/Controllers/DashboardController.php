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

        // @dd($accountId);
        // @dd(session()->all());

        $name = $users->account_name;
        $account_address = $users->account_address;
        $email = $users->email;
        $phone_number = $users->phone_number;
        $balance = $users->balance;

        return view('dashboard', compact('users'));
    }
    public function indexLayout(Request $request)
    {
        // Mendapatkan ID akun dari session
        $accountId = $request->session()->get('id');
        $users = User::find($accountId);

        // @dd($accountId);
        // @dd(session()->all());

        $name = $users->account_name;
        $account_address = $users->account_address;
        $email = $users->email;
        $phone_number = $users->phone_number;
        $balance = $users->balance;

        return view('profile-editsuccess/{$accountId}', compact('users'));
    }
}
