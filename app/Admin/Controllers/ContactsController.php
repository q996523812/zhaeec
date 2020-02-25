<?php

namespace App\Admin\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\ContactService;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    private $service = null;
    
    protected $fields = [
        'wtf_lxr_name','wtf_lxr_mobile','wtf_lxr_email','ptf_lxr_name','ptf_lxr_mobile','ptf_lxr_email','project_id'
    ];

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function insert(ContactRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(ContactRequest $request){
        $params = $request->only($this->fields);
        $id = $request->contact_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }

}
