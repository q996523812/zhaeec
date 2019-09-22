<?php

namespace App\Services;

use App\Models\ChargeRule;
use App\Models\ChargeRuleSub;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ChargeRuleService
{
	public function __construct()
    {

    }

    public function test(){

    }

    public function calculation($project,$amount,$service_type){
    	$rule = $this->getRule($project,$service_type);
    	$subs = $rule->subs;
    	$charge = 0;
		switch($project->type){
    		case 'zczl':
    			$charge = $this->zczl($subs,$amount,$project->detail->zlqx);
    			break;
    		case 'qycg':
    			$charge = $this->qycg($subs,$amount);
    			break;
    	}
    	$result = [
    		'charge' => $charge,
    		'rule_id' => $rule->id,
    	];
    	return $result;
    }

    public function getRule($project,$service_type){
    	$rule = null;
    	$rules = ChargeRule::where('project_type',$project->type)->where('charge_type',1);
    	switch($project->type){
    		case 'zczl':
    			$rule = $rules->first();
    			break;
    		case 'qycg':
    			$rule = $rules->where('service_type',$service_type)->first();
    			break;
    	}
    	return $rule;
    }

    /**
     *计算服务费：租赁项目
     *@param subs 收费标准,费率列表
     *@param amount 成交价格
     *@param years 租赁期限
     */
    public function zczl($subs,$amount,$years){
    	$charge = 45;
    	$sub = $subs->where('start','>',$years)->where('end','<=',$years)->first();

    	return $charge;
    }

    /**
     *计算服务费：采购项目
     *@param subs 收费标准,费率列表
     *@param amount 成交价格
     *@param service_type 服务类型
     */
    public function qycg($subs,$amount){
    	$charge = 0;
    	$sub = $subs->where('start','>',$amount)->where('end','<=',$amount)->first();
    	$charge = $sub->quick_num + ($amount - $sub->start) * $sub->rate;
    	return $charge;
    }

}