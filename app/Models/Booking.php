<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'car_number',
        'car_model',
        'service_id',
        'booking_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
