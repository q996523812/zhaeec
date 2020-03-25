<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download(Request $request){ 
    	$file_name = $request->file_name;//文件名，用于下载时的重命名
    	$file_dir = $request->file_dir;//文件地址，包含文件名

    	$file_name = urldecode($file_name);
    	$file_dir = urldecode($file_dir);
    	
    	//如果file_name不包含扩展名，则生成扩展名
    	$arr1 = explode('.',$file_name);
    	if(count($arr1)<=1){
    		$arr2 = explode('.',$file_dir);
	    	$extend_name = $arr2[count($arr2)-1];
	    	$file_name = $file_name.'.'.$extend_name;
    	}
    	
    	//检查文件是否存在    
    	if (! file_exists ( $file_dir)) {    
		    header('HTTP/1.1 404 NOT FOUND');  
		} else {
			ob_end_clean();//清除缓冲区
		    //以只读和二进制模式打开文件   
		    $file = fopen ( $file_dir, "rb" ); 
		    //告诉浏览器这是一个文件流格式的文件    
		    Header ( "Content-type: application/octet-stream" ); 
		    //请求范围的度量单位  
		    Header ( "Accept-Ranges: bytes" );  
		    //Content-Length是指定包含于请求或响应中数据的字节长度    
		    Header ( "Accept-Length: " . filesize ( $file_dir ) );  
		    //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
		    Header ( "Content-Disposition: attachment; filename=" . $file_name );    
		    //读取文件内容并直接输出到浏览器    
		    echo fread ( $file, filesize ( $file_dir) );    
		    fclose ( $file );    
		    exit ();
		}
    }
}
