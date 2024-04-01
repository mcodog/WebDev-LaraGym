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
        Schema::table('client', function (Blueprint $table) {
            // Add the 'status' column
            $table->string('status')->default('Pending'); // You can modify the data type and default value as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('client', function (Blueprint $table) {
            // Drop the 'status' column if the migration is rolled back
            $table->dropColumn('status');
        });
    }
}

?>