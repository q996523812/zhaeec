<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetInfo extends Model
{
	public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
