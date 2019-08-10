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
    
    //访问方法：$file->file_url
    public function getFileUrlAttribute()
    {
        // 如果 file 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['path'], ['http://', 'https://'])) {
            return $this->attributes['path'];
        }
        return \Storage::disk('public')->url($this->attributes['path']);
    }

}
