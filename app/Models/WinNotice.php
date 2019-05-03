<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinNotice extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

}
