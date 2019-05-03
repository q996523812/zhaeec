<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function projectLease()
    {
        return $this->hasOne(ProjectLease::class,'id','detail_id');
    }
    public function projectPurchase()
    {
        return $this->hasOne(ProjectPurchase::class,'id','detail_id');
    }
    public function workProcessRecords(){
    	return $this->hasMany(WorkProcessRecord::class);
    }
    public function instance()
    {
        return $this->hasOne(WorkProcessInstance::class);
    }

    public function pbResults()
    {
        return $this->hasMany(PbResult::class);
    }

     
}
