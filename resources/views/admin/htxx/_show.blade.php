<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$htxx->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$htxx->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目编号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
        <input type="text" id="xmbh" name="xmbh" value="{{$project->xmbh}}" class="form-control readonly xmbh" placeholder="输入 项目编号" readyonly="readonly">
      </div>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">标的名称</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 标的名称" readyonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">合同编号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="code" name="code" value="{{$htxx->code}}" class="form-control code" placeholder="输入 合同编号">
    </div>
  </div>
</div>

<div class="form-group">
  <label for="type" class="col-sm-2  control-label">签约时间</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="sign_date" name="sign_date" value="{{$htxx->sign_date}}" class="form-control date sign_date" placeholder="输入 签约时间">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-sm-2  control-label">合同生效时间</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="effect_date" name="effect_date" value="{{$htxx->effect_date}}" class="form-control date effect_date" placeholder="输入 合同生效时间">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-sm-2  control-label">合同期限开始日期</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="term_date_start" name="term_date_start" value="{{$htxx->term_date_start}}" class="form-control date term_date_start" placeholder="输入 合同期限开始日期">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-sm-2  control-label">合同期限结束日期</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="term_date_end" name="term_date_end" value="{{$htxx->term_date_end}}" class="form-control date term_date_end" placeholder="输入 合同期限结束日期">
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
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        //下拉框
        
        $('#formdetail input').attr('disabled','true');
        $('#formdetail select').attr('disabled','true');
        $('#formdetail textarea').attr('disabled','true');
    });
    </script> 
</form>