<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarInquiry extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address', 'car_options'];

    protected $casts = [
        'car_options' => 'array',
    ];
}
