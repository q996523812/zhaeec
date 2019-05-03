<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JgptProjectPurchase extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(JgptFile::class,'table_id');
    }
}
