<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilarProperty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function similar()
    {
        return $this->belongsTo(Property::class, 'similar_property_id');
    }
}
