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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->enum('species', ['cat', 'dog', 'other']);
            $table->enum('steril_status', ['yes', 'no']);
            $table->enum('problematic_status', ['yes', 'no']);
            $table->string('name');
            $table->integer('age')->nullable();
            $table->string('breed');
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('gender', ['male', 'female']);
            $table->enum('color', ['black', 'white', 'brown', 'gray', 'yellow', 'other']);
            $table->enum('complete_vaksinated', ['yes', 'no', 'unknown']);
            $table->enum('trained_status', ['yes', 'no', 'unknown']);
            $table->enum('good_with_animals', ['yes', 'no']);
            $table->enum('good_with_kids', ['yes', 'no', 'unknown']);
            $table->enum('pure_breed', ['yes', 'no', 'unknown']);
            $table->enum('special_needs', ['yes', 'no', 'unknown']);
            $table->text('address');
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->text('description')->nullable();
            $table->string('picture1')->nullable();
            $table->string('picture2')->nullable();
            $table->string('picture3')->nullable();
            $table->string('picture4')->nullable();
            $table->string('document1')->nullable();
            $table->string('document2')->nullable();
            $table->string('document3')->nullable();
            $table->string('document4')->nullable();
            // $table->enum('status', ['available', 'adopted'])->default('available');
            // $table->string('rehome_reason');
            // $table->string('waiting_time');
            // $table->enum('behavior', ['aggressive', 'calm', 'playful']);
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
