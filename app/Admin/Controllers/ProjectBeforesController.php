<?php

namespace App\Admin\Controllers;

use App\Models\ProjectBefore;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Admin as Import;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Handlers\FileUploadHandler;
use App\Services\ProcessService;
use App\Services\ProjectBeforeService;
use App\Http\Requests\ProjectBeforeRequest;
use Carbon\Carbon;

class ProjectBeforesController extends ProjectBaseController
{
    public function __construct(ProjectBeforeService $server)
    {
        $this->projectTypeName = '预披露';
        $this->projectTypeCode = 'ypl';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.ypl';
        $this->detail_class = ProjectBefore::class;
        $this->fields = [
            'insert' => ['title','gpjg','bidPrice','sellPercent','proExt1','ifControlTrans','pauseText','spare4','proDesc','pauseTime','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','pubDesc','holderIn','allowEndPrio','announceWay','announceMedia','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','is_examination','sfqzypl'],
            'update' => ['title','gpjg','bidPrice','sellPercent','proExt1','ifControlTrans','pauseText','spare4','proDesc','pauseTime','pubDays','gp_date_start','gp_date_end','pubDelayFlag','delayBuyerSize','delayMax','delayPeroid','ifBiddyn','pubDealWay','dealWayDesc','bidmode','pubDesc','holderIn','allowEndPrio','announceWay','announceMedia','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','buyConditions','pubPayMode','payPeriodInfo','pub16','important','sellConditions','valueDesc','pubBailMemo','is_examination','sfqzypl'],
        ];
        $this->service = $server;
    }

    public function insert(ProjectBeforeRequest $request){
        return parent::add($request);
    }
    
    public function modify(ProjectBeforeRequest $request){
        return parent::update($request);
    }
}
