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
        Schema::create('project_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('sign')->nullable();
            $table->string('status')->nullable();
            $table->string('year_of_completion')->nullable();
            $table->string('product')->nullable();
            $table->string('product_manager')->nullable();
            $table->string('product_characteristics')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_monitorings');
    }
};
