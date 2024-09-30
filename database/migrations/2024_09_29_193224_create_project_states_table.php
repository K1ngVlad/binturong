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
        Schema::create('project_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->integer('sales_percentages')->default(0);
            $table->string('general_status')->nullable();
            $table->string('business_goals')->nullable();
            $table->string('terms')->nullable();
            $table->string('budget')->nullable();
            $table->text('content')->nullable();
            $table->string('link_to_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_states');
    }
};
