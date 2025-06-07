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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->enum('enquiry_type', ['sell', 'contact'])->default('contact');

            // Property related fields (nullable)
            $table->string('property_type')->nullable();
            $table->text('address')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('area', 10, 2)->nullable()->comment('in sq ft');
            $table->decimal('price', 12, 2)->nullable();
            $table->text('description')->nullable();

            // Image storage (JSON array of image paths)
            $table->json('images')->nullable();

            // Common fields
            $table->text('message')->nullable();
            $table->string('status')->default('pending')->comment('pending, contacted, completed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
