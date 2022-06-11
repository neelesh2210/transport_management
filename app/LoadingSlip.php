<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoadingSlip extends Model
{
    protected $fillable = 
    [ 
       'di_no',
       'truck_no',
       'owner_name',
       'owner_mobile_no',
       'driver_name',
       'driver_mobile',
       'driver_id',
       'case_advance',
       'diesel_case_advance',
       'diesel_quantity',
       'diesel_slip_no',
       'material_name',
       'driver_signature',
       'remarks',
       'status',
       'add_by',
    ];
}
