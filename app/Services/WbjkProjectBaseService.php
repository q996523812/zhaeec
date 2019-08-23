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
        $data['status'] = 5;
        $model = DB::transaction(function () use($data) {
            $model = $this->model_class::create($data);
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
     * 根据jgpt_key获取接口数据的模型实例
     * @param $key 监管平台发送过来的jgpt_key
     * @return 模型实例
     */
    public function getModelForKey($key){
        $detail = $this->model_class::where('jgpt_key',$datas['jgpt_key'])->first();
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
            $detail = $detailService->add($data_datail,$data_project,11);

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

    public function saveContract($detail,$files_data){
        DB::transaction(function () use($jgpt_detail,$files_data) {
            $this->updateStatus($jgpt_detail->id,92);

            $detail = $jgpt_detail->detail;

            $projectLeaseService = new ProjectLeaseService;
            $projectLeaseService->saveContract($detail,$files_data);
        });
    }
}