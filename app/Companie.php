<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
  protected $fillable = [ 
      'company_name','material', 'company_code', 'company_logo', 'company_location', 'company_branch_name', 'company_branch_code', 'company_branch_location', 'status', 'add_by',
    ];


protected $casts = [
    'material' => 'array', // Will convarted to (Array)
];

}
