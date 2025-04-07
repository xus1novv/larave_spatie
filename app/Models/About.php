<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'service_points',
        'engineers_workers',
        'happy_clients',
        'projects_completed',
    ];
}
