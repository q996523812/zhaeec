<?php
namespace App\Handlers;

// use Image;
use App\Models\JgptFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WbjkFileUploadHandler
{
	protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];
	protected $fileUploadHandler;
	protected $imageUploadHandler;
	public function __construct()
    {
    	$this->fileUploadHandler = new FileUploadHandler();
		$this->imageUploadHandler = new ImageUploadHandler();
    }
	public function batchUpload($files, $folder, $file_prefix){
		$res = array();
		$res1 = array();
		$res2 = array();
		if( is_array($files) ){
			foreach($files as $file){
		        $extension = strtolower($file->getClientOriginalExtension());
				$re = [];
				// 如果上传的是图片
		        if (in_array($extension, $this->allowed_ext)) {
		            $re = $this->imageUploadHandler->save($file, $folder, $file_prefix);
		            array_push($res1,$re);
		        }
		        else{
		        	$re = $this->fileUploadHandler->save($file, $folder, $file_prefix);
		        	$re['name'] = $file->getClientOriginalName();
		        	array_push($res2,$re);
		        }
			}
		}
		else{
			$res2[] = get_class_methods($files);
			$res2[] = $files->getClientOriginalName();
			$res2[] = $files->getGroup;
		}

		$res['files'] = $res2;
		$res['images'] = $res1;
		return $res;
	}

	public function upload($file, $folder, $file_prefix){
		$extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
		$re = null;
		// 如果上传的是图片
        if (in_array($extension, $this->allowed_ext)) {
            $re = $this->imageUploadHandler->save($file, $folder, $file_prefix);
        }
        else{
        	$re = $this->fileUploadHandler->save($file, $folder, $file_prefix);
        	$re['name'] = $file->name;
        }
		return $re;
	}

	public function receive($folder){
		$result = [];
		$result_files = [];
		$result_images = [];
		
		$file_folder_name = "storage/uploads/files/$folder/" . date("Ym", time()) . '/'.date("d", time()).'/';
		$image_folder_name = "storage/uploads/images/$folder/" . date("Ym", time()) . '/'.date("d", time());
		// $files = file_get_contents('php://input');
		if(!is_dir($file_folder_name)){
			mkdir($file_folder_name,0777,true);
		}
		if(!is_dir($image_folder_name)){
			mkdir($image_folder_name,0777,true);
		}
		
		
		$files = $_FILES['files'];
		$tmp_names = $files['tmp_name'];
		$file_names = $files['name'];
		for($i=0;$i<count($file_names);$i++){
			$file_name = $file_names[$i];//原文件名，不包含路径
			$extension = $this->getExtendName($file_name);
			$file_name_new = time() . '_' . str_random(10) . '.' . $extension;//新文件名
			$file_path = $file_folder_name.$file_name_new;//文件存储路径，含文件名
			$isimage = in_array($extension, $this->allowed_ext);//文件是否为图片
			if($isimage){
				$file_path = $image_folder_name.$file_name_new;//图片存储路径，含文件名
			}
			$a = move_uploaded_file($tmp_names[$i], $file_path);
			if($a){
				$file = array(
					'path' => $file_path
				);
				if(!$isimage){
					$file['name'] = $file_name;
					$result_files[] = $file;
				}
				else{
					$result_images[] = $file;
				}
				
			}
		}
		$result['files'] = $result_files;
		$result['images'] = $result_images;
		return $result;
	}

	public function getExtendName($filename){
		$a = explode('.', $filename);
		$extendName = $a[count($a)-1];
		return strtolower($extendName);
	}
}