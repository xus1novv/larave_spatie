<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'phone_number',
        'email',
        'address',
        'working_hours',
        'logo',
        'instagram_url',
        'telegram_url',
        'facebook_url',
        'youtube_url',
        'x_url',
    ];
}
