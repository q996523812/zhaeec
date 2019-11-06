<?php
namespace App\Handlers;
use Illuminate\Support\Arr;
use App\Services\InterfaceLogService;

class JgptCurlHandler
{

	public function curl($url,$data){
		$key = 'GZW';//由国资委指定
		$randomNum = rand(10000, 99999);
		$time = time();
		$AA = [MD5($key),$time,$randomNum];
		$token = MD5(implode('',Arr::sort($AA)));

		$param = [
			'randomNum' =>  $randomNum,
			'time' => $time,
			'token' => $token,
			// 'datas' => json_encode($data),
			'datas' => $data,
		];
		$result = CurlHandler::curl($url,$param,1,0);
		Log::info($result);
		$result = json_decode($result,true);

		// $message = json_encode($message,JSON_UNESCAPED_UNICODE);
		$success = 1;
		if($result['status'] === 200){
			$success = 1;
		}
		else{
			$success = 0;
		}
		$logService = new InterfaceLogService;
		// $interfaceLog = $logService->addSendLog('发送',null,$data['uuid'],$param,1,$result);
		$logService->addLog('发送',$param,$success,$result);
		return $result;
	}

	public function curlFile($url,$data,$file_path){
		$key = 'GZW';//由国资委指定
		$randomNum = rand(10000, 99999);
		$time = time();
		$AA = [MD5($key),$time,$randomNum];
		$token = MD5(implode('',Arr::sort($AA)));

		$param = [
			'randomNum' =>  $randomNum,
			'time' => $time,
			'token' => $token,
			// 'datas' => json_encode($data),
			'datas' => $data,
			// 'file1' => $file,
		];
		// throw new \Exception(json_encode($param));
		$result = CurlHandler::post($url,$param,$file_path,1,0);
		$result = json_decode($result,true);

		$success = 1;
		if($result['success'] === true){
			$success = 1;
		}
		else{
			$success = 0;
		}
		$logService = new InterfaceLogService;
		// $interfaceLog = $logService->addSendLog('发送',null,$data['uuid'],$param,1,$result);
		$logService->addLog('发送',$param,$result['success'],$result);
		return $result;
	}

}	