<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $table = 'property_images';

    protected $fillable = [
        'property_id',
        'image_path',
        'is_featured',
        'order',
        'caption'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
