<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use Illuminate\Support\Str;

class WorkProcessNodeService
{

	public function find($type,$node_code){
		$process = (new WorkProcess)->where('type',$type)->first();
		$node = $process->nodes()->where('code',$node_code)->first();
		return $node;
	}
}