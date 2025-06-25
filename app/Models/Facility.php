<?php

// app/Models/Facility.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name', 'icon', 'type', 'is_active'];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_facility');
    }

    // Scopes for easy filtering
    public function scopeAmenities($query)
    {
        return $query->where('type', 'amenity');
    }

    public function scopeFeatures($query)
    {
        return $query->where('type', 'feature');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
