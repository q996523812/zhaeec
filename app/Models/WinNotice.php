<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinNotice extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
	public function files()
    {
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imagetable');
    }

    // public function project()
    // {
    //     return $this->hasOne(Project::class,'id','project_id');
    // }
}
