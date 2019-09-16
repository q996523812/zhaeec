<?php

namespace App\Services;

use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectService
{
	public function __construct()
    {

    }

    public function submit($project,$operation){
        DB::transaction(function () use($project,$operation) {
        	$processService = new ProcessService();
            $processService->next($project->detail_id,null,$operation,null);
        });
    }
}