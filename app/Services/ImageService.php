<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Image;
use App\Models\IntentionalParty;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ImageService
{
	/**
	 *$model 关联file表的模型实例
	 *$folder 文件存储文件夹
	 *$request_file  从request中获取的file
	 */
	public function add($model,$folder,$request_image, $size){
		$file = DB::transaction(function () use($model,$folder,$request_image, $size) {
			$uploader = new ImageUploadHandler();
			$result = $uploader->save($request_image, $folder, $model->id, $size);
			// $result = $uploader->save($request_image, 'project', $table_id, $size);

        	$file = $this->store($model,$result);
        	return $file;
		});
		
        return $file;
	}

	public function store($model,$data){
        $file = new Image;
        $file->path = $data['path'];
        
		$file2 = $model->Images()->save($file);
		return $file2;
	}

	public function destroy($id){
		DB::transaction(function () use($id) {
			Image::destroy($id);
		});
	}
}