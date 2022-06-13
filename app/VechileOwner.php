<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VechileOwner extends Model
{
     protected $fillable = [
        'ownwer_name',
        'ownership_type',
        'owner_phone_first',
        'owner_phone_second',
        'owner_whatsapp',
        'owner_email',
        'owner_address',
        'status',
        'delete_status',
        'add_by',
        'aadhar_no',
        'aadhar_front_photo',
        'aadhar_back_photo',
        'pan_card_no',
        'pan_card_front_photo',
        'pan_card_back_photo'
    ];
}
