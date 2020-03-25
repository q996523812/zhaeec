<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Auth\Database\Administrator;

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

    public function user()
    {
        return $this->belongsTo(Administrator::class,'user_id');
    }
}
