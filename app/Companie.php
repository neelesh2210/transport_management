<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{

  protected $fillable = [
      'company_name',
      'company_code',
      'company_logo',
      'company_address',
      'company_gstin',
      'delete_status',
      'status',
      'add_by',
    ];

}
