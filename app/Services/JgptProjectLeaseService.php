<?php

namespace App\Services;

use App\Models\JgptProjectLease;
use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\WinNotice;
use App\Models\PbResult;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use App\Handlers\CurlHandler;
use App\Handlers\JgptCurlHandler;

class JgptProjectLeaseService extends WbjkProjectBaseService
{
    public function __construct()
    {
        $this->project_type_code = 'qycg';
        $this->model_class = JgptProjectLease::class;
        $this->detail_service_class = ProjectLeaseService::class;
        $this->fields_detail = ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq'];
    }

    public function sendGpData($detail_id){
        $url = 'api/assets/backfill/transaction';
        $detail = ProjectLease::find($detail_id);
        $data = [
            'xmpname' => $detail->xmbh,
            'ptime' => $detail->jy_date,//交易时间
            'gpStartTime' => $detail->gp_date_start,
            'gpEndTime' => $detail->gp_date_end,
            'jyTimeRemark' => $detail->jysj_bz,
            'bzjEndTime' => $detail->bzj_jn_time_end,
            'ptPhone' => $detail->jypt_lxfs,

            // 'djtime' => $detail->yxdj_sj,
            // 'price' => $detail->yxdj_fs,
            // 'jntime' => $detail->bzj_jn_time_end,
            // 'djtime' => $detail->zbwj_dj,
            // 'jyphone' => $detail->jypt_lxfs,
            // 'remarks' => $detail->notes,
        ];
        $result = $this->send($url,$data,$detail->id);
        return $result;
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

    public function jjResult($project_id){
        $url = '';

        $project = Project::find($project_id)->first();
        $pbjg = PbResult::where('project_id',$project_id)->get();        
        $datas = [
            'xmbh' => $project->xmbh,
            'title' => $project->title,
            'records' => $pbjg,       
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    }   

    public function zbNotice($project_id){
        $project = Project::find($project_id)->first();
        $zbtz = WinNotice::where('project_id',$project_id)->first();
        $result = [];
        try{
            $result['data'] = $this->zbNoticeData($project,$zbtz);
        }
        catch(\Exception $e){
            $result['data_error'] = $e->getMessage();
        }
        try{
            $result['file'] = $this->zbNoticeFile($project,$zbtz);
        }
        catch(\Exception $e){
            $result['file_error'] = $e->getMessage();
        }
        throw new \Exception(json_encode($result));
    }

    public function zbNoticeData($project,$zbtz){
        $url = 'api/assets/backfill/winningbid';
        $data = [
            'pcode' => $zbtz->tzsbh,
            'zbpname' => $zbtz->xmbh,
            'bdmc' => $zbtz->title,
            'zbContent' => $zbtz->zbnr,
            'zbPhone' => $zbtz->zbf_phone,
            'zbType' => $zbtz->zbf_lx_1,
            'cjzj' => $zbtz->cjj_zj,
            'cjdj' => $zbtz->cjj_dj,
            'zbjyWay' => $zbtz->jyfs,
            'jyPlace' => $zbtz->jycd,
            'zbfArea' => $zbtz->zbf_qy,
        ];
        // $result = $this->send($url,$data,$project->detail_id);
        $result = $this->send2($url,$data,$project->detail_id);
        return $result;
    }
    public function zbNoticeFile($project,$zbtz){
        $url = 'api/assets/backfill/filesupload';
        // $file = $zbtz->files->first();
        $file = $zbtz->file_path;
        // $result = $this->sendFile($url,$file,$project->detail_id);
        $result = $this->sendFile2($url,$file,$project->detail_id);
        return $result;
    } 

}