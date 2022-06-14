<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplyoeeprofile extends Model
{
    protected $fillable = [
        'emplyoee_id','emplyoee_type','emplyoee_name','emplyoee_photo','emplyoee_jd','emplyoee_designation','emplyoee_cno','emplyoee_email','emplyoee_dob','emplyoee_bg','gender','emplyoee_cadd','emplyoee_padd','emplyoee_idtype','emplyoee_idno','emplyoee_qualification','emplyoee_exp','status', 'add_by',
    ];

    public function emplyoee()
    {
        return $this->belongsTo(Emplyoeelog::class);
    }
}
