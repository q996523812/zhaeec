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
		$logService = new InterfaceLogService;
		$interfaceLog = $logService->addSendLog('发送',null,$data['xmpname'],$param,1,$result);
		return $result;
	}

}	