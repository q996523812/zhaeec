<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//标的/融资企业基本情况
class TargetCompanyBaseInfo extends Model
{
	public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function targetCompanyOwnershipStructures()
    {
        return $this->hasMany(TargetCompanyOwnershipStructure::class);
    }

}
