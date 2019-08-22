<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JgptImage extends Model
{
	protected $fillable = ['path'];

    public function imagetable()
    {
        return $this->morphTo();
    }
}
