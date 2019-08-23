<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\Api\JgptProjectPurchaseRequest;
use App\Models\JgptProjectPurchase;
use App\Models\JgptFile;
use App\Models\File;
use App\Models\Project;
use App\Models\ProjectPurchase;
use App\Handlers\FileUploadHandler;
use App\Handlers\WbjkFileUploadHandler;
use App\Services\ProcessService;
use App\Services\InterfaceLogService;
use App\Services\JgptProjectPurchaseService;
use App\Services\ProjectPurchaseService;
use App\Exceptions\VerifyException;

class JgptProjectPurchasesController extends Controller
{
    public function __construct(JgptProjectPurchaseService $jgptProjectPurchaseService,InterfaceLogService $logService,ProjectPurchaseService $projectPurchaseService)
    {
        $this->jgpt_model_class = JgptProjectPurchase::class;
        $this->jgpt_service = $jgptProjectPurchaseService;
        $this->model_class = ProjectPurchase::class;
        $this->service = $projectPurchaseService;
        $this->logService = $logService;
        $this->project_type = 'qycg';
    }

    /*
	 *撤销业务接口
	 *
	 *接收：Primarykey
	 *
	 *返回：{"code":"","message":"","Primarykey",""}
	 */
    public function cancel(JgptProjectPurchaseRequest $request)
    {
        $receipt = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
    	//系统已接收到业务数据，但业务员尚未办理，可撤回
    	//解析参数到模板
    	$datas = $request->datas;    	
    	$datas = json_decode($datas,true);
        $jgpt_key = $datas['jgpt_key'];
        $message = '';
        $purchase = JgptProjectPurchase::where('jgpt_key',$jgpt_key)->first();
        if($purchase == null){
            $receipt['message'] = '项目不存在';
            $receipt['success'] = 'false';
            $receipt['status_code'] = '400';
        }
        else{
            if(in_array($purchase->status,array('5','6'))){
                $flag = $purchase->delete();
            }
            else{
                $receipt['message'] = '项目已经接收,不能撤销.';
                $receipt['success'] = 'false';
                $receipt['status_code'] = '400';
            }
        }

        return $this->response->array($receipt)->setStatusCode(201);
    } 

    /*
     [
        datas => [
            xmbh => '',
            title => '',
            records => []
        ],
        file=[]
     ]
    * 接收评标结果
    */
    public function pbResult(JgptProjectPurchaseRequest $request,JgptProjectPurchaseService $service,PbResultService $pbResultService,ProcessService $process){
        //解析参数到模板
        $datas = $request->datas;       
        $datas = json_decode($datas,true);
        if(JgptProjectPurchase::where('jgpt_key',$datas['jgpt_key'])->exists()){
            return $this->response->error('重复请求，数据已存在', 422);
        }
        $datas['id'] = (string)Str::uuid();
        $datas['status'] = 5;

        //判断请求中是否包含name=file的上传文件
        $hasfile = $request->hasFile('file');
        if($hasfile){
            $upfile = $request->file('file');
            // $uploader->postFileupload($file);
            $result = $uploader->save($upfile,'jgpt','qycq');

            $file->path = $result['path'];
            $file->name = $result['name'];
            $file->project_type = 'qycq';
            $file->table_id = $datas['id'];
            $file->id = (string)Str::uuid();
            
        }

        DB::transaction(function () use($datas,$hasfile,$file,$pbResultService,$process) {
            $title = $datas['title'];
            $xmbh = $datas['xmbh'];
            $project = Project::where('xmbh',$xmbh);

            if($hasfile){
                $jgptfile->save();
            }
            $file = new File;
            $file->id = (string)Str::uuid();
            $file->project_id = $project->id;
            $file->path = $jgptfile->path;
            $file->name = $jgptfile->name;
            $file->save();
            $pbResultService->batchSave($project,$datas['records']);

            $process->next('qycg',$project->id,'企业上传合同');
        });


        // return $this->response->array($result)->setStatusCode(201);
        return $this->response->created();
    }
    

    //发送挂牌数据接口
    public function sendGpData(JgptProjectPurchaseRequest $request,JgptProjectPurchaseService $service){
        
        $xmbh = $request->xmbh;
        $purchase = ProjectPurchase::where('xmbh',$xmbh)->first();
        $purchase_id = $request->purchase_id;
        $receipt = $service->sendGpData($purchase_id);

        $result = [
            'success' => 'true',
            'msg' => '成功',
            'status' => '200'
        ];
        return $this->response->array($result)->setStatusCode(201);
    }

    //发送中标数据接口
    public function sendZbData(JgptProjectPurchaseRequest $request,JgptProjectPurchaseService $service){
        
        $xmbh = $request->xmbh;
        $purchase = ProjectPurchase::where('xmbh',$xmbh)->first();
        $receipt = $service->sendZbData($purchase);

        $result = [
            'success' => 'true',
            'msg' => '成功',
            'status' => '200'
        ];
        return $this->response->array($result)->setStatusCode(201);
    }



    //模拟国资委接收接口
    public function rebackDatas(JgptProjectPurchaseRequest $request){
        $datas = $request->datas;       
        $datas = json_decode($datas,true);
        $result = [
            'success' => 'true',
            'msg' => '成功',
            'status' => '200'
        ];
        $receive_message = $request->all();
        $logService->addReceiveLog('接收',null,null,$receive_message,1,$result);
        return $this->response->array($result)->setStatusCode(201);
    }
}
