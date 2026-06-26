<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'booking_time',
        'booking_date',
        'customer_email'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }  
}
