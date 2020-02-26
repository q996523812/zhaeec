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

	public function area(){
		
	}
}