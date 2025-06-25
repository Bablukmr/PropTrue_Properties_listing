<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'full_property_schema';

    protected $fillable = [
        // Basic Information
        'title',
        'description',
        'slug',
        'property_type',
        'listing_type',
        'price',
        'price_unit',
        'security_deposit',
        'property_id',
        // Location Details
        'location',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'latitude',
        'longitude',
        'landmark',
        'google_map_link',
        'rera_status',
        'rera_id',
        'rera_site_url',
        'rera_qr',

        // Property Details
        'bedrooms',
        'master_properties_detais',
        'bathrooms',
        'balconies',
        'floors',
        'floor_number',
        'super_area',
        'carpet_area',
        'plot_area',
        'year_built',
        'age_of_property',
        'availability_text',

        // Furnishing
        'furnishing',
        'furnishing_details',

        // Features & Amenities
        'features',
        'amenities',

        // Availability
        'availability',
        'available_from',
        'preferred_tenants',

        // Media
        'main_image',
        'video_url',
        'floor_plan_image',
        'brochure',

        // Additional Info
        'is_featured',
        'is_verified',
        'pre_launch_property',
        'is_active',
        'property_status',
        'notes',
        'keyfeatures',
        // nearby_places',
        'bazar_distance_km',
        'hospital_distance_km',
        'school_distance_km',
        'bus_stand_distance_km',
        'junction_distance_km',
        'airport_distance_km',

        // Ownership
        'user_id',
    ];

    protected $casts = [
        'furnishing_details' => 'array',
        'features' => 'array',
        'amenities' => 'array',
        'is_featured' => 'boolean',
        'is_verified' => 'boolean',
        'pre_launch_property' => 'boolean',
        'is_active' => 'boolean',
        'available_from' => 'date',

        // 'security_deposit' => 'decimal:2',
        // 'super_area' => 'decimal:2',
        // 'carpet_area' => 'decimal:2',
        // 'plot_area' => 'decimal:2',
    ];

    // public function images()
    // {
    //     return $this->hasMany(PropertyImage::class, 'property_id');
    // }

    public function similarProperties()
    {
        return $this->belongsToMany(
            Property::class,
            'similar_properties',
            'property_id',
            'similar_property_id'
        )->withTimestamps();
    }
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

// Add these to your Property model
public function facilities()
{
    return $this->belongsToMany(Facility::class, 'property_facility');
}

public function amenities()
{
    return $this->facilities()->where('type', 'amenity');
}

public function features()
{
    return $this->facilities()->where('type', 'feature');
}
}
