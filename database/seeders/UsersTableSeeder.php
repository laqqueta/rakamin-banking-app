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
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), // Gantilah dengan kata sandi yang diinginkan
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password123'), // Gantilah dengan kata sandi yang diinginkan
            ],
            // Tambahkan lebih banyak data pengguna di sini jika diperlukan
        ]);
    }
    }

