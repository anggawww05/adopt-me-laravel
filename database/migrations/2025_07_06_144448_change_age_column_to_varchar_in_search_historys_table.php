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
        Schema::table('search_historys', function (Blueprint $table) {
            // This will change the 'age' column to a VARCHAR type
            $table->string('age')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_historys', function (Blueprint $table) {
            // This allows you to reverse the change if needed
            $table->integer('age')->change();
        });
    }
};