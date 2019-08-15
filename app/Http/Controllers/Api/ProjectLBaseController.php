<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class ProjectLBaseController extends Controller
{

	protected $jgpt_model_class;
	protected $model_class;
	protected $jgpt_service;
	protected $service;

    /*
	 *申请业务接口,接收单个表单数据
	 *
	 *Primarykey为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"Primarykey":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":"","Primarykey",""}
	 */
    public function store(){
        $receipt = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
    	//解析参数到模板
    	$datas = $request->datas;
        $receive_message = $request->all();
        $datas = json_decode($datas,true);
    	$logService = new InterfaceLogService();
		if($this->jgpt_model_class::where('jgpt_key',$datas['jgpt_key'])->exists()){
            $logService->addReceiveLog('接收',null,$datas['title'],$receive_message,0,'重复请求，数据已存在');
			return $this->response->error('重复请求，数据已存在', 422);
            // $result['message'] = '重复请求，数据已存在';
            // return $this->response->array($datas)->setStatusCode(202);
		}
        $jgpt_detail = $this->jgpt_service->save($datas);

        $logService->addReceiveLog('接收',null,null,$receive_message,1,$receipt);

        return $this->response->array($receipt)->setStatusCode(201);
    	// return $this->response->created();
    }

    /*
	 *申请业务接口,接收批量表单数据
	 *
	 *Primarykey为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"Primarykey":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":"","Primarykey",""}
	 */
    public function batchStore(){

    }
    /*
	 *单个接收文件接口
	 *
	 *Primarykey为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"Primarykey":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":"","Primarykey",""}
	 */
    public function file(Request $request){

    }
    /*
	 *批量接收文件接口
	 *
	 *Primarykey为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"Primarykey":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":"","Primarykey",""}
	 */
    public function files(Request $request){
    	$result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        $hasfile = $request->hasFile('file');
        $result['hasfile'] = $hasfile;
        if($hasfile){
            $upfiles = $request->file('file');
            $uploader = new WbjkFileUploadHandler();
            $result1 = $uploader->batchUpload($upfiles,'jgpt','zczl');
// JgptFile
            
        }
        return $this->response->array($result)->setStatusCode(201);
    }

    /*
	 *撤销业务接口
	 *
	 *接收：Primarykey
	 *
	 *返回：{"code":"","message":"","Primarykey",""}
	 */
    public function cancel(Request $request)
    {

    }

    /*
	 *批量撤销业务接口
	 *
	 *接收：Primarykey
	 *
	 *返回：{"code":"","message":"","Primarykey",""}
	 */
    public function batchCancel(Request $request)
    {

    }

}
