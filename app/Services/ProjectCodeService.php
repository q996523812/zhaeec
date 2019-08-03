<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\ProjectCode;
use Illuminate\Support\Str;

class ProjectCodeService
{
	public function __construct(){

	}

	public function create($type){
		// if (isset($type)) { 
		// 	set_exception_handler('myException');  
		// 	throw new Exception('项目类型不能为空');
		// }
		// $code = ProjectCode::find($type);
		$code = ProjectCode::where('code',$type)->first();
		
		$template = $code->template;
		$pointer = $code->pointer;
		$year = date('Y');

		//跨年后重新计数
		if(!$year===$code->year){
			$pointer = 1;
		}
		//生成编号
		$projectcode = str_replace('*',substr($year,strlen($year)-2).'-'.$pointer,$template);

		$code->year = $year;
		$code->pointer = $pointer+1;
		$code->save();

		return $projectcode;
	}

}