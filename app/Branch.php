<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'company_id',
        'branch_name',
        'branch_code',
        'branch_address',
        'material_id',
        'status',
        'delete_status',
        'add_by',
    ];

    public function company()
    {
        return $this->belongsTo(Companie::class);
    }
}
