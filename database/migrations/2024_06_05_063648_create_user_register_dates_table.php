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
        Schema::create('user_register_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id')->nullable();       
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->dateTime('reg_date')->nullable();       
            $table->foreign('participant_id')
            ->references('id')
            ->on('participants')
            ->onDelete('cascade');   
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_register_dates');
    }
};
