<?php

namespace App\Transformers;

use App\Models\File;
use League\Fractal\TransformerAbstract;

class FileTransformers extends TransformerAbstract
{
    public function transform(File $file)
    {
        return [
            'id' => $file->id,
            'project_id' => $file->project_id,
            'path' => $file->path,
            'created_at' => $file->created_at->toDateTimeString(),
            'updated_at' => $file->updated_at->toDateTimeString(),
        ];
    }
}