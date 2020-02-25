<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervise extends Model
{
	public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}