<?php

namespace App\Services;

use App\Models\Project;
use App\Models\SellerInfo;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class SellerInfoService
{
	public function add($params){
		$params['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($params) {
			$model = SellerInfo::create($params);
		    return $model;
		});
        return $model;
	}

	public function update($id,$params){
		$model = SellerInfo::find($id);
        DB::transaction(function () use($model,$params) {
			$model->update($params);
		});
	}

}