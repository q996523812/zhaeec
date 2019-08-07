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
        $projectcode = $projectCodeService->create('zbtz');
        $data['tzsbh'] = $projectcode;
        $data['id'] = (string)Str::uuid();

        $winNotice = DB::transaction(function () use($data) {
            $winNotice = WinNotice::create($data);
            $detail_id = $winNotice->project->detail_id;
            $process = new ProcessService();
            $process->next($detail_id,null,'录入中标通知书',$nodecode=null);
            return $winNotice;
        });
        return $winNotice;
	}
}