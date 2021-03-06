<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌日期类型</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <select id="date_type" name="date_type" class="form-control" disabled="disabled"></select>
      </div>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌公告期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="pubDays" name="pubDays" value="{{$detail->pubDays}}" class="form-control pubDays" placeholder="输入 挂牌公告期" disabled="disabled">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌开始日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_start" name="gp_date_start" value="{{$detail->gp_date_start}}" class="form-control date gp_date_start" placeholder="输入 挂牌开始日期">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">挂牌结束日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="gp_date_end" name="gp_date_end" value="{{$detail->gp_date_end}}" class="form-control date gp_date_end" placeholder="输入 挂牌结束日期">
    </div>
  </div>
</div>


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
        $('#date_type').selecter({
          autoSelect: false,
          type: "date_type",
          savetype: 2,
          selectvalue: "{{$detail->date_type}}"
        });
    });
    </script> 
</form>