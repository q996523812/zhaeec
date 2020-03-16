<?php

namespace App\Services;

use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ReportService
{
	public function __construct()
    {

    }

    public function show($startDate,$endDate){
    	
        $sql = 'select t.ssjt,sum(t.gpsl) gpsl,sum(t.gpje) gpje,sum(t.cjsl) cjsl,sum(t.cjje) cjje '
        	.'from( '
        	.'	select b.ssjt,b.name,b.certificate_code,1 as gpsl,a.price gpje, '
        	.'		case when a.status =14 then 1 else 0 end cjsl, '
        	.'		case when a.status =14 then a.price else 0 end cjje '
        	.'	from projects a '
        	.'	left join seller_infos b on a.id=b.project_id '
        	.') t '
        	.'group by t.ssjt ';
        $arr = DB::select($sql);
        return $arr;
    }
}