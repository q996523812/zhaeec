<?php

namespace App\Services;

use App\Models\WinNotice;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class WinNoticeService
{
	public function add($data){
        $projectCodeService = new ProjectCodeService();
        $projectcode = $projectCodeService->create(10);
        $data['tzsbh'] = $projectcode;
        $data['id'] = (string)Str::uuid();

        $winNotice = DB::transaction(function () use($data) {
            $winNotice = WinNotice::create($data);

            $process = new ProcessService();
            $process->next($winNotice->project_id,null,'录入中标通知书',$nodecode=null);
            return $winNotice;
        });
        return $winNotice;
	}
}