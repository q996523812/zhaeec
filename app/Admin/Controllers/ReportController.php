<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\ProjectPurchase;
use App\Models\ProjectLease;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\TargetCompanyBaseInfo;
use App\Models\TargetCompanyOwnershipStructure;
use App\Models\AuditReport;
use App\Models\FinancialStatement;
use App\Models\Assessment;
use App\Models\SellerInfo;
use App\Models\Supervise;
use App\Models\AssetInfo;
use Encore\Admin\Auth\Database\Administrator;
use App\Http\Controllers\Controller;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\ReportService;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{

	public function index(Content $content){
		return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
	}
	public function show(Content $content,ReportService $service){
		$datas = [
			'rpRows' => $service->show('','')
		];
		return $content
            ->header('报表')
            ->body(view('admin.report.show', $datas));  
	}

	protected function grid()
    {
        $grid = new Grid(new Project);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '项目名称');
            $filter->like('xmbh', '项目编号');
        });
        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->intentional_parties_id('Intentional parties id');
        $grid->price('Price');
        $grid->service_charge_receivable('Service charge receivable');
        $grid->service_charge_received('Service charge received');
        $grid->wtf_service_fee_payable('Wtf service fee payable');
        $grid->wtf_service_fee_paid('Wtf service fee paid');
        $grid->zbf_service_fee_payable('Zbf service fee payable');
        $grid->zbf_service_fee_paid('Zbf service fee paid');
        $grid->charge_rule_id('Charge rule id');
        $grid->status('Status');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }
}