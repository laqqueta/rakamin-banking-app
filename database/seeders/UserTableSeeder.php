<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /**
        * NOTE!
         * Every account have same password (for testing purpose)
         * Password: accountpass
         *
         * See UsersFactory for more detail.
         */

        Users::factory()->count(10)->create();
    }
}

