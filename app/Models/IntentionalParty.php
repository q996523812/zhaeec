<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntentionalParty extends Model
{
    public $incrementing = false;
	protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
	public function files()
    {
        // return $this->hasMany(File::class, 'filetable_id', 'id');
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        // return $this->hasMany(Image::class, 'project_id', 'id');
        return $this->morphMany(Image::class, 'imagetable');
    }
    public function workProcessRecords(){
        return $this->hasMany(WorkProcessRecord::class,'table_id','id');
    }
    public function instance()
    {
        return $this->hasOne(WorkProcessInstance::class,'table_id','id');
    }
}
