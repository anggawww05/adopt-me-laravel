<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is executed when you run the 'php artisan migrate' command.
     * It modifies the 'users' table to add the new 'status' column.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the 'status' column with possible values 'active' or 'nonactive'.
            // The default value for new records will be 'active'.
            // The ->after('role_id') part is optional but helps keep the database structure organized.
            $table->enum('status', ['active', 'nonactive'])->default('active')->after('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is executed when you run 'php artisan migrate:rollback'.
     * It will remove the 'status' column from the 'users' table.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};