<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'short_description',
        'date',
        'show_on_home',
        'hashtags',
    ];
}
