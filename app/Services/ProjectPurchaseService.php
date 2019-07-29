<?php

namespace App\Services;

use App\Models\ProjectPurchase;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectPurchaseService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'qycg';
        $this->model_class = ProjectPurchase::class;
    }
}