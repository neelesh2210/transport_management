<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'bill_number', 
        'debite_voucher',
        'add_by',
        'status',
    ];
}
