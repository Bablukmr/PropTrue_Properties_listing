<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permission';

    protected $fillable = [
        'user_id',
        'all_property',
        'featured_property',
        'add_new_property',
        'enquiry',
        'our_team',
        'blog',
        'career',
        'legal',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
