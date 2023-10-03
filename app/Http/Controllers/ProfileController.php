<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function profileIndex(Request $request)
    {
        $accountId = $request->session()->get('id');
        $users = User::find($accountId);

        $data = array(
            'name' => $users->account_name
        );

        $id = $users->id;
        $name = $users->account_name;
        $account_address = $users->account_address;
        $email = $users->email;
        $phone_number = $users->phone_number;
        $account_card_number = $users->account_card_number;
        $balance = $users->balance;

        return view('profile', compact('users', 'data'));
    }


    public function profileEdit($accountId){

        $edited = User::findOrFail($accountId);

        $data = array(
            'name' => $edited->account_name
        );
        
        return view('profile_edit', compact('edited', 'data'));
    }

    public function profileEditSuccess(Request $request, $accountId){
        $edited = User::findOrFail($accountId);
        // $edited->save($request->all());
        $edited->account_name = $request->input('account_name');
        $edited->account_address = $request->input('account_address');
        $edited->phone_number = $request->input('phone_number');
        $edited->save();

        // $edited->account_name = $request->account_name;
        // $edited->account_address = $request->account_address;
        // $edited->phone_number = $request->phone_number;
       
        return redirect()->route('profile')->with('success', 'Berhasil update profile!');
        

        
    }
}
