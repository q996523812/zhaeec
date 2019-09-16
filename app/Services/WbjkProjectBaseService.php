<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\JgptProjectLease;
use App\Models\IntentionalParty;
use App\Handlers\JgptCurlHandler;
use App\Handlers\StreamFileHandler;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class WbjkProjectBaseService
{
	public $project_type_code;
	public $model_class;//接口业务表对应的模型CLASS
	public $detail_service_class;//业务表对应的业务service class

    public $fields_detail = [];
    private $fields_projectt = ['xmbh','title','price','gp_date_start','gp_date_end'];
    // protected $IP_TEST = '47.112.15.51';
    // protected $PORT_TEST = '8090';
    // protected $IP = '47.112.15.51';
    // protected $PORT = '8090';
    protected $IP = '172.20.10.3';
    protected $PORT = '8088';

    protected static $STATUS_5 = 5;//接口已接收到业务申请数据
    protected static $STATUS_6 = 6;//业务申请已撤销或者已退回
    protected static $STATUS_7 = 7;//业务申请已被中心业务员接受
    protected static $STATUS_19 = 19;//挂牌信息待发送或者发送失败
    protected static $STATUS_20 = 20;//挂牌信息已发送
    protected static $STATUS_29 = 29;//流标信息待发送或者发送失败
    protected static $STATUS_30 = 30;//流标信息已发送
    protected static $STATUS_39 = 39;//中止信息待发送或者发送失败
    protected static $STATUS_40 = 40;//中止信息已发送
    protected static $STATUS_49 = 49;//终结信息待发送或者发送失败
    protected static $STATUS_50 = 50;//终结信息已发送
    protected static $STATUS_59 = 59;//竞价结果待发送或者发送失败
    protected static $STATUS_60 = 60;//竞价结果已发送
    protected static $STATUS_69 = 69;//评标结果待接收或者接收失败
    protected static $STATUS_70 = 70;//评标结果已接收
    protected static $STATUS_89 = 89;//中标通知待发送或者发送失败
    protected static $STATUS_90 = 90;//中标通知已发送
    protected static $STATUS_91 = 91;//合同待接收或者接收失败
    protected static $STATUS_92 = 92;//合同已接收
    
    /**
     * 根据字段列表，从接口数据表中获取业务数据
     * @param $jgptDeatil 接口业务数据的模型实例
     * @param $fields 要获取的字段列表
     * return 业务数据array
     */
    private function getData($jgptDeatil,$fields){
        $data = [];
        foreach ($fields as $field) {
            if($field === 'price'){
                $data[$field] = $jgptDeatil->toArray()['gpjg_zj'];
            }
            else{
                $data[$field] = $jgptDeatil->toArray()[$field];
            }
        }
        // foreach ($jgptDeatil->toArray() as $key => $value) {
        //     $data[$key] = $value;
        // };
        return $data;
    }

    /**
     * 发送请求
     * @param $url 相对地址,例如 api/assets/backfill/transaction
     * @param $data 要发送的数据部分
     * @param $detail_id 业务明细表ID
     */
    public function send($url,$data,$detail_id){
        $url = $this->getSendUrl($url);
        $jgpt_detail = $this->model_class::where('detail_id',$detail_id)->first();
        $data['uuid'] = $jgpt_detail->jgpt_key;
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$data);

        // $streamHandler = new StreamFileHandler;
        // $result = $streamHandler->send2($url,$data);

        // $json_result = json_decode($result,true);
        return $result;
    }

    public function sendFile($url,$data,$detail_id,$file_path){
        $jgpt_detail = $this->model_class::where('detail_id',$detail_id)->first();
        $url = $this->getSendUrl($url);
        $data = array(
            'uuid' => $jgpt_detail->jgpt_key
        );
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curlFile($url,$data,$file_path);

        // $result = json_decode($result,true);
        return $result;
    }

    /**
     * 获取完整的发送地址
     * @param $url 相对地址,例如 api/assets/backfill/transaction
     */
    protected function getSendUrl($url){
        return 'http://'.$this->IP.':'.$this->PORT.'/'.$url;
    }

	//用于保存接收到的外部业务数据
	public function save($data){
		$data['id'] = (string)Str::uuid();
        $data['status'] = WbjkProjectBaseService::$STATUS_5;
        $model = DB::transaction(function () use($data) {
            $model = $this->model_class::create($data);
            return $model;
        });
        return $model;
	}
    public function update($data){
        $jgpt_detail = $this->getModelForKey($data['jgpt_key']);
        $model = DB::transaction(function () use($data,$jgpt_detail) {
            $model = $jgpt_detail->update($data);
            return $model;
        });
        return $model;
    }

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $jgpt_detail 模型实例
     * @param $files_data array ,示例如下：
     array(
        'files' =>[
            ['path' => 'storay/uploads/files/111.text']
            ['path' => 'storay/uploads/files/222.docx']
        ],
        'images' =>[
            [
                'path' => 'storay/uploads/files/111.text',
                'name' => '111.text'
            ]
            [
                'path' => 'storay/uploads/files/222.docx',
                name' => '222.docx'
            ]
        ],
     )
     * @return 
     */
    public function saveFilesAndImages($jgpt_detail,$files_data){
        DB::transaction(function () use($jgpt_detail,$files_data) {
            $fileserice = new JgptFileService();
            $fileserice->batchStore($jgpt_detail,$files_data['files']);
            $imageserice = new JgptImageService();
            $imageserice->batchStore($jgpt_detail,$files_data['images']);
        });
    }

    //状态更新
    public function updateStatus($id,$status){
        $model = $this->model_class::find($id);
        $model->status = $status;
        $model->save();
        return $model;
    }

    /**
     *
     *@param jgpt_detail 待更新的接口数据实例
     *@param success 接口发送是否成功
     *@param status_success 成功后的状态
     *@param status_failed 失败后的状态，取业务流程中最后一级审批的节点值，
            例如：119、139、149......219、229......319......
     *@param
     
     */
    public function updateStatusAfterSend($jgpt_detail,$success,$status_success,$status_failed){
        $status = $jgpt_detail->status;
        if($success){
            $jgpt_status = $status_success;
        }
        else{
            $jgpt_status = $status_failed;
        }
        $JgptService->updateStatus($jgpt_detail->id,$status);
    }

    /**
     * 根据业务明细表ID（detail_id）获取接口数据的模型实例
     * @param $detail_id 监管平台发送过来的jgpt_key
     * @return 模型实例
     */
    public function getModelForKey($detail_id){
        $detail = $this->model_class::where('detail_id',$detail_id)->first();
        return $detail;
    }

    /**
     * 根据jgpt_key获取接口数据的模型实例
     * @param $key 监管平台发送过来的jgpt_key
     * @return 模型实例
     */
    public function getModelForKey($key){
        $detail = $this->model_class::where('jgpt_key',$key)->first();
        return $detail;
    }

    /**
     * 判断jgpt_key在数据库中是否存在
     * @param $key 监管平台发送过来的jgpt_key
     * @return 存在：true，不存在：false
     */
    public function isExistForKey($key){
        $isExist = $this->model_class::where('jgpt_key',$key)->exists();
        return $isExist;
    }

    /**
     * 业务员接收申请
     * @param $id 接口业务表ID
     */
    public function receive($id){
        $jgptDeatil = $this->model_class::find($id);

        $data_datail = $this->getData($jgptDeatil,$this->fields_detail);
        $data_datail['sjly'] = '监管平台';
        $data_project = $this->getData($jgptDeatil,$this->fields_projectt);
        $data_project['type'] = $this->project_type_code;

        DB::transaction(function () use($jgptDeatil,$data_datail,$data_project) {
	        
            $detailService = new $this->detail_service_class;
            $detail = $detailService->add($data_datail,$data_project,111);

            $jgptDeatil->update([
                'status'=>7,
                'detail_id'=>$detail->id,
            ]);

            if(count($jgptDeatil->files)){
                $jgptfiles = $jgptDeatil->files;
                $fileService = new FileService();
                $fileService->batchStore($detail,$jgptfiles->toArray());
            }
            if(count($jgptDeatil->images)){
                $jgptimages = $jgptDeatil->images;
                $imageService = new ImageService();
                $imageService->batchStore($detail,$jgptfiles->toArray());
            }
	    });

        return $jgptDeatil;
    }

    public function back($id){
    	$jgptDeatil = JgptProjectLease::find($id);
    	if(in_array($jgptDeatil->status, [6,7] ) ){
    		return ['message' => '失败，不能重复操作'];
    	}
    	DB::transaction(function () use($jgptDeatil) {
	    	$jgptDeatil->update([
	            'status'=>admin_config()->status[6],
	        ]);
        });
        return [];
    }

/*
    public function lbNotice($project_id){
        $url = '';
        $project = Project::find($project_id)->first();
        $zbtz = LbNotice::where('project_id',$project_id)->first();
        $datas = $zbtz;
        $result = JgptCurlHandler::curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    }     
    */

    public function saveContract($jgpt_detail,$files_data){
        DB::transaction(function () use($jgpt_detail,$files_data) {
            $this->updateStatus($jgpt_detail->id,92);

            $detail = $jgpt_detail->detail;

            $projectLeaseService = new ProjectLeaseService;
            $projectLeaseService->saveContract($detail,$files_data);
        });
    }
}