<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidResult extends Model
{
    public $incrementing = false;
    protected $guarded = [];

	public function files()
    {
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imagetable');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function bidResultSubs()
    {
        return $this->hasMany(BidResultSub::class);
    }
}
