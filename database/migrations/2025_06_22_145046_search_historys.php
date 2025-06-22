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
        Schema::create('search_historys', function (Blueprint $table) {
            $table->id();
            $table->enum('species', ['cat', 'dog', 'other']);
            $table->text('location');
            $table->integer('estimated_minimum_age');
            $table->integer('estimated_maximum_age');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->text('elements');
            $table->text('breed');
            $table->string('color');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
