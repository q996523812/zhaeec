<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
<label for="type" class="col-sm-2  control-label">类型</label>
<div class="col-sm-8">
<div class="input-group">
{{$detail->type}}
</div>
</div>
</div>

<div class="form-group  ">
<label for="name" class="col-sm-2  control-label">客户名称</label>
<div class="col-sm-8">
<div class="input-group">
{{$detail->name}}
</div>
</div>
</div>

<div class="form-group  ">
<label for="id_type" class="col-sm-2  control-label">证件类型</label>
<div class="col-sm-8">
<div class="input-group">
{{$detail->id_type}}
</div>
</div>
</div>

<div class="form-group  ">
<label for="id_code" class="col-sm-2  control-label">证件号码</label>
<div class="col-sm-8">
<div class="input-group">
{{$detail->id_code}}
</div>
</div>
</div>

</div>
<script>
    $(function () {
    	/*
        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$detail->wtf_province}}",
          city: "{{$detail->wtf_city}}",
          district: "{{$detail->wtf_area}}"
        });

        //日期
        $('.gp_date_start').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.gpjg_zj').inputmask({"alias":"decimal","rightAlign":true});
*/
        //下拉框
        $('#type').selecter({
          autoSelect: false,
          type: "costomertype",
          savetype: 2,
          selectvalue: "{{$detail->type}}"
        });
       	$('#id_type').selecter({
          autoSelect: false,
          type: "id_type",
          selectvalue: "{{$detail->id_type}}"
        });
    });
    </script> 
</form>