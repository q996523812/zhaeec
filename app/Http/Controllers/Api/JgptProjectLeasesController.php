<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\Api\JgptProjectLeaseRequest;
use App\Models\JgptProjectLease;
use App\Models\JgptFile;
use App\Handlers\FileUploadHandler;
use App\Services\InterfaceLogService;

class JgptProjectLeasesController extends Controller
{
    /*
	 *申请业务接口
	 *
	 *Primarykey为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"Primarykey":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":"","Primarykey",""}
	 */
    public function store(JgptProjectLeaseRequest $request,FileUploadHandler $uploader,JgptFile $file,InterfaceLogService $logService)
    {
    	//解析参数到模板
    	$datas = $request->datas; 
        $receive_message = $datas; 	
    	$datas = json_decode($datas,true);
		if(JgptProjectLease::where('jgpt_key',$datas['jgpt_key'])->exists()){
            
            $logService->addReceiveLog('接收',$datas['xmbh'],$datas['title'],$receive_message,0,'重复请求，数据已存在');
			return $this->response->error('重复请求，数据已存在', 422);
		}
		$datas['id'] = (string)Str::uuid();
		$datas['status'] = 5;

		//判断请求中是否包含name=file的上传文件
		$hasfile = $request->hasFile('file');
        if($hasfile){
            $upfile = $request->file('file');
        	// $uploader->postFileupload($file);
			$result = $uploader->save($upfile,'jgpt','zczl');

			$file->path = $result['path'];
			$file->name = $result['name'];
	        $file->project_type = 'zczl';
	        $file->table_id = $datas['id'];
	        $file->id = (string)Str::uuid();
	        
        }
        $streamData = file_get_contents("php://input")
        if($streamData!=''){  
            $ret = file_put_contents($receiveFile, $streamData, true);  
        }else{  
            $ret = false;  
        } 
        DB::transaction(function () use($datas,$hasfile,$file) {
            $purchases = JgptProjectLease::create($datas);
            if($hasfile){
            	$file->save();
            }
        });

    	$result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        
        $logService->addReceiveLog('接收',$datas['xmbh'],$datas['title'],$receive_message,1,$result);
        return $this->response->array($result)->setStatusCode(201);
    	// return $this->response->created();
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


        return $this->response->array($result)->setStatusCode(201);
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
    * 接收合同
    */
    public function contract(JgptProjectPurchaseRequest $request,FileUploadHandler $uploader,ProcessService $process)
    {
        $datas = $request->datas;       
        $datas = json_decode($datas,true);
        $purchase = JgptProjectPurchase::where('jgpt_key',$datas['jgpt_key'])->first();
        if($purchase == null){
            return $this->response->error('未找到项目', 422);
        }        
        //判断请求中是否包含name=file的上传文件
        $hasfile = $request->hasFile('file');
        if($hasfile){
            $upfile = $request->file('file');
            // $uploader->postFileupload($file);
            $result = $uploader->save($upfile,'jgpt','qycq');

            $jgptfile = new jgptfile;
            $jgptfile->path = $result['path'];
            $jgptfile->name = $result['name'];
            $jgptfile->project_type = 'qycq';
            $jgptfile->table_id = $purchase['id'];
            $jgptfile->id = (string)Str::uuid();
            
        }


        DB::transaction(function () use($datas,$hasfile,$jgptfile,$process) {
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

            $process->next('qycg',$project->id,'企业上传合同');
        });
    } 


}
