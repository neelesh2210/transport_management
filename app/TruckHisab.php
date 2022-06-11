<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckHisab extends Model
{
    protected $fillable = [
        'loding_slip_id',
        'truck_placement_id',
        'tax_invoice_id',
        'vechile_no',
        'quantity',
        'rate',
        'transporter_percent',
        'tac',
        'cash_advance',
        'diesel',
        'total',
        'destination',
        'material',
        'verify',
        'unloding',
        'status',
        'add_by',
    ];
}
