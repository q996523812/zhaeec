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

    /**
     *根据项目类型，收费方式，获取收费规则
     *@param project 项目模型实例
     *@param charge_type 收费方式
     */
    public function getRuleByType($project,$charge_type){
    	$rule = null;
    	$rules = ChargeRule::where('project_type',$project->type)->where('charge_type',$charge_type);
    	switch($project->type){
    		case 'zczl':
    			$rule = $rules->first();
    			break;
    		case 'qycg':
    			if($charge_type == 1){
    				$rule = $rules->where('service_type',$project->detail->bdyx)->first();
    			}
    			else{
    				$rule = $rules->first();
    			}
    			break;
    	}
    	return $rule;
    }

    public function calculation($project,$price_total,$price_unit){
    	$rule = $this->getRule($project);
    	$subs = $rule->subs;
    	$charge = 0;

		switch($project->type){
    		case 'zczl':
    			$charge = $this->zczl($subs,$price_unit,$project->detail->zlqx);
    			break;
    		case 'qycg':
    			$charge = $this->qycg($subs,$price_total);
    			break;
    	}

    	return $charge;
    }

    /**
     *默认获取标准收费方式
     *@param project 
     */
    public function getRule($project){
    	$rule = $this->getRuleByType($project,1);
    	return $rule;
    }

    /**
     *计算服务费：租赁项目
     *@param subs 收费标准,费率列表
     *@param amount 成交价格,单价
     *@param years 租赁期限
     */
    public function zczl($subs,$amount,$years){
    	$charge = 0;
    	$current_sub = $subs->where('start','<',$years)->where('end','>=',$years)->first();
    	// foreach ($subs as $sub) {
    	// 	if($sub->seq < $current_sub->seq){
    	// 		$charge += $amount * 12 * ($sub->end - $sub->start) * $sub->rate;
    	// 	}
    	// 	else if($sub->seq == $current_sub->seq){
    	// 		$charge += $amount * 12 * ($years - $sub->start) * $sub->rate;
    	// 	}
    	// 	else{
    	// 		break;
    	// 	}
    	// }
    	for($i = 1; $i <= $current_sub->seq; $i++){
    		$sub = $subs->where('seq',$i)->first();
    		if($i == $current_sub->seq){
    			$charge += $amount * 12 * ($years - $sub->start) * $sub->rate;
    		}
    		else if($i < $current_sub->seq){
    			$charge += $amount * 12 * ($sub->end - $sub->start) * $sub->rate;
    		}
    	}
    	return $charge;
    }

    /**
     *计算服务费：采购项目,速算方式
     *@param subs 收费标准,费率列表
     *@param amount 成交价格，总价
     *@param service_type 服务类型
     */
    public function qycg_quick($subs,$amount){
    	$charge = 0;
    	$current_sub = $subs->where('start','<',$amount)->where('end','>=',$amount)->first();
    	$charge = $current_sub->quick_num + ($amount - $current_sub->start) * $current_sub->rate;
    	return $charge;
    }

    /**
     *计算服务费：采购项目
     *@param subs 收费标准,费率列表
     *@param amount 成交价格，总价
     */
    public function qycg($subs,$amount){
    	$charge = 0;
    	$current_sub = $subs->where('start','<',$amount)->where('end','>=',$amount)->first();
    	for($i = 1; $i <= $current_sub->seq; $i++){
    		$sub = $subs->where('seq',$i)->first();
    		$a = 0;
    		if($i == $current_sub->seq){
    			$a += ($amount - $sub->start) * $sub->rate;
    		}
    		else{
    			$a += ($sub->end - $sub->start) * $sub->rate;
    		}
    		$charge += $a;
    	}
    	return $charge;
    }

}