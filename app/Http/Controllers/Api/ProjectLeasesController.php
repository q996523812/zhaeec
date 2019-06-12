<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\Api\ProjectLeaseRequest;
use App\Models\ProjectLease;
use App\Models\File;
use App\Handlers\FileUploadHandler;
use App\Services\InterfaceLogService;
use App\Services\ProjectLeaseService;

class ProjectLeasesController extends Controller
{
    protected $projectLeaseService;

    // 利用 Laravel 的自动解析功能注入 CartService 类 
    public function __construct(ProjectLeaseService $projectLeaseService)
    {
        $this->projectLeaseService = $projectLeaseService;
    }
    
    public function store(ProjectLeaseRequest $request,FileUploadHandler $uploader,ProjectLease $ProjectLease)
    {
        $data = $request->all();
        $data_detail = $request->only(['id','project_id','wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status']);
        $data_project = $request->only(['xmbh','title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        
        // $files = $request->path;
        // $fileCharater = $request->file('path');
        // $files_new = null;
        // if($fileCharater != null){
        //     $files_new = $uploader->batchUpload($data['files'],'zczl','zczl');
        // }
        $this->projectLeaseService->add($data_detail,$data_project,11,null);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return $this->response->array($result)->setStatusCode(201);
    	// return $this->response->created();
    }

    public function update(ProjectLeaseRequest $request,FileUploadHandler $uploader,File $file)
    {
        $data = $request->all();
        $detail_id = $request->id;
        $data_detail = $request->only(['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status']);
        $data_project = $request->only(['xmbh','title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);

        // $files = $request->path;
        // $fileCharater = $request->file('path');
        // $files_new = null;
        // if($fileCharater != null){
        //     $files_new = $uploader->batchUpload($data['files'],'zczl','zczl');
        // }
        // DB::transaction(function () use($purchase_id,$data_Purchase,$data_project,$process) {
        //     $this->projectLeaseService->update($purchase_id,$data_Purchase,$data_project,11,null);
        //     $process->create('zczl',ProjectLease::find($purchase_id)->project_id,'提交',13);

        // });

        $this->projectLeaseService->update($detail_id,$data_detail,$data_project,11,null);

        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return $this->response->array($result)->setStatusCode(201);
        // return $this->response->created();
    }

}
