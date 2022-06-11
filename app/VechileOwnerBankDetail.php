<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VechileOwnerBankDetail extends Model
{
     protected $fillable = [
       'vechile_owner_id','account_holder_name', 'account_number', 'ifsc_code'
    ];
}
