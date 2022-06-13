<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
     protected $fillable = [
        'vechile_owner_id',
        'driver_name',
        'driver_mobile_no',
        'driver_address',
        'driver_license_no',
        'driver_id_no',
        'driver_blood_group',
        'driver_license_expairy',
        'note',
        'status',
        'delete_status',
        'add_by',
    ];
}
