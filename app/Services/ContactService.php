<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ContactService
{
	public function add($params){
		$params['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($params) {
			$model = Contact::create($params);
		    return $model;
		});
        return $model;
	}

	public function update($id,$params){
		$model = Contact::find($id);
        DB::transaction(function () use($model,$params) {
			$model->update($params);
		});
	}

}