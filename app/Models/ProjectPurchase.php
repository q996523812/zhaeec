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
        // return $this->hasMany(File::class, 'filetable_id', 'project_id');
        return $this->morphMany(File::class, 'filetable');
    }

    public function images()
    {
        // return $this->hasMany(Image::class, 'project_id', 'project_id');
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

    public function targetCompanyBaseInfo()
    {
        return $this->hasOne(TargetCompanyBaseInfo::class,'project_id','project_id');
    }

    public function transactionMode()
    {
        return $this->hasOne(TransactionMode::class,'project_id','project_id');
    }
    public function contact()
    {
        return $this->hasOne(Contact::class,'project_id','project_id');
    }
}
