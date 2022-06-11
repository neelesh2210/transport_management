<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = 
    [
        'invoice_number',
        'invoice_number_date',
        'sales_order_number',
        'sales_order_date',
        'customer',
        'consignee',
        'vechile_no',
        'transport_name',
        'lorry_receipt_no',
        'lorry_recepit_date',
        'company_gst',
        'delivery_instruction_no',
        'destination',
        'dgnintiy',
        'quantitiy',
        'rate_pmt',
        'ammount_rs',
        'tax',
        'unloading',
        'total',
        'product_description',
        'way_bill_no',
        'way_bill_date',
        'tp_id',
        'status',
        'add_by',
    ];
}
