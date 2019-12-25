<?php

namespace App\Admin\Controllers;

use App\Models\ProjectCapitalIncrease;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\ProcessService;
use App\Services\ProjectCapitalIncreaseService;
use App\Http\Requests\ProjectCapitalIncreaseRequest;
use Carbon\Carbon;

class ProjectCapitalIncreasesController extends ProjectBaseController
{
    public function __construct(ProjectCapitalIncreaseService $server)
    {
        $this->projectTypeName = '增资扩股';
        $this->projectTypeCode = 'zzkg';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.zzkg';
        $this->detail_class = ProjectCapitalIncrease::class;
        $this->fields = [
            'insert' => ['xmbh','title','pauseText','isGzw','gpjg','proPriceMax','planPriceDesc','sellPercent1','sellPercent2','planPercentDesc','sellNum1','sellNum2','proExt2','spare21','spare22','announceMedia','spare91','spare92','planBuyersDesc','pub_moneyFor','pub_holderIn','pub_buyerPaperFlag','pub_valueDesc','pubDays','gp_date_start','gp_date_end','delayMax','delayPeroid','pub10','pubDelayFlag','pub7','pub1','pub2','pub3','pub8','pub9','delayFlag','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','pubBailCtrl','pubBailMemo','valueDesc','buyConditions','pubPayMode','payPeriodInfo','pub16','important','pubDealWay','dealWayDesc','pubDesc','spare4','addMoneyPlan','sellConditions','dealConditions','pub15','is_examination','pre_listing_id','date_type','is_member_in','customer_id'],
            'update' => ['xmbh','title','pauseText','isGzw','gpjg','proPriceMax','planPriceDesc','sellPercent1','sellPercent2','planPercentDesc','sellNum1','sellNum2','proExt2','spare21','spare22','announceMedia','spare91','spare92','planBuyersDesc','pub_moneyFor','pub_holderIn','pub_buyerPaperFlag','pub_valueDesc','pubDays','gp_date_start','gp_date_end','delayMax','delayPeroid','pub10','pubDelayFlag','pub7','pub1','pub2','pub3','pub8','pub9','delayFlag','unitTransferee','pub0','pubBail','bailStartFlag','pubBailType','pubBailDays','pubBailMethod','bail_account_code','bail_account_name','bail_account_bank','pubBailCtrl','pubBailMemo','valueDesc','buyConditions','pubPayMode','payPeriodInfo','pub16','important','pubDealWay','dealWayDesc','pubDesc','spare4','addMoneyPlan','sellConditions','dealConditions','pub15','is_examination','pre_listing_id','date_type','is_member_in','customer_id'],
        ];
        $this->service = $server;
    }

    public function insert(ProjectCapitalIncreaseRequest $request){
        return parent::add($request);
    }
    
    public function modify(ProjectCapitalIncreaseRequest $request){
        return parent::update($request);
    }

        /**
     * 显示新增页面
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        $detail = new $this->detail_class;
        $this->getMarginAcount($detail);
        $detail->pub10 = '在融资方同意的情况下';
        $detail->pub7 = '但未达到募集资金总额';
        $detail->pub8 = '且达到募集资金总额';
        $detail->pub2 = '并通知已报名的投资方';
        $detail->pub3 = '根据征集到的投资方情况决定具体延长时间';
        
        $datas = $this->getDatasToView($detail);

        $url = $this->getViewUrl('edit');
        return $content
            ->header('新增')
            ->body(view($url,$datas));  
    }


}
