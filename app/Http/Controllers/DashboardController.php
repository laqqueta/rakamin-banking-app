<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as auth_user, App\Models\User as user;

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
            'outcome' => $this->getUserOutcome($accountId),
            'income' => $this->getUserIncome($accountId),
        );

        return view('dashboard', compact('data'));
    }

    private function getAccountBalanceDetail($accountId) {
        return auth_user::query()
            ->find($accountId, ['account_name', 'balance']);
    }

    private function getUserIncome($accountId) {
        $user = user::query()->findOrFail($accountId); // sender

        $income = 0;

        foreach ($user->transfer as $transfer) {
            $income += $transfer->pivot->amount;
        }

        return $income;
    }

    private function getUserOutcome($accountId) {
        $transferIds = Transfer::query()
            ->where('user_id', '=', $accountId)
            ->get('id');

        $outcome = 0;

        foreach ($transferIds as $TransferItem) {
            $transferAmount = Transfer::query()
                ->findOrFail($TransferItem->id);

            foreach ($transferAmount->user as $item) {
                $outcome += $item->pivot->amount;
            }
        }

        return $outcome;
    }
}
