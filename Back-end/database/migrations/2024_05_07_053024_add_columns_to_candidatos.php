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
        Schema::table('candidatos', function (Blueprint $table) {
            //
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_postings_id')->constrained('job_postings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidatos', function (Blueprint $table) {
            //
        });
    }
};
