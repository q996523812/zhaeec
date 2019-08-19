<?php
namespace App\Handlers;

class StreamFileHandler
{
	/** php 接收流文件 
	* @param String $receiveFile 接收后保存的文件名 
	* @return boolean 
	*/
	public function receive($receiveFile){
		$streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : ''; 

		if(empty($streamData)){ 
			$streamData = file_get_contents('php://input'); 
		} 

		if($streamData!=''){ 
			$ret = file_put_contents($receiveFile, $streamData, true);
		}else{ 
			$ret = false; 
		} 
		return $streamData; 
	}

	/** php 发送流文件 
	* @param String $url 接收的路径 
	* @param String $file 要发送的文件 
	* @return boolean 
	*/
	public function send($url, $file){ 
		if(file_exists($file)){ 
		$opts = array( 
		  	'http' => array( 
			    'method' => 'POST', 
			    'header' => 'content-type:application/x-www-form-urlencoded', 
			    'content' => file_get_contents($file) 
		  	) 
		); 
		$context = stream_context_create($opts); 
		$response = file_get_contents($url, false, $context); 
		$ret = json_decode($response, true); 
			return $ret['success']; 
		}else{ 
			return false; 
		} 
	}

	public function test($receiveFile,$streamData){
		if($streamData!=''){ 
			$ret = file_put_contents($receiveFile, $streamData, true);
		}else{ 
			$ret = false; 
		} 
		return $streamData; 
	}
}