<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplyoeelog extends Model
{

    protected $fillable = [
        'user_id',
        'companies_id',
        'branch_id',
        'emplyoee_type',
        'status',
        'add_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Companie::class,'companies_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
