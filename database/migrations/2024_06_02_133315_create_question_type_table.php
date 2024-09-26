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
        Schema::create('question_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id')->nullable();            
            $table->foreign('question_id')
            ->references('id')
            ->on('quiz')
            ->onDelete('cascade');           
            $table->string('option_value')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_type');
    }
};
