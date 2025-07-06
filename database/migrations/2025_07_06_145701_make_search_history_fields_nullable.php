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
            // Change relevant columns to be nullable
            $table->string('species')->nullable()->change();
            $table->text('location')->nullable()->change();
            $table->string('age')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->text('breed')->nullable()->change();
            $table->string('color')->nullable()->change();
            $table->text('elements')->nullable()->change();
            $table->integer('estimated_minimum_age')->nullable()->change();
            $table->integer('estimated_maximum_age')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_historys', function (Blueprint $table) {
            //
        });
    }
};
