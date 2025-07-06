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
            // Add the new 'status' column
            $table->enum('status', ['pending', 'accepted', 'rejected'])
                  ->default('pending')
                  ->after('pet_id'); // Places the column after 'pet_id' for organization
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adoption_historys', function (Blueprint $table) {
            // This allows you to undo the migration if needed
            $table->dropColumn('status');
        });
    }
};
