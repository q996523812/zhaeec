<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\Api\JgptPbResultRequest;
use App\Services\PbResultService;
use App\Models\JgptProjectPurchase;
use App\Models\JgptFile;
use App\Models\File;
use App\Models\Project;
use App\Handlers\FileUploadHandler;

class JgptPbResultsController extends Controller
{
        public function store(JgptPbResultRequest $request,FileUploadHandler $uploader,JgptFile $file,PbResultService $pbResultService)
    {

    	//解析参数到模板
    	$datas = $request->datas;    	
    	$datas = json_decode($datas,true);


		//判断请求中是否包含name=file的上传文件
		$hasfile = $request->hasFile('file');
        if($hasfile){
            $upfile = $request->file('file');
        	// $uploader->postFileupload($file);
			$result = $uploader->save($upfile,'jgpt','qycq');

			$file->path = $result['path'];
			$file->name = $result['name'];
	        $file->project_type = 'qycq';
	        $file->table_id = $datas['id'];
	        $file->id = (string)Str::uuid();
	        
        }

        DB::transaction(function () use($datas,$hasfile,$file,$pbResultService) {
            $pbResultService->batchSave($datas,$hasfile,$file);

            if($hasfile){
            	$file->save();
            }
        });


        // return $this->response->array($result)->setStatusCode(201);
    	return $this->response->created();
    }

}
