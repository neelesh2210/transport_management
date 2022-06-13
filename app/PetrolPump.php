<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetrolPump extends Model
{

    protected $fillable = [
        'petrolpump_name',
        'petrolpump_address',
        'petrolpump_mobile_no',
        'branch',
        'amount',
        'amount_type',
        'start_range',
        'end_range',
        'status',
        'add_by',
        'delete_status'
    ];

    protected $casts =
    [
        'petrolpump_mobile_no' => 'array',
    ];

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch','id');
    }

}
