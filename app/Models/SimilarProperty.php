<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilarProperty extends Model
{
    use HasFactory;

    protected $table = 'similar_properties';

    protected $fillable = [
        'property_id',
        'similar_property_id',
        'similarity_score'
    ];

    protected $casts = [
        'similarity_score' => 'integer',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function similarProperty()
    {
        return $this->belongsTo(Property::class, 'similar_property_id');
    }
}
