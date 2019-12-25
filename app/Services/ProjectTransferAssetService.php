<?php

namespace App\Services;

use App\Models\ProjectTransferAsset;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectTransferAssetService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'zczr';
        $this->model_class = ProjectTransferAsset::class;
    }
}