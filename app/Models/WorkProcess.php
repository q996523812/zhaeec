<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    public $incrementing = false;
    protected $fillable = [
                    'code', 'name','projecttype'
    ];

    public function nodes()
    {
        return $this->hasMany(WorkProcessNode::class);
    }

    public function instance(){
    	return $this->hasMany(WorkProcessInstance::class);
    }
}
