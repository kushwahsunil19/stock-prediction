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
        Schema::create('participant_answer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('com_participant_id')->nullable();             
            $table->unsignedBigInteger('question_id')->nullable();            
            $table->foreign('com_participant_id')
            ->references('id')
            ->on('participant_competition')
            ->onDelete('cascade');
          
            $table->foreign('question_id')
            ->references('id')
            ->on('quiz')
            ->onDelete('cascade');
          
            $table->string('answer')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_answer');
    }
};
