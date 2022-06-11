<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $fillable = 
    [
        'petrol_pump',
        'vechile_no',
        'item',
        'quantitiy',
        'rate',
        'amount',
        'date',
        'add_by',
        'status',
    ];
}
