<?php

namespace App\Admin\Controllers;

use App\Models\ProjectTransferAsset;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\ProjectTransferAssetService;
use App\Http\Requests\ProjectTransferAssetRequest;
use Carbon\Carbon;

class ProjectTransferAssetsController extends ProjectBaseController
{

    public function __construct(ProjectTransferAssetService $server)
    {
        $this->projectTypeName = '资产转让';
        $this->projectTypeCode = 'zczr';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.zczr';
        $this->detail_class = ProjectTransferAsset::class;
        $this->fields = [
            'insert' => ['xmbh','title','gpjg','pauseText','spare4','proDesc','isGzw','pauseTime','proType','proProvince','proCity','proCounty','proSource','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','allowEndPrio','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','buyerAuditLevel','is_examination','pre_listing_id','status','date_type','is_member_in','customer_id'],
            'update' => ['xmbh','title','gpjg','pauseText','spare4','proDesc','isGzw','pauseTime','proType','proProvince','proCity','proCounty','proSource','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','allowEndPrio','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','buyerAuditLevel','is_examination','pre_listing_id','status','date_type','is_member_in','customer_id'],
        ];
        $this->service = $server;
    }

    public function insert(ProjectTransferAssetRequest $request){
        return parent::add($request);
    }
    
    public function modify(ProjectTransferAssetRequest $request){
        return parent::update($request);
    }
}
