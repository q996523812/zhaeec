<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$sftz->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$sftz->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目编号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
        <input type="text" id="xmbh" name="xmbh" value="{{$sftz->xmbh}}" class="form-control readonly xmbh" placeholder="输入 项目编号" readonly="readonly">
      </div>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">标的名称</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="title" name="title" value="{{$sftz->title}}" class="form-control title" placeholder="输入 标的名称" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf" name="wtf" value="{{$sftz->wtf}}" class="form-control wtf" placeholder="输入 委托方" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="zbf" name="zbf" value="{{$sftz->zbf}}" class="form-control zbf" placeholder="输入 中标方" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标价格，小写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbjg_xx" name="zbjg_xx" value="{{$sftz->zbjg_xx}}" class="form-control zbjg_xx" placeholder="输入 中标价格" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标价格，大写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="zbjg_dx" name="zbjg_dx" value="{{$sftz->zbjg_dx}}" class="form-control zbjg_dx" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方服务费，小写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="wtf_fwf_xx" name="wtf_fwf_xx" value="{{$sftz->wtf_fwf_xx}}" class="form-control wtf_fwf_xx" placeholder="输入 委托方服务费" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方服务费，大写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf_fwf_dx" name="wtf_fwf_dx" value="{{$sftz->wtf_fwf_dx}}" class="form-control wtf_fwf_dx" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方服务费，小写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_fwf_xx" name="zbf_fwf_xx" value="{{$sftz->zbf_fwf_xx}}" class="form-control zbf_fwf_xx" placeholder="输入 中标方服务费" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方服务费，大写</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="zbf_fwf_dx" name="zbf_fwf_dx" value="{{$sftz->zbf_fwf_dx}}" class="form-control zbf_fwf_dx" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">汇款时间。在XX日期之前汇款至指定账户</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="hk_date" name="hk_date" value="{{$sftz->hk_date}}" class="form-control date hk_date" placeholder="输入 成交时间" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">服务费收款账户名</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="account_name" name="account_name" value="{{$sftz->account_name}}" class="form-control account_name" placeholder="输入 账户名" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">开户行</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="account_bank" name="account_bank" value="{{$sftz->account_bank}}" class="form-control account_bank" placeholder="输入 开户行" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">账号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="account_code" name="account_code" value="{{$sftz->account_code}}" class="form-control account_code" placeholder="输入 账号" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">备注</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="remark" name="remark" value="{{$sftz->remark}}" class="form-control remark" placeholder="输入 备注" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中心联系邮箱</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="email" name="email" value="{{$sftz->email}}" class="form-control email" placeholder="输入 中心联系邮箱" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">通知签发日期、落款日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="qf_date" name="qf_date" value="{{$sftz->qf_date}}" class="form-control date qf_date" placeholder="输入 通知签发日期、落款日期" readonly="readonly">
    </div>
  </div>
</div>



</div>

</form>