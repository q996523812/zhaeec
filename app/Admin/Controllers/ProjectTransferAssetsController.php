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
            'insert' => ['title','gpjg','bidPrice','sellPercent','proExt1','ifControlTrans','pauseText','spare4','proDesc','pauseTime','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','pubDesc','holderIn','allowEndPrio','announceWay','announceMedia','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','is_examination'],
            'update' => ['title','gpjg','bidPrice','sellPercent','proExt1','ifControlTrans','pauseText','spare4','proDesc','pauseTime','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','pubDesc','holderIn','allowEndPrio','announceWay','announceMedia','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','is_examination'],
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
