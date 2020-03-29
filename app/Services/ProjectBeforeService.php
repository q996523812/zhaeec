<?php

namespace App\Services;

use App\Models\ProjectBefore;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectBeforeService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'ypl';
        $this->model_class = ProjectBefore::class;
    }
}