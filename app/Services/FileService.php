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
	public function add($model,$folder,$request_file,$data){
		$file = DB::transaction(function () use($model,$folder,$request_file,$data) {
			$uploader = new FileUploadHandler();
			$result = $uploader->save($request_file, $folder, $model->id);
			// $result['received_information_type'] = $data['received_information_type'];
			// $result['information_lists_id'] = $data['information_lists_id'];
			$data['name'] = $result['name'];
			$data['path'] = $result['path'];
			
        	$file = $this->store($model,$data);
        	return $file;
		});
		
        return $file;
	}

	public function update($model,$folder,$request_file,$data,$id){
		$file = DB::transaction(function () use($model,$folder,$request_file,$data,$id) {
			$uploader = new FileUploadHandler();
			$result = $uploader->save($request_file, $folder, $model->id);
			$data['name'] = $result['name'];
			$data['path'] = $result['path'];
			
        	$file = $this->modify($model,$data,$id);
        	return $file;
		});
		
        return $file;
	}
	public function modify($model,$data,$id){
		$file = File::find($id);
		$file->name = $data['name'];
        $file->path = $data['path'];
        $file->received_information_type = $data['received_information_type'];
		// $file->update($data);
		$file->save();
		return $file;
	}
	public function store($model,$data){
        $file = new File;
        $file->id = (string)Str::uuid();
        $file->name = $data['name'];
        $file->path = $data['path'];
        if(!empty($data['received_information_type'])){
        	$file->received_information_type = $data['received_information_type'];
        }
        if(!empty($data['information_lists_id'])){
        	$file->information_lists_id = $data['information_lists_id'];
        }
        if(!empty($data['applicable_person'])){
        	$file->applicable_person = $data['applicable_person'];
        }
        if(!empty($data['applicable_party'])){
        	$file->applicable_party = $data['applicable_party'];
        }
        
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
	        $model->files()->save($file);
		}
		// $files = $model->files()->saveMany($files);
		return $files;
	}

	public function destroy($id){
		DB::transaction(function () use($id) {
			File::destroy($id);
		});
	}

	public function getFilesWtf($project_type,$detail_id){
        return $this->getFiles(1,$project_type,$detail_id);
	}

	public function getFilesYxf($project_type,$detail_id){
        return $this->getFiles(2,$project_type,$detail_id);
	}

	/**
	 *获取委托方或者意向方需要上传的资料清单
	 *@param $applicable_party 1:委托方/转让方，2：意向方/受让方
	 *@param $project_type 	项目类型
	 *@param $detail_id	项目明细表ID
	 */
	public function getFiles($applicable_party,$project_type,$detail_id){
		$sql = 'select a.id as information_lists_id,a.information_name,a.information_type,a.applicable_party, '
			.'	case when a.id =null then b.applicable_person else a.applicable_person end applicable_person, '
			.'	a.memo,b.id as files_id,b.path,b.received_information_type, '
			.'	case when a.id =null then b.name else a.information_name end file_name '
			.'from information_lists a '
			.'left join files b on a.id = b.information_lists_id '
			.'and b.applicable_party = \''.$applicable_party.'\' ';
			if(!empty($detail_id)){
				$sql = $sql.'and b.filetable_id=\''.$detail_id.'\' ';
			}
			$sql = $sql.'where a.applicable_party = \''.$applicable_party.'\' '
			.'and a.project_type=\''.$project_type.'\' '
			.'union all '
			.'select \'\' as information_lists_id,\'\' as information_name,\'\' as information_type,\'\' as applicable_party, '
			.'	b.applicable_person as applicable_person,\'\' as memo,b.id as files_id,b.path,b.received_information_type, '
			.'b.name as file_name '
			.'from files b '
			.'where b.information_lists_id is null '
			.'and b.filetable_id=\''.$detail_id.'\' '
			.'and b.applicable_party = \''.$applicable_party.'\' ';
			// dd($sql);
		$arr = DB::select($sql);
        return $arr;
	}
}