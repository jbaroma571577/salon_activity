<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service_id',
        'customer_name',
        'contact',
        'appointment_date',
        'appointment_time',
        'price'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}