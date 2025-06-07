<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_opening_id',
        'name',
        'email',
        'phone',
        'message',
        'resume_path',
        'status',
        'position',
        'application_types'
    ];

    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class);
    }
}
