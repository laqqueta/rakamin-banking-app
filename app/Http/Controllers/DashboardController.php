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
        $accountId = $request->session()->get('id');
        $balanceDetail = $this->getAccountBalanceDetail($accountId);

        $data = array(
            'name' => $balanceDetail->account_name,
            'balance' => $balanceDetail->balance,
            'outcome' => $this->getOutcome(),
            'income' => $this->getIncome(),
        );

        return view('dashboard', compact('data'));
    }

    private function getAccountBalanceDetail($accountId) {
        return User::query()
            ->find($accountId, ['account_name', 'balance']);
    }

    private function getIncome() {
        return 1000;
    }

    private function getOutcome() {
        return 2000;
    }
}
