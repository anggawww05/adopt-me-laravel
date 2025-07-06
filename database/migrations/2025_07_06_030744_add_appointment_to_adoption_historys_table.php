<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('adoption_historys', function (Blueprint $table) {
            $table->date('appointment_date')->nullable();
            $table->time('appointment_time')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('adoption_historys', function (Blueprint $table) {
            $table->dropColumn(['appointment_date', 'appointment_time']);
        });
    }
};