<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Throwable;

class TransferController extends Controller
{
    //
    public function index(Request $request)
    {
        $accountId = $request->session()->get('id');
        $users = User::find($accountId);

        $data = array(
            'name' => $users->account_name
        );

        return view('transfer', compact('data'));
    }

    public function transfer(Request $request) {
        $request->validate([
            'email' => 'required',
            'transferAmount' => 'required',
            'pin' => 'required'
        ]);

        $accountId = $request->session()->get('id');

        // validate transfer amount
        $userAccount = User::query()->findOrFail($accountId, ['balance', 'pin']);

        if($userAccount->balance < $request->transferAmount) {
            return to_route('transfer_view')->withErrors('Your balance is less than transfer amount!');
        }

        // validate user pin
        if($request->pin != $userAccount->pin) {
            return to_route('transfer_view')->withErrors("Wrong pin. Please Check again!");
        }

        // validate receiver account whether exist or not
        $receiverAccount = User::query()->where('email', $request->email)->get(['email', 'id']);

        if(sizeof($receiverAccount) < 1) {
            return to_route('transfer_view')->withErrors("The account that you\'ve tried to transfer is doesn\'t exist. Please check again!");
        }

        try {
            $result = Transfer::query()->insertGetId(['user_id' => $accountId]); // insert sender id to transfer table
            $transfer = Transfer::query()->findOrFail($result);
            $transfer->user()->syncWithPivotValues([$receiverAccount[0]->id], // insert receiver id to transfer_detail table
                [
                    'date' => date('Y-m-d'),
                    'time' => date('h:i:s'),
                    'amount' => $request->transferAmount
                ]);
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return to_route('transfer_view')->with('error', '505');
        }

        return to_route('transfer_view')->with('success', $request->email);
    }
}
