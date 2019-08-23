<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests\Api\JgptProjectLeaseRequest;
use App\Models\JgptProjectLease;
use App\Models\ProjectLease;
use App\Services\InterfaceLogService;
use App\Services\JgptProjectLeaseService;
use App\Services\ProjectLeaseService;
use App\Exceptions\VerifyException;

class JgptProjectLeasesController extends ProjectLBaseController
{

    public function __construct(JgptProjectLeaseService $jgptProjectLeaseService,InterfaceLogService $logService,ProjectLeaseService $projectLeaseService)
    {
        $this->jgpt_model_class = JgptProjectLease::class;
        $this->jgpt_service = $jgptProjectLeaseService;
        $this->model_class = ProjectLease::class;
        $this->service = $projectLeaseService;
        $this->logService = $logService;
        $this->project_type = 'zczl';
    }

    public function file(Request $request){
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        
        $filepath = public_path() . '/storage/uploads/files/postman/test444.text';

        // $folder_name = "storage/uploads/files/$folder/" . date("Ym", time()) . '/'.date("d", time()).'/';
        // $upload_path = public_path() . '/' . $folder_name;
        $stream = new StreamFileHandler();
        $aaa = $stream->receive($filepath);
        $result['aaa'] = $aaa;
        $result['aaa_type'] = gettype($aaa);
        return $this->response->array($result)->setStatusCode(200);
    }
    /*
	 *撤销业务接口
	 *
	 *接收：Primarykey
	 *
	 *返回：{"code":"","message":"","Primarykey",""}
	 */
    public function cancel(JgptProjectLeaseRequest $request)
    {
    	//系统已接收到业务数据，但业务员尚未办理，可撤回
    	//解析参数到模板
    	$datas = $request->datas;    	
    	$datas = json_decode($datas,true);
    	// $where = function($query)
    	// {
    	// 	$query->whereIn('status',[5,6]);
    	// }
    	// $purchase = JgptPurchase::where('jgpt_key',$datas['jgpt_key']);
    	// if(!$purchase->andWhere($where)->exists()){
            // $interfaceLog->receive_receipt = '重复请求，数据已存在';
            // $interfaceLog->is_send_success = 0;
            // $interfaceLog->save();
    	// 	return $this->response->error('项目已审核通过，不能撤销', 422);
    	// }
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        $interfaceLog->receive_receipt = $result;
        $interfaceLog->is_send_success = 1;
        $interfaceLog->save();


        return $this->response->array($result)->setStatusCode(200);
    } 



}
