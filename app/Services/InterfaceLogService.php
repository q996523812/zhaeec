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
     * @param $message  发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt  发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addLog($action,$message,$is_success,$receipt){
		$message = $this->formatToJson($message);
		$receipt = $this->formatToJson($receipt);
		
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
     * @param $message  发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt  发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addSendLog($message,$is_success,$receipt){
		$interfaceLog = $this->addLog('发送',$message,$is_success,$receipt);
		return $interfaceLog;
	}

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $message  发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt  发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
	public function addReceiveLog($message,$is_success,$receipt){
		$interfaceLog = $this->addLog('接收',$message,$is_success,$receipt);
		return $interfaceLog;
	}

    protected function formatToJson($o){
        // $type = gettype($params);
        if(is_array($o)){
            $o = json_encode($o,JSON_UNESCAPED_UNICODE);
        }
        else if(is_string($o)){

        }
        else{
            throw new \Exception('参数格式不正确');
        }
        return $o;
    }
}