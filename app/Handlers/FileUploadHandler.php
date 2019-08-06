<?php
namespace App\Handlers;

// use Image;
use App\Models\JgptFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadHandler
{
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function batchUpload($datas, $folder, $file_prefix){
        $res = array();
        
        foreach($datas as $file){
            $type = $file['type'];
            $re = $this->save($file['path'], $folder, $file_prefix);
            $re['type'] = $type;
            array_push($res,$re);
        }
        return $res;
    }

    

    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "storage/uploads/files/$folder/" . date("Ym", time()) . '/'.date("d", time()).'/';
        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;
        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension());
        //获取旧的文件名（不包含路径）
        $oldname = $file->getClientOriginalName();

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;
        // 如果上传的不是图片将终止操作
        // if ( ! in_array($extension, $this->allowed_ext)) {
        //     return false;
        // }
        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);
        // 如果限制了图片宽度，就进行裁剪
        // if ($max_width && $extension != 'gif') {
        //     // 此类中封装的函数，用于裁剪图片
        //     $this->reduseSize($upload_path . $filename, $max_width);
        // }
        // $this->reduseSize($upload_path . $filename, $max_width);
        return [
            'path' => config('app.url') . "/$folder_name$filename",
            'name' => $oldname,
        ];
    }
    public function reduseSize($file_path, $max_width)
    {
        
        // 先实例化，传参是文件的磁盘物理路径
        $JgptFile = JgptFile::make($file_path);
        // 进行大小调整的操作
        // $image->resize($max_width, null, function ($constraint) {
        //     // 设定宽度是 $max_width，高度等比例双方缩放
        //     $constraint->aspectRatio();
        //     // 防止裁图时图片尺寸变大
        //     $constraint->upsize();
        // });
        // 对图片修改后进行保存
        $JgptFile->save();
        
    }

    public function postFileupload($file){
        
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $destPath = realpath(public_path('images'));
        if(!file_exists($destPath))
            mkdir($destPath,0755,true);
        $filename = $file->getClientOriginalName();
        if(!$file->move($destPath,$filename)){
            exit('保存文件失败！');
        }
        exit('文件上传成功！');
    }

}