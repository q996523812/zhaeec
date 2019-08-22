<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JgptProjectLease extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(JgptFile::class,'table_id');
    }
    public function images()
    {
        // return $this->hasMany(Image::class, 'imagetable_id', 'project_id');
        return $this->morphMany(Image::class, 'imagetable');
    }
}
