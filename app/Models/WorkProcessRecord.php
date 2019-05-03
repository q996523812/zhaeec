<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProcessRecord extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function instance()
    {
        return $this->hasOne(WorkProcessInstance::class);
    }
    public function project()
    {
        return $this->hasOne(Project::class);
    }
    
}
