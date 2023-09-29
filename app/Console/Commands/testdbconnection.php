<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class testdbconnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test_connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing DB connection';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        try {
            DB::connection()->getPDO();
            dump('Database is connected. Database Name is : ' . DB::connection()->getDatabaseName());
        } catch (Exception $e) {
            dump('Database connection failed');
        }
    }
}
