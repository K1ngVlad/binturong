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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('in_the_portfolio_of_the_year')->nullable();
            $table->string('status')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->default('Без названия');
            $table->enum('stage', ['Реализация', 'Предпроект', 'Завершен', 'Закрыт', 'В ожидании', 'Инициатива снята'])->default('В ожидании');
            $table->string('priority')->nullable();
            $table->string('post_project_monitoring')->nullable();
            $table->string('area_of_activity')->nullable();
            $table->string('category')->nullable();
            $table->string('program')->nullable();
            $table->boolean('belonging_to_strategy')->default(false);
            $table->enum('r_g_t', ['R', 'G', 'T'])->nullable();
            $table->text('short_description')->nullable();
            $table->string('dependencies')->nullable();
            $table->string('short_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
