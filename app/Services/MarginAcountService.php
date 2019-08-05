<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\MarginAcount;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MarginAcountService
{
	public function getDefault(){
		$account = MarginAcount::where('default',1)->first();
		return $account;
	}
}