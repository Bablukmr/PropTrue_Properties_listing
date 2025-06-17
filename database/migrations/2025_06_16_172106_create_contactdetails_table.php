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
        Schema::create('contactdetails', function (Blueprint $table) {
          $table->id();
            $table->string('phone_contact')->nullable();
            $table->string('phone_sell')->nullable();
            $table->string('phone_whatsapp')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('email_hr')->nullable();
            $table->string('email_sell')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactdetails');
    }
};
