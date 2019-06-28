<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspend extends Model
{
    protected $fillable = ['xmbh','title','type','content','date_matter','date_start','date_end','date_inscription'];
}
