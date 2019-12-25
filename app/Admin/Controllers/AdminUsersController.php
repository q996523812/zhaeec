<?php

namespace App\Admin\Controllers;

use App\Models\ProjectTransferAsset;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;

class AdminUsersController extends Controller
{
    public function getBusinessUsers(){
        $role = Role::find(2);
        $users = $role->administrators;
        $result = [
            'success' => 'true',
            'message' => '',
            'users' => $users,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
}
