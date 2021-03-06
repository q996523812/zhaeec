<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Auth\Database\Administrator;

class WorkProcessInstance extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function process()
    {
        return $this->belongsTo(WorkProcess::class,'work_process_id');
    }
    public function node()
    {
        return $this->belongsTo(WorkProcessNode::class,'work_process_node_id');
    }
	public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function nextNode()
    {
        return $this->belongsTo(WorkProcessNode::class,'next_work_process_node_id');
    }
	public function nextUser()
    {
    	$userModel = config('admin.database.users_model');
        return $this->belongsTo($userModel,'next_user_id');
    }

    public function nextRole()
    {
        $roleModel = config('admin.database.roles_model');
        return $this->belongsTo($roleModel,'next_role_id');
    }
    public function workProcessRecords(){
        return $this->hasMany(WorkProcessRecord::class);
    }

    public function role()
    {
        $roleModel = config('admin.database.roles_model');
        return $this->belongsTo($roleModel,'role_id');
    }
    public function user()
    {
        return $this->belongsTo(Administrator::class,'user_id');
    }
}
