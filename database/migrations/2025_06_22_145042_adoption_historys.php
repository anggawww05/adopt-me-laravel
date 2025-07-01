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
        Schema::create('adoption_historys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('post_code');
            $table->string('phone');
            $table->string('home_phone');
            $table->enum('have_yard', ['yes', 'no']);
            $table->enum('environment_situation', ['urban', 'fringe', 'rural']);
            $table->enum('house_type', ['apartment', 'house']);
            $table->enum('home_activity', ['active', 'calm', 'middle']);
            $table->enum('have_alergy', ['yes', 'no']);
            $table->integer('family_members');
            $table->integer('youngest_age');
            $table->enum('kids_visited', ['yes', 'no']);
            $table->integer('visited_age');
            $table->enum('have_roommate', ['yes', 'no']);
            $table->enum('have_other_pets', ['yes', 'no']);
            $table->text('describe_other_pets');
            $table->text('experience');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
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
