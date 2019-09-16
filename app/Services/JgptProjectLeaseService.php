<?php

namespace App\Services;

use App\Models\JgptProjectLease;
use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\InterestedParty;
use App\Models\PbResult;
use App\Models\BidResult;
use App\Models\BidResultSub;
use App\Models\Transaction;
use App\Models\TransactionAnnouncement;
use App\Models\WinNotice;
use App\Models\TransactionConfirmation;
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

    /**
     *挂牌数据，无文件
     *
     */
    public function sendGpData($detail_id){
        $url = 'api/transaction/assets/transaction';
        $detail = ProjectLease::find($detail_id);
        $data = [
            'xmpname' => $detail->xmbh,
            'ptime' => $detail->jy_date,//交易时间
            'gpStartTime' => $detail->gp_date_start,
            'gpEndTime' => $detail->gp_date_end,
            'jyTimeRemark' => $detail->jysj_bz,
            'bzjEndTime' => $detail->bzj_jn_time_end,
            'ptPhone' => $detail->jypt_lxfs,
        ];
        $result = $this->send($url,$data,$detail->id);

        return $result;
    }

    /**
     *意向方信息，无文件
     *
     */
    public function sendYxf($yxf_id){
        $url = 'api/transaction/assets/backfill/enroll';
        $yxf = InterestedParty::find($yxf_id);
        $project = $yxf->project;
        $data = [
            'name' => $yxf->name,
            'idType' => $yxf->id_type,
            'idCode' => $yxf->id_code,
            'province' => $yxf->province,
            'city' => $yxf->city,
            'area' => $yxf->area,
            'isGz' => $yxf->isgz,
            'registeredAddress' => $yxf->registered_address,
            'registeredCapital' => $yxf->registered_capital,
            'registeredCapitalCurrency' => $yxf->registered_capital_currency,
            'foundDate' => $yxf->found_date,
            'legalRepresentative' => $yxf->legal_representative,
            'industry1' => $yxf->industry1,
            'industry2' => $yxf->industry2,
            'companyType' => $yxf->companytype,
            'economyType' => $yxf->economytype,
            'scale' => $yxf->scale,
            'scope' => $yxf->scope,
            'creditCer' => $yxf->credit_cer,
            'workUnit' => $yxf->work_unit,
            'workDuty' => $yxf->work_duty,
            'contactName' => $yxf->contact_name,
            'contactPhone' => $yxf->contact_phone,
            'contactEMail' => $yxf->contact_email,
            'contactFax' => $yxf->contact_fax,
            'accountCode' => $yxf->account_code,
            'accountBank' => $yxf->account_bank,
            'accountName' => $yxf->account_name,
        ];
        $result = $this->send($url,$data,$project->detail_id);

        return $result;
    }
    
    public function sendYxfAll($detail_id){
        $url = 'api/transaction/assets/backfill/enroll';
        $detail = ProjectLease::find($detail_id);
        $project = $detail->project;

        $data = [
            
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

    /**
     *竞价结果/成交信息，有文件
     *
     */
    public function sendJjResult($project_id){
        $url = 'api/transaction/assets/backfill/biddingresult';

        $project = Project::find($project_id);
        $cjxx = $project->transaction;
        $datas = [
            'xmbh' => $project->xmbh,
            'title' => $project->title,
            'records' => $pbjg,
        ];
        $file_path = $cjxx->files->first()->path;
        $result = $this->sendFile($url,$datas,$project->detail_id,$file_path);
        return $result;
    }

    /**
     *成交公告,无文件
     */
    public function sendCjAnnouncement($project_id){
        $url = 'api/transaction/assets/backfill/biddingresult';

        $project = Project::find($project_id)->first();
        $cjgg = $project->transactionAnnouncement;
        $datas = [
            'xmbh' => $project->xmbh,
            'title' => $project->title,
            'records' => $pbjg,
        ];
        $result = $this->send($url,$data,$detail->id);

        return $json_result;
    }

    /**
     *接口：发送中标通知书,有文件
     */
    public function sendZbNotice($project_id){
        $url = 'api/assets/backfill/winningbid';
        $project = Project::find($project_id)->first();
        $zbtz = $project->winNotice;
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
        $file_path = $cjxx->files->first()->path;
        $result = $this->sendFile($url,$data,$project->detail_id,$file_path);

        return $result;
    }

    public function zbNoticeData($project,$zbtz){
        $url = 'api/assets/backfill/winningbid';
        // $url = 'gzb/api/assets/backfill/winningbid';
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
        $result = $this->send($url,$data,$project->detail_id);
        return $result;
    }
    public function zbNoticeFile($project,$zbtz){
        $url = 'api/assets/backfill/filesupload/CzpropertyEntityZb';
        // $url = 'gzb/api/assets/backfill/filesupload/CzpropertyEntityZb';
        // $file = $zbtz->files->first();
        $file = $zbtz->file_path;
        $result = $this->sendFile($url,$file,$project->detail_id);
        return $result;
    } 

}