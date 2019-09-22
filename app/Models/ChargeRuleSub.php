<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChargeRuleSub extends Model
{
    public $incrementing = false;
	protected $guarded = [];

    public function rule()
    {
        return $this->hasOne(ChargeRule::class,'id');
    }
}
