<?php

namespace App\Services;

use App\Models\JgptProjectLease;
use App\Models\JgptProjectPurchase;
use App\Models\JgptImage;
use App\Handlers\FileUploadHandler;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class JgptImageService
{

	public function store($model,$data){
        $file = new JgptImage;
        $file->name = $data['name'];
        $file->path = $data['path'];
        
		$file2 = $model->files()->save($file);
		return $file2;
	}

	public function batchStore($model,$datas){
		$files = [];
		foreach ($datas as $data) {
			$file = new JgptImage;
	        $file->path = $data['path'];
	        $files[] = $file;
		}
		$files = $model->files()->saveMany($files);
		return $files;
	}

	public function destroy($id){
		DB::transaction(function () use($id) {
			File::destroy($id);
		});
	}

}