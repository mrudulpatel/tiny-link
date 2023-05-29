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
        Schema::table('urls', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('urls', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->primary('id');
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('urls', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('id');
        });
    }
};
