<?php

namespace App\Services;

use App\Models\Project;
use App\Models\File;
use App\Models\IntentionalParty;
use App\Handlers\FileUploadHandler;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class FileService
{
	/**
	 *$model 关联file表的模型实例
	 *$folder 文件存储文件夹
	 *$request_file  从request中获取的file
	 */
	public function add($model,$folder,$request_file){
		$file = DB::transaction(function () use($model,$folder,$request_file) {
			$uploader = new FileUploadHandler();
			$result = $uploader->save($request_file, $folder, $model->id);
        	$file = $this->store($model,$result);
        	return $file;
		});
		
        return $file;
	}

	public function store($model,$data){
        $file = new File;
        $file->id = (string)Str::uuid();
        $file->name = $data['name'];
        $file->path = $data['path'];
        
		$file2 = $model->files()->save($file);
		return $file2;
	}

	public function batchStore($model,$datas){
		$files = [];
		foreach ($datas as $data) {
			$file = new File;
	        $file->id = (string)Str::uuid();
	        $file->name = $data['name'];
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