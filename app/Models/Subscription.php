<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subscription_plan_id', 'car_number', 'car_model', 'start_date', 'end_date'];

    public function plan()
    {
        return $this->belongsTo(SubPlans::class, 'subscription_plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
