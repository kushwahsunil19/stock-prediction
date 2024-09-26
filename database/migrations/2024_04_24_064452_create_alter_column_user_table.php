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
        DB::statement("ALTER TABLE `users`
        ADD `status` tinyint NOT NULL DEFAULT '0' COMMENT '1 = Active, 0 = Deactive' AFTER `remember_token`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
