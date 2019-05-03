<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProcessNode extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function process()
    {
        return $this->belongsTo(WorkProcess::class);
    }

    public function role(){
    	$roleModel = config('admin.database.roles_model');
    	return $this->belongsTo($roleModel);
    }
}
