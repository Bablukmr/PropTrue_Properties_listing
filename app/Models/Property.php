<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'full_property_schema';

    protected $guarded = [];

    protected $casts = [
        'furnishing_details' => 'array',
        'features' => 'array',
        'amenities' => 'array',
        'is_featured' => 'boolean',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function similarProperties()
    {
        return $this->hasMany(SimilarProperty::class, 'property_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
