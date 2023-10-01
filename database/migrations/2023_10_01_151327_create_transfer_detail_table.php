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
        Schema::create('transfer_detail', function (Blueprint $table) {
            $table->foreignId('transfer_id')
                ->constrained('transfer')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->date('date');
            $table->time('time');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_detail');
    }
};
