<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitVoucher extends Model
{
    protected $fillable = 
    [
        'truck_hisab_id',
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
        'unloding',
        'shorted_claim_remark',
        'shorted_claim',
        'balance',
        'remark',
        'verify',
        'status',
        'payment_status',
        'add_by',
    ];
}
