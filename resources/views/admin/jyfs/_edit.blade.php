<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$jyfs->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易方式</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <select id="pubDealWay" name="pubDealWay" class="form-control"></select>
      </div>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">其他交易方式说明</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="dealWayDesc" name="dealWayDesc" value="{{$jyfs->dealWayDesc}}" class="form-control pubDays" placeholder="输入 其他交易方式说明">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">是否采用动态报价</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <select id="ifBiddyn" name="ifBiddyn" class="form-control"></select>
      </div>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">报价方式</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <select id="bidmode" name="bidmode" class="form-control"></select>
      </div>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">加价幅度(元)</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="increase_range" name="increase_range" value="{{$jyfs->increase_range}}" class="form-control money increase_range" placeholder="输入 加价幅度">
    </div>
  </div>
</div>
<!--
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">自由竞价开始日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_start" name="gp_date_start" value="{{$jyfs->gp_date_start}}" class="form-control date gp_date_start" placeholder="输入 自由竞价开始日期">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">自由竞价结束日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_end" name="gp_date_end" value="{{$jyfs->gp_date_end}}" class="form-control date gp_date_end" placeholder="输入 自由竞价结束日期">
    </div>
  </div>
</div>
-->

<div class="form-group  ">
	<div class="col-md-8">
        <div class="btn-group pull-right">
          	<button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        // $('.price_total').inputmask({"alias":"decimal","rightAlign":true});
        // $('.price_unit').inputmask({"alias":"decimal","rightAlign":true});
        $('.money').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#pubDealWay').selecter({
          autoSelect: false,
          type: "jyfs",
          savetype: 2,
          selectvalue: "{{$jyfs->pubDealWay}}"
        });
        $('#ifBiddyn').selecter({
          autoSelect: false,
          type: "sf",
          savetype: 2,
          selectvalue: "{{$jyfs->ifBiddyn}}"
        });
        $('#bidmode').selecter({
          autoSelect: false,
          type: "bidmode",
          savetype: 2,
          selectvalue: "{{$jyfs->bidmode}}"
        });


    });
    </script> 
</form>