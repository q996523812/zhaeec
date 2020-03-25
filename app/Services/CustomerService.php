<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class CustomerService
{
	public function __construct()
    {

    }

    public function save($data){
        $model = null;
        if(empty($contract)){
            $model = $this->insert($data);
        }
        else{
            $model = $this->modify($data);
        }
        return $model;
    }

    public function insert($data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($data) {
        	$model = Customer::create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($id,$data){
        $model = Customer::find($id);
        $model = DB::transaction(function () use($model,$data) {
        	$model = $model->update($data);
		    return $model;
		});
        return $model;
	}

    public function search($data){
        $search_name = $data['search_name'];
        $search_code = $data['search_code'];

        $models = Customer::where('name','like','%'.$search_name.'%')
            ->where('certificate_code','like','%'.$search_code.'%')
            ->get()->toArray();
        
        return $models;
    }

    public function search_member($data){
        $search_name = $data['search_name'];
        $search_code = $data['search_code'];
        $search_is_member = $data['search_is_member'];

        $models = Customer::where('name','like','%'.$search_name.'%')
            ->where('certificate_code','like','%'.$search_code.'%')
            ->where('is_member',$search_is_member)
            ->get()->toArray();
        
        return $models;
    }

}