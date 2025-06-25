<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
protected $table = 'contactdetails';
    protected $fillable = [
        'phone_contact',
        'phone_sell',
        'phone_whatsapp',
        'email_contact',
        'email_hr',
        'email_sell',
    ];
}
