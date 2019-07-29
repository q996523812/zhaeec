<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $fillable = [
                    'type', 'path', 'name'
    ];
    public $incrementing = false;
    // protected $guarded = [];

    public function filetable()
    {
        return $this->morphTo();
    }
    
}
