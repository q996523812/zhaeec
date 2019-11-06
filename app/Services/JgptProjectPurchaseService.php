<?php

namespace App\Services;

use App\Models\JgptProjectPurchase;
use App\Models\ProjectPurchase;
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
use Illuminate\Support\Facades\Log;

class JgptProjectPurchaseService extends WbjkProjectBaseService
{
    public function __construct()
    {
        $this->project_type_code = 'qycg';
        $this->model_class = JgptProjectPurchase::class;
        $this->detail_service_class = ProjectPurchaseService::class;
        $this->fields_detail = ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes'];
    }


    public function back($id){
        $url = "http://127.0.0.1:8080/gzb/procurement/findprocurement";
    	$jgptPurchase = JgptProjectPurchase::find($id);
    	if(in_array($jgptPurchase->status, [6,7] ) ){
    		return ['message' => '失败，不能重复操作'];
    	}
    	DB::transaction(function () use($jgptPurchase) {
	    	$jgptPurchase->update([
	            'status'=>admin_config()->status[6],
	        ]);
        });

        $data = [
            'jgpt_key' => $id
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$data);

        $json_result = json_decode($result,true);
        return [];
    }

    /**
     *@param $id 接口表ID
     *@param $option 退回、通过、流标、中止、终结
     *@param $remarks 备注
     */
    public function sendChecked($id,$option,$remarks){
        $url = 'api/transaction/purchase/checked';
        $model = $this->model_class::find($id);
        $datas = [
            'uuid' => $model->jgpt_key,
            'checkedOptions' => $option,
            'checkedRemarks' => $remarks,
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);
        return $result;
    }

    /**
     *发送挂牌数据，无文件
     *
     */
    public function sendGpData($purchase_id){
        $url = 'api/transaction/purchase/backfill/transaction';
        $purchase = ProjectPurchase::find($purchase_id)->first();
        Log::info($purchase);
        $datas = [
            'projectNo' => $purchase->xmbh,
            'projectOpenTalksTime' => $purchase->jy_date,//交易时间
            'noticeStartTime' => $purchase->gp_date_start,
            'noticeEndTime' => $purchase->gp_date_end,
            'budgetPriceRemarks' => $purchase->gpjg_sm,
            'budgetPrice' => $purchase->gpjg_zj,
            'projectIntention' => $purchase->bdyx,
            'intentionTime' => $purchase->yxdj_sj,
            'intentionTypeOrPrice' => $purchase->yxdj_fs,
            'jnbzjEndTime' => $purchase->bzj_jn_time_end,
            'talksFileAndPlace' => $purchase->zbwj_dj,
            'projectPtLink' => $purchase->jypt_lxfs,
            'entrustAgencyLink' => $purchase->zbdl_lxfs,
            'projectRemarks' => $purchase->notes,
        ];
        $result = $this->send($url,$datas,$purchase_id);
        return $result;
    }

    /**
     *意向方信息，无文件
     *
     */
    public function sendYxfAll($detail_id){
        $url = 'api/transaction/purchase/backfill/enroll';
        $detail = ProjectLease::find($detail_id);
        $project = $detail->project;
        $yxfs = $project->interestedParties;
        $list = function ()use($yxfs){
            $list = [];
            foreach($yxfs as $yxf) {
                $row = [
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
                $list[] = $row;
            }
            return $list;
        };
        $data = [
            'list' => $list,
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
     *评标结果，有文件
     *
     */
    public function sendPbResult($project_id){
        $url = 'api/transaction/purchase/backfill/biddingresults';
        $project = Project::find($project_id);
        $pbjg = PbResult::where('project_id',$project_id)->get();
        $subPidResults = $project->PidResult->SubPidResults;
        $list = function ()use($subPidResults){
            $list = [];
            foreach($subPidResults as $subPidResult) {
                $row = [
                    'projectNo' => $subPidResult->xmbh,
                    'projectName' => $subPidResult->title,
                    'tbPerson' => $subPidResult->tbr,
                    'jjf' => $subPidResult->jjf,
                    'jsf' => $subPidResult->jsf,
                    'zf' => $subPidResult->zf,
                    'tbbj' => $subPidResult->tbbj,
                    'pm' => $subPidResult->pm,
                ];
                $list[] = $row;
            }
            return $list;
        };

        $datas = [
            'title' => $project->title,
            'list' => $list,
        ];
        $result = $this->send($url,$data,$detail->id);

        return $result;
    }   

    /**
     *中标通知，有文件
     *
     */
    public function sendZbNotice($project_id){
        $url = 'api/transaction/purchase/backfill/winningbid';
        $project = Project::find($project_id);
        $zbtz = WinNotice::where('project_id',$project_id)->first();
        $datas = [
            'zbNo' => $zbtz->tzsbh,
            'zbContent' => $zbtz->title,
            'zbPhone' => $zbtz->zbf_phone,
            'zbType' => $zbtz->zbf_lx_1,//类型指那个类型？
            'zbTotalPrice' => $zbtz->cjj_zj,
            'zbUnitPrice' => $zbtz->cjj_dj,
            'zbTransactionWay' => $zbtz->jyfs,
            'zbTransactionPlace' => $zbtz->jycd,
            'zbArea' => $zbtz->zbf_qy,
        ];
        $result = $this->send($url,$data,$detail->id);

        return $result;
    } 


}