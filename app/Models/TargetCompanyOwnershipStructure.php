<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetCompanyOwnershipStructure extends Model
{
	public $incrementing = false;
    protected $guarded = [];

    public function targetCompanyBaseInfo()
    {
        return $this->hasOne(TargetCompanyBaseInfo::class);
    }
}
