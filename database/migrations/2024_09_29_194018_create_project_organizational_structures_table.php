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
        Schema::create('project_organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('client')->nullable();
            $table->string('mp_i')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('business_analyst')->nullable();
            $table->string('composition_of_the_uk')->nullable();
            $table->string('interested_departments')->nullable();
            $table->string('external_persons')->nullable();
            $table->string('program_manager')->nullable();
            $table->string('a_d_m')->nullable();
            $table->string('c_f_o')->nullable();
            $table->string('business_lines')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_organizational_structures');
    }
};
