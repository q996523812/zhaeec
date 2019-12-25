<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
	public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
