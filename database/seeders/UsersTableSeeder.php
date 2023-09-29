<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'account_name' => 'user',
                'password' => Hash::make('user'),
                'account_address' => 'Rumah admin',
                'account_card_number' => '9999-99999-99',
                'phone_number' => '089999999999',
                'email' => 'user@email.com',
                'balance' => '100000'
            ]
        ]);
    }
    }

