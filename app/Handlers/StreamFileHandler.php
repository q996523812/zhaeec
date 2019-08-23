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
			$data = array(
				'file1' => file_get_contents($file)
			);
			$opts = array( 
			  	'http' => array( 
				    'method' => 'POST', 
				    'header' => 'content-type:multipart/form-data', 
				    'content' => http_build_query($data) 
			  	) 
			); 
			// dd($opts);
			ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
			$context = stream_context_create($opts);

			$response = file_get_contents($url, false, $context); 
			$ret = json_decode($response, true); 
			return $ret['success']; 
		}else{ 
			return false; 
		} 
	}
	public function send2($url, $data){ 
			$data = http_build_query($data);

			$opts = array( 
			  	'http' => array( 
				    'method' => 'POST', 
				    'header' => 'content-type:application/x-www-form-urlencoded', 
				    'content' => $data 
			  	) 
			); 
			ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
			$context = stream_context_create($opts);
			$response = file_get_contents($url, false, $context); 
			$ret = json_decode($response, true); 
			return $ret['success']; 
	}

	public function test($receiveFile,$streamData){
		if(empty($streamData)){ 
			$streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : ''; 
			if(empty($streamData)){ 
				$streamData = file_get_contents('php://input'); 
			} 
		}
		
		// else{
		// 	$streamData = file_get_contents($streamData);
		// }
		
		if($streamData!=''){ 
			$ret = file_put_contents($receiveFile, $streamData, true);
		}else{ 
			$ret = false; 
		} 
		return $streamData; 
	}
}