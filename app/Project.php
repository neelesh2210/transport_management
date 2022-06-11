<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $fillable = [
        'project_name', 'project_start_date','project_end_date','project_final_date','project_delay_time','project_mentor_name','project_team_members','status',
    ];
}
