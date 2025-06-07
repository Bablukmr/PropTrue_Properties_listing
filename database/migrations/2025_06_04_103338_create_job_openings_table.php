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
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Real Estate Agent
            $table->string('designation')->nullable(); // main job description
            $table->string('department')->nullable(); // e.g., Sales Department
            $table->enum('job_type', ['Full-time', 'Part-time', 'Contract', 'Internship'])->default('Full-time');
            $table->json('benefits')->nullable(); // e.g., ["Health Insurance", "401(k)", "Paid Time Off"]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
