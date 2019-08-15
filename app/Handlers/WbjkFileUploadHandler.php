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
			$res1[] = 111;
		}
		else{
			$res2[] = get_class_methods($files);
			$res2[] = $files->getClientOriginalName();
			$res2[] = $files->getGroup;
		}
		foreach($files as $file){$res2[] = 333;
	        $extension = strtolower($file->getClientOriginalExtension());
			$re = null;
			// 如果上传的是图片
	        if (in_array($extension, $this->allowed_ext)) {
	            $re = $this->imageUploadHandler->save($file, $folder, $file_prefix);
	            array_push($res1,$re);
	        }
	        else{
	        	$re = $this->fileUploadHandler->save($file, $folder, $file_prefix);
	        	$re['name'] = $file->name;
	        	array_push($res2,$re);
	        }
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
}