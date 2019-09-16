<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\PaymentNotice;

class PrintsController extends Controller
{
    public function zczl(Request $request)
    {
    	$detail = ProjectLease::find($request->id);
    	$datas = [
            'detail' => $detail,
        ]; 
        return view('admin.project.zczl.print',$datas);
    }

    public function sftzZbf($id, Request $request)
    {
        $model = PaymentNotice::find($id);
        $datas = [
            'detail' => $model,
        ];
        return view('admin.sftz.print_zbf',$datas);
    }
}
