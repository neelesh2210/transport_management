<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckPlace extends Model
{
    protected $fillable = 
    [
        'loading_id',
        'transporter_code',
        'driver_name',
        'driver_id',
        'driver_mobile',
        'vechile_no',
        'dgnitity',
        'destination',
        'vechicle_type',
        'destination_from',
        'destination_to',
        'truck_place_date',
        'invoice_number',
        'lorry_receipt_no',
        'lorry_receipt_date',
        'delivery_instruction_no',
        'destination_city_code',
        'in_dgnitity',
        'quantity',
        'way_bill_no',
        'way_bill_no_date',
        'rate_pmt',
        'amount_rupees',
        'tax',
        'net_payble',
        'status',
        'verify',
        'add_by',
    ];
}
