<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'enquiry_type',
        'property_type',
        'address',
        'bedrooms',
        'bathrooms',
        'area',
        'price',
        'description',
        'images',
        'message',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'area' => 'float',
        'price' => 'float',
    ];
}
