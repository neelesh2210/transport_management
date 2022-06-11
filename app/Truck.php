<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'vechile_number',
        'vechile_type',
        'vechile_make',
        'make_year',
        'chassis_number',
        'engine_number',
        'vechile_id',
        'gross_capicity',
        'unladen_weight',
        'permissable',
        'normal_load',
        'owner_id',
        'permissable',
        'owner_id',
        'status',
        'add_by',
    ];
}
