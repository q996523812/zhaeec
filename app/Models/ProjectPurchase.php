<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPurchase extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
	public function files()
    {
        return $this->hasMany(File::class, 'project_id', 'project_id');
    }

    
}
