<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplyoeelog extends Model
{
    protected $fillable = [
        'companies_id', 'company_name', 'company_code','company_location','company_branch_name','company_branch_code','company_branch_location','emplyoee_type','emplyoee_id','emplyoee_password','status', 'add_by',
    ];
}
