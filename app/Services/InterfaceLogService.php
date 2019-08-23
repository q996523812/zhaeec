<?php

namespace App\Services;

use App\Models\InterfaceLog;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Str;

class InterfaceLogService
{

	public function __construct(){

	}

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $action 中文字符串，发送/接收
     * @param $message array 发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt array 发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addLog($action,$message,$is_success,$receipt){
		$message = json_encode($message,JSON_UNESCAPED_UNICODE);
		$receipt = json_encode($receipt,JSON_UNESCAPED_UNICODE);
		
		$interfaceLog = InterfaceLog::create([
			'action' => $action,
			'message' => $message,
			'is_success' => $is_success,
			'receipt' => $receipt,
		]);
		return $interfaceLog;
	}

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $action 中文字符串，发送/接收
     * @param $message array 发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt array 发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addSendLog($action,$message,$is_success,$receipt){
		$message = json_encode($message,JSON_UNESCAPED_UNICODE);
		// $receipt = json_encode($receipt,JSON_UNESCAPED_UNICODE);
		
		$interfaceLog = InterfaceLog::create([
			'action' => $action,
			'message' => $message,
			'is_success' => $is_success,
			'receipt' => $receipt,
		]);
		return $interfaceLog;
	}

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $action 中文字符串，发送/接收
     * @param $message array 发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt array 发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addReceiveLog($action,$message,$is_success,$receipt){
		$message = json_encode($message,JSON_UNESCAPED_UNICODE);
		$receipt = json_encode($receipt,JSON_UNESCAPED_UNICODE);
		
		$interfaceLog = InterfaceLog::create([
			'action' => $action,
			'message' => $message,
			'is_success' => $is_success,
			'receipt' => $receipt,
		]);
		return $interfaceLog;
	}

}