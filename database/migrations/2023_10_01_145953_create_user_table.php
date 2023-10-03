<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('account_name', 25);
            $table->text('password');
            $table->string('account_address', 125);
            $table->string('account_card_number', 19);
            $table->char('pin', 6);
            $table->char('phone_number', 12);
            $table->string('email', 64);
            $table->bigInteger('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
