<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Main Property Table
        Schema::create('full_property_schema', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();
            $table->enum('property_type', ['Apartment', 'Villa', 'Residential Plot', 'Commercial', 'Penthouse', 'House', 'Condo', 'Townhouse']);
            $table->enum('listing_type', ['For Rent', 'For Sale', 'Lease']);
            $table->decimal('price', 12, 2);
            $table->string('price_unit')->nullable();
            $table->decimal('security_deposit', 12, 2)->nullable();
            $table->string('property_id')->unique()->nullable();

            // Location Details
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('India');
            $table->string('zip_code')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->text('landmark')->nullable();
            $table->string('google_map_link')->nullable();

            // Property Details
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('balconies')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('floor_number')->nullable();
            $table->decimal('super_area', 10, 2)->nullable();
            $table->decimal('carpet_area', 10, 2)->nullable();
            $table->decimal('plot_area', 10, 2)->nullable();
            $table->integer('year_built')->nullable();
            $table->integer('age_of_property')->nullable();

            // Furnishing
            $table->enum('furnishing', ['Fully Furnished', 'Semi Furnished', 'Unfurnished'])->nullable();
            $table->json('furnishing_details')->nullable();

            // Features & Amenities
            $table->json('features')->nullable();
            $table->json('amenities')->nullable();

            // Availability
            $table->enum('availability', ['Immediate', 'After Date', 'Negotiable'])->default('Immediate');
            $table->date('available_from')->nullable();
            $table->enum('preferred_tenants', ['Family', 'Professionals', 'Students', 'Company', 'Anyone'])->nullable();

            // Media
            $table->string('main_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('floor_plan_image')->nullable();
            $table->string('brochure')->nullable();

            // Additional Info
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->enum('property_status', ['Available', 'Rented', 'Sold', 'Under Maintenance'])->default('Available');
            $table->text('notes')->nullable();
            $table->text('keyfeatures')->nullable();

            // Ownership
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('agency_id')->nullable()->constrained('agencies')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });

        // Property Images Table
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('full_property_schema')->onDelete('cascade');
            $table->string('image_path');
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->string('caption')->nullable();
            $table->timestamps();
        });

        // Similar Properties Table
        Schema::create('similar_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('full_property_schema')->onDelete('cascade');
            $table->foreignId('similar_property_id')->constrained('full_property_schema')->onDelete('cascade');
            $table->integer('similarity_score')->nullable();
            $table->timestamps();
            $table->unique(['property_id', 'similar_property_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('similar_properties');
        Schema::dropIfExists('property_images');
        Schema::dropIfExists('full_property_schema');
    }
};
