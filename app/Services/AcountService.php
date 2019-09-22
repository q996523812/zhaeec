<?php

namespace App\Services;

use App\Models\Acount;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class AcountService
{
	public function __construct()
    {

    }

    /**
     *获取保证金账户
     */
    public function getDepositAccount(){
        $model = Acount::where('type','1')->first();
        return $model;
	}
    /**
     *获取服务费账户
     */
	public function getServiceFeeAccount(){
		$model = Acount::where('type','2')->first();
        return $model;
	}
}