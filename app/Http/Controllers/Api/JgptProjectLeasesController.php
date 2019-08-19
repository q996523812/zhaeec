<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\Api\JgptProjectLeaseRequest;
use App\Models\JgptProjectLease;
use App\Models\JgptFile;
use App\Handlers\FileUploadHandler;
use App\Handlers\WbjkFileUploadHandler;
use App\Handlers\StreamFileHandler;
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
        
        DB::transaction(function () use($datas) {
            $purchases = JgptProjectLease::create($datas);
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
    public function files(Request $request,InterfaceLogService $logService){
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        //解析参数到模板
        $datas = $request->datas; 
        $receive_message = $datas;
        
        $datas = json_decode($datas,true);

        // if(!JgptProjectLease::where('jgpt_key',$datas['jgpt_key'])->exists()){
        //     $logService->addReceiveLog('接收',$datas['jgpt_key'],$datas['jgpt_key'],$receive_message,0,'原数据表不存在');
        //     return $this->response->error('原数据表不存在,UUID：'.$datas['jgpt_key'], 422);
        // }
        // $jgpt_detail = JgptProjectLease::where('jgpt_key',$datas['jgpt_key'])->first();

        $hasfile = $request->hasFile('files');
        $files1 = $request->files; 
        $files1_json_decode = json_decode($datas,true);

        // $hasfile = $_FILES['file1'];
        $result['hasfile'] = $hasfile;
        $result['files1_type'] = gettype($files1);
        $result['files1'] = $files1;
        $result['files1_json_decode'] = gettype($files1_json_decode);

        if(!empty($files1)){
            $result['isfiles1'] = '1';
        }
        else{
            $result['isfiles1'] = '2';
        }
        if(!empty($files1_json_decode)){
            $result['isfiles1_json_decode'] = '1';
        }
        else{
            $result['isfiles1_json_decode'] = '2';
        }


//         $filepath = public_path() . '/storage/uploads/files/postman/test333.txt';
// $result['filepath'] = $filepath;
//         $stream = new StreamFileHandler();
//         $aaa = $stream->test($filepath,$files1);
        if(true){

            // $upfiles = $request->file('files');
            $upfiles = $files1;
            // $upfiles = $_FILES['file1'];
            // dd($upfiles);
            $uploader = new WbjkFileUploadHandler();
            // $uploader->postFileupload($file);
            $result1 = $uploader->batchUpload($upfiles,'jgpt','zczl');
            $jgptfiles = [];
            foreach ($result1['files'] as $arrFile) {
                $jgptfile = new JgptFile;
                $jgptfile->name = $arrFile['name'];
                $jgptfile->path = $arrFile['path'];
                $jgptfile->id = (string)Str::uuid();
                $jgptfiles[] = $jgptfile;
            }
            // $result['message'] = $jgptfiles;
            // $jgpt_detail->files()->saveMany($jgptfiles);
            // $jgptimages = [];
            // foreach ($result1['files'] as $arrFile) {
            //     $jgptimage = new JgptImage();
            //     $jgptimage->path = $arrFile['path'];
            //     $jgptimages[] = $jgptimage;
            // }
            // $jgpt_detail->images()->save($jgptimages);
            
        }
        

        return $this->response->array($result)->setStatusCode(201);
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
        return $this->response->array($result)->setStatusCode(201);
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
