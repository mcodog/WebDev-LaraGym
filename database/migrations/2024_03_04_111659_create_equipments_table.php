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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('category');
            $table->string('dimension');
            $table->string('weight');
            $table->float('cost');
            $table->string('notes')->nullable(true);
            $table->string('img_path')->nullable(true);

            $table->unsignedBigInteger('manufacturer_id')->nullable(false);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
