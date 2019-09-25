<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$jyjz->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$jyjz->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目编号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
        <input type="text" id="xmbh" name="xmbh" value="{{$jyjz->xmbh}}" class="form-control readonly xmbh" placeholder="输入 项目编号" readyonly="readonly">
      </div>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">标的名称</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="title" name="title" value="{{$jyjz->title}}" class="form-control title" placeholder="输入 标的名称" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf" name="wtf" value="{{$jyjz->wtf}}" class="form-control wtf" placeholder="输入 委托方" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="zbf" name="zbf" value="{{$jyjz->zbf}}" class="form-control zbf" placeholder="输入 中标方" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格(万元)</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="price" name="price" value="{{$jyjz->price}}" class="form-control money price_unit" placeholder="输入 成交价格" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易方式</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="jyfs" name="jyfs" value="{{$jyjz->jyfs}}" class="form-control jyfs" placeholder="输入 交易方式" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌开始日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_start" name="gp_date_start" value="{{$jyjz->gp_date_start}}" class="form-control date gp_date_start" placeholder="输入 挂牌开始日期">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌结束日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_end" name="gp_date_end" value="{{$jyjz->gp_date_end}}" class="form-control date gp_date_end" placeholder="输入 挂牌结束日期">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">合同签署日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="htqs_date" name="htqs_date" value="{{$jyjz->htqs_date}}" class="form-control date htqs_date" placeholder="输入 合同签署日期">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">评估结果</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="pgjg" name="pgjg" value="{{$jyjz->pgjg}}" class="form-control pgjg" placeholder="输入 评估结果">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易价款支付方式</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="zffs" name="zffs" value="{{$jyjz->zffs}}" class="form-control zffs" placeholder="输入 交易价款支付方式">
    </div>
  </div>
</div>



</div>

</form>