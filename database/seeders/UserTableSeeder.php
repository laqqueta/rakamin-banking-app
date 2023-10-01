<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /**
        * NOTE!
         * Every account have same password as their account name
         *
         * See UserFactory for more detail.
         */

        User::factory()->count(10)->create();
    }
}

