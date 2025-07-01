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
        Schema::table('adoption_historys', function (Blueprint $table) {
            $table->string('home_photo_1')->nullable()->after('experience');
            $table->string('home_photo_2')->nullable()->after('home_photo_1');
            $table->string('home_photo_3')->nullable()->after('home_photo_2');
            $table->string('home_photo_4')->nullable()->after('home_photo_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adoption_historys', function (Blueprint $table) {
            //
        });
    }
};
