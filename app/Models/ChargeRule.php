<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChargeRule extends Model
{
    public $incrementing = false;
	protected $guarded = [];

    public function subs()
    {
        return $this->hasMany(ChargeRuleSub::class);
    }
}
