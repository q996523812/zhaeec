<?php

namespace App\Services;

use App\Models\IntentionalParty;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class IntentionalPartyService
{
	public function add($insert,$process){
		$user = Admin::user();
		
        $workProcessNodeService = new WorkProcessNodeService();
        $node = $workProcessNodeService->find('yxdj',$process);
        $insert['id'] = (string)Str::uuid();
        $insert['status'] = 1;
        $insert['process'] = $node->code;
		$insert['process_name'] = $node->name;

        
        $detail = DB::transaction(function () use($insert) {
			$detail = IntentionalParty::create($insert);
		    
		    return $detail;
		});
        return $detail;
	}

	public function update($id,$update,$process){
		DB::transaction(function () use($id,$update) {
			$detail = IntentionalParty::find($id);
			$detail->update($update);
		});
	}

	public function submit($id){
		$detail = IntentionalParty::find($id);
		$instance = $detail->instance;
		if(!empty($instance)){
			return;
		}
		DB::transaction(function () use($detail) {
			$process = new ProcessService();
			$process->create('yxdj',$detail->id,'提交',13);
		});
	}

	public function approval($id,$reason,$operation,$nodecode){
		DB::transaction(function () use($id,$reason,$operation,$nodecode) {
			$process = new ProcessService();
			$process->next($id,$reason,$operation,$nodecode);
		});
	}	

	/**
	 *@param $ids 字符串，以","分割，例如：1,2,3
	 *@return  意向方名称，以","分割，例如：a,b,c
	 */
	public function findNamesByIds($ids){
		$ids = explode(',',$ids);
		$names = IntentionalParty::whereIn('id',$ids)->pluck('name');
		$names = implode(',',$names->toArray());
		return $names;
	}

}