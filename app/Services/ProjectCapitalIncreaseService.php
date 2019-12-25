<?php

namespace App\Services;

use App\Models\ProjectCapitalIncrease;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectCapitalIncreaseService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'zzkg';
        $this->model_class = ProjectCapitalIncrease::class;
    }
}