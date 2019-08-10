<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProjectLease extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
	public function files()
    {
        // return $this->hasMany(File::class, 'filetable_id', 'project_id');
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        // return $this->hasMany(Image::class, 'imagetable_id', 'project_id');
        return $this->morphMany(Image::class, 'imagetable');
    }
    public function workProcessRecords(){
        return $this->hasMany(WorkProcessRecord::class,'table_id','id');
    }
    public function instance()
    {
        return $this->hasOne(WorkProcessInstance::class,'table_id','id');
    }
    public function intentionalParties()
    {
        return $this->hasMany(IntentionalParty::class,'project_id','project_id');
    }
    // public function getGpDateStartAttribute()
    // {
    //     return date('Y-m-d', Carbon::parse($this->attributes['gp_date_start']));
    // }
    // public function getGpDateEndAttribute()
    // {
    //     return date('Y-m-d', $this->attributes['gp_date_end']);
    // }

    // protected $casts = [
    //     'gp_date_start' => date('Y-m-d'),
    // ];
}
