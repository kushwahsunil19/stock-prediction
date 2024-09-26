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
        Schema::create('participant_competition', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('participant_id')->nullable();  
            $table->unsignedBigInteger('competition_id')->nullable();            
            $table->foreign('participant_id')
            ->references('id')
            ->on('participants')
            ->onDelete('cascade');
            $table->foreign('competition_id')
            ->references('id')
            ->on('competitions')
            ->onDelete('cascade');
            $table->integer('user_id');  
            $table->dateTime('day')->nullable();
            $table->dateTime('participant_date')->nullable();   
            $table->dateTime('answer_date')->nullable();   
            $table->smallInteger('token_used')->nullable();             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_competition');
    }
};
