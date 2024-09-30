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
        Schema::create('project_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->json('current_actual_pre_project_terms')->nullable();
            $table->json('current_actual_terms')->nullable();
            $table->json('basic_terms')->nullable();
            $table->json('terms_according_to_passport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_terms');
    }
};
