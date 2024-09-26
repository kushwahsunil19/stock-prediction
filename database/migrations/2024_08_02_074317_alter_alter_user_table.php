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
ADD `country_code` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `mobile`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
