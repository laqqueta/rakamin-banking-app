<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = DB::table('users', 'u')
            ->join('transfer_detail', 'u.id', '=', 'transfer_detail.user_id')
            ->join('transfer', 'transfer.id', '=', 'transfer_detail.transfer_id')
            ->where('transfer.user_id', '=', $request->session()->get('id'))
            ->get(['u.account_name', 'u.phone_number', 'u.email',
                'transfer_detail.amount', 'transfer_detail.date', 'transfer_detail.time']);

        \Laravel\Prompts\info($data);

        return view('history', compact('data'));
    }
}
