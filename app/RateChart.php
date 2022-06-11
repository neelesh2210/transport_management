<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateChart extends Model
{
    protected $fillable = [
        'plant_code', 
        'city_code', 
        'destination',
        'freight', 
        'status',
        'wheel',
        'add_by',
    ];
}
