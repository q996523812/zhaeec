<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;

class PrintsController extends Controller
{
    public function zczl(Request $request)
    {
    	$detail = ProjectLease::find($request->id);
    	$datas = [
            'detail' => $detail,
        ]; 
        return view('admin.project.lease.print',$datas);
    }
}
