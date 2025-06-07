<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_opening_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('position')->nullable();
            $table->text('message')->nullable();
            $table->string('resume_path')->nullable();
            $table->string('status')->default('pending'); // pending, reviewed, rejected, hired
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};
