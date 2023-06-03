<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('method_of_withdrawal')->nullable();
            $table->string('amount')->nullable();
            $table->string('address')->nullable();
            $table->string('bankname')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountnumber')->nullable();
            $table->integer('accountpin')->nullable();
            $table->string('swift')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
