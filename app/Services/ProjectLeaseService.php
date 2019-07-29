<?php

namespace App\Services;

use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectLeaseService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'zczl';
        $this->model_class = ProjectLease::class;
    }
}