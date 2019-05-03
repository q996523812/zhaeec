<?php

namespace App\Services;

use App\Models\InterfaceLog;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Str;

class InterfaceLogService
{

	public function __construct(){

	}

	public function addSendLog($action,$xmbh,$title,$send_message,$is_send_success=null,$send_receipt=null){
		$send_message = json_encode($send_message);
		if(!empty($receive_receipt)){
			$send_receipt = json_encode($send_receipt);
		}
		$interfaceLog = InterfaceLog::create([
			'action' => $action,
			'xmbh'	=> $xmbh,
			'title'	=> $title,
			'send_message' => $send_message,
			'is_send_success' => $is_send_success,
			'send_receipt' => $send_receipt,
		]);
		return $interfaceLog;
	}

	public function addReceiveLog($action,$xmbh,$title,$receive_message,$is_receive_success=null,$receive_receipt=null){
		$receive_message = json_encode($receive_message);
		if(!empty($receive_receipt)){
			$receive_receipt = json_encode($receive_receipt);
		}
		$interfaceLog = InterfaceLog::create([
			'action' => $action,
			'xmbh'	=> $xmbh,
			'title'	=> $title,
			'receive_message' => $receive_message,
			'is_receive_success' => $is_receive_success,
			'receive_receipt' => $receive_receipt
		]);
		return $interfaceLog;
	}

}