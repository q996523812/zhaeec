<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    protected $fillable = ['path'];

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['path'], ['http://', 'https://'])) {
            return $this->attributes['path'];
        }
        return \Storage::disk('public')->url($this->attributes['path']);
    }
}
