<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidResultSub extends Model
{
    public function bidResult()
    {
        return $this->belongsTo(BidResult::class);
    }
}
