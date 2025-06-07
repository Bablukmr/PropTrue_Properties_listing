<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;

    protected $table = 'job_openings';

    protected $fillable = [
        'title',
        'description',
        'designation',
        'department',
        'job_type',
        'benefits',
        'opening_start_date',
        'opening_end_date',
    ];

    protected $casts = [
        'opening_start_date' => 'date',
        'opening_end_date' => 'date',
    ];
}
