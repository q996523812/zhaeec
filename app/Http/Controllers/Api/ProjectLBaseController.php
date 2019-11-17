<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Handlers\WbjkFileUploadHandler;
use App\Services\InterfaceLogService;
use App\Exceptions\VerifyException;
use Illuminate\Support\Facades\Log;

class ProjectLBaseController extends Controller
{

	protected $jgpt_model_class;
	protected $jgpt_service;
	protected $model_class;
	protected $service;
	protected $logService;
	protected $project_type;

	public function __construct()
    {

    }
    /*
	 *业务申请：数据接口
	 *
	 *jgpt_key为原系统主键标识，下同
	 *
	 *接收：业务数据，json格式{"jgpt_key":"",......},
	 *
	 *返回：接收成功/失败标志及错误类容，json格式{"code":"","message":""}
	 */
    public function store(Request $request)
    {
        $result = [
            'success' => true,
            'message' => '',
            'status_code' => '200'
        ];
        $datas = $request->datas;
        try{
        	$datas = json_decode($datas,true);

            $this->check($datas);

    		if($this->jgpt_service->isExistForKey($datas['jgpt_key'])){
                throw new VerifyException('重复请求，数据已存在');
    		}
            $this->jgpt_service->save($datas);
        }
        catch(VerifyException $e){
            $result = $e->customFunction();
            Log::error($e);
            // return $this->response->error('重复请求，数据已存在', 422);
        }
        catch(\Exception $e){
            $result = $this->serviceException($e->getMessage());
            Log::error($e);
        }
        $this->logService->addReceiveLog($datas,$result['success'],$result);
        return $this->response->array($result)->setStatusCode($result['status_code']);
    	// return $this->response->created();
    }

    public function check($datas){
        $errorinfo = '';
        if(empty($datas['jgpt_key'])){
            $errorinfo .= 'jgpt_key不能为空;';
        }
        if(empty($datas['title'])){
            $errorinfo .= '项目名称title不能为空;';
        }
        throw new VerifyException($errorinfo);
    }
    /**
     * 业务申请：文件接口
     * @param $action 中文字符串，发送/接收
     * @param $message array 发送/接收到的内容
     * @param $is_success 是否发送/接收成功，1 成功，0失败
     * @param $receipt array 发送/接收消息后收到/发送的回执
     * @return 模型实例
     */
    public function files(Request $request){
        $result = [
            'success' => true,
            'message' => '',
            'status_code' => '200'
        ];
        $params = $request->params;
        try{
	        
            $params = $this->dealParams($params);
            $datas = $params['datas'];
            $datas = $this->dealParams($datas);
            $jgpt_key = $datas['jgpt_key'];
            
	        if(!$this->jgpt_service->isExistForKey($jgpt_key)){
                throw new VerifyException('原数据表不存在,UUID：'.$jgpt_key);
    		}
	        $jgpt_detail = $this->jgpt_service->getModelForKey($jgpt_key);

	        //保存文件
	        $uploader = new WbjkFileUploadHandler();
	        $files_data = $uploader->receive($this->project_type);
	        //地址保存到数据库
	        $this->jgpt_service->saveFilesAndImages($jgpt_detail,$files_data);
	    }
        catch(VerifyException $e){
            $result = $e->customFunction();
            Log::error($e);
            // return $this->response->error('重复请求，数据已存在', 422);
        }
        catch(\Exception $e){
            $result = $this->serviceException($e->getMessage());
            Log::error($e);
        }
        $this->logService->addReceiveLog($params,$result['success'],$result);
        return $this->response->array($result)->setStatusCode($result['status_code']);
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

    /**
     * 上传合同接口
     * @return array 
     */
    public function contract(Request $request){
        $result = [
            'success' => true,
            'message' => '',
            'status_code' => '200'
        ];
        $params = $request->params;
        try{
            $params = $this->dealParams($params);
            $datas = $params['datas'];
	        $datas = $this->dealParams($datas);
            $jgpt_key = $datas['jgpt_key'];

	        if(!$this->jgpt_service->isExistForKey($jgpt_key)){
                throw new VerifyException('原数据表不存在,UUID：'.$jgpt_key);
    		}
	        $jgpt_detail = $this->jgpt_service->getModelForKey($jgpt_key);

	        //保存文件
	        $uploader = new WbjkFileUploadHandler();
	        $files_data = $uploader->receive($this->project_type);

	        //文件地址保存到数据库
	        $this->jgpt_service->saveContract($jgpt_detail,$files_data);

	    }
        catch(VerifyException $e){
            $result = $e->customFunction();
            Log::error($e);
            // return $this->response->error('重复请求，数据已存在', 422);
        }
        catch(\Exception $e){
            $result = $this->serviceException($e->getMessage());
            Log::error($e);
        }
        $this->logService->addReceiveLog($datas,$result['success'],$result);
        return $this->response->array($result)->setStatusCode($result['status_code']);
    }

    /**
     *处理获取的参数
     */
    protected function dealParams($params){
        // $type = gettype($params);
        if(is_array($params)){
            
        }
        else if(is_string($params)){
            $params = json_decode($params,true);
        }
        else{
            throw new \Exception('参数格式不正确');
        }
        return $params;
    }

    /**
     *处理服务器运行错误异常
     */
    protected function serviceException($message){
        $result = array(
            'success' => false,
            'message' => $message,
            'status_code' => 500,
        );
        return $result;
    }
}
