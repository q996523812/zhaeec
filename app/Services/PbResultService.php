<?php

namespace App\Services;

use App\Models\Project
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class PbResultService
{
	public function getList(){
		$user = Admin::user();
		$purchases = ProjectPurchase::where('user_id',$user_id->id);
		return $purchases;
	}

	public function add($data_purchase,$data_project,$process,$files=null){
		

	}

	pbulic function batchSave($datas,$hasfile,$jgptfile){
		$title = $datas['title'];
		$xmbh = $datas['xmbh'];
		$records = $datas['records'];
		$project = Project::where('xmbh',$xmbh);

		foreach($records as $record){
			$record['project_id'] = $project->id;
			$record['title'] = $project->title;
			$record['xmbh'] = $project->xmbh;
			$record['id'] = (string)Str::uuid();					
		}

		$file = new File;
		$file->id = (string)Str::uuid();
		$file->project_id = $project->id;
		$file->path = $jgptfile->path;
		$file->name = $jgptfile->name;


		PbResult::insert($record);
		$file->save();
	}
}