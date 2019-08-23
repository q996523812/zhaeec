<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Handlers\WbjkFileUploadHandler;
use App\Services\InterfaceLogService;
use App\Exceptions\VerifyException;

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
    		if($this->jgpt_service->isExistForKey($datas['jgpt_key'])){
                throw new VerifyException('重复请求，数据已存在');
    		}
            $this->jgpt_service->save($datas);
        }
        catch(VerifyException $ve){
            $result['success'] = false;
            $result['message'] = $ve->getMessage();
            $result['status_code'] = 422;
            
        }
        catch(\Exception $e){
        	$result['success'] = false;
            $result['message'] = $e->getMessage();
            $result['status_code'] = 433;
            // return $this->response->error('重复请求，数据已存在', 433);
        }
        $this->logService->addLog('接收',$datas,$result['success'],$result);
        return $this->response->array($result)->setStatusCode($result['status_code']);
    	// return $this->response->created();
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
	        
	        $params = json_decode($params,true);
	        $datas = $params['datas'];
	        $jgpt_key = $datas['jgpt_key'];
	        if(!$this->jgpt_service->isExistForKey($datas['jgpt_key'])){
                throw new VerifyException('原数据表不存在,UUID：'.$datas['jgpt_key']);
    		}
	        $jgpt_detail = $this->jgpt_service->getModelForKey($datas['jgpt_key']);

	        //保存文件
	        $uploader = new WbjkFileUploadHandler();
	        $files_data = $uploader->receive($this->project_type);
	        //地址保存到数据库
	        $this->jgpt_service->saveFilesAndImages($jgpt_detail,$files_data);
	    }
        catch(VerifyException $ve){
            $result['success'] = false;
            $result['message'] = $ve->getMessage();
            $result['status_code'] = 422;
        }
        catch(\Exception $e){
            $result['message'] = $e->getMessage();
            $result['status_code'] = 433;
            // return $this->response->error('重复请求，数据已存在', 433);
        }
        $this->logService->addLog('接收',$params,$result['success'],$result);
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
	        $type = gettype($params);
            $result['params_type'] = $type;
            $datas = null;
            if(is_array($params)){
                $datas = $params['datas'];
            }
            else if(is_string($params)){
                $params = json_decode($params,true);
                $datas = $params['datas'];
            }
            else{
                $result['params_ccc'] = 111;
            }
            $type = gettype($datas);
            $result['datas_type'] = $type;
            $jgpt_key = null;
            if(is_array($datas)){
                $jgpt_key = $datas['jgpt_key'];
            }
            else if(is_string($datas)){
                $datas = json_decode($datas,true);
                $jgpt_key = $datas['jgpt_key'];
            }
            else{
                $result['datas_ccc'] = 222;
            }
	        // $params = json_decode($params,true);
	        // $datas = $params['datas'];
         //    $datas = json_decode($datas,true);
	        // $jgpt_key = $datas['jgpt_key'];
	        if(!$this->jgpt_service->isExistForKey($datas['jgpt_key'])){
                throw new VerifyException('原数据表不存在,UUID：'.$datas['jgpt_key']);
    		}
	        $jgpt_detail = $this->jgpt_service->getModelForKey($datas['jgpt_key']);
	        // $detail = $jgpt_detail->detail;
	        //保存文件
	        $uploader = new WbjkFileUploadHandler();
	        $files_data = $uploader->receive($this->project_type);
	        //地址保存到数据库
	        $this->jgpt_service->saveContract($jgpt_detail,$files_data);
	    }
        catch(VerifyException $ve){
            $result['success'] = false;
            $result['message'] = $ve->getMessage();
            $result['status_code'] = 422;
        }
        catch(\Exception $e){
            $result['success'] = false;
            $result['message'] = $e->getMessage();
            $result['status_code'] = 500;
            // return $this->response->error('重复请求，数据已存在', 433);
        }
        $this->logService->addLog('接收',$datas,$result['success'],$result);
        return $this->response->array($result)->setStatusCode($result['status_code']);
    }

    /**
     *处理获取的参数
     */
    public function dealParams($params){
        $type = gettype($params);
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
}
