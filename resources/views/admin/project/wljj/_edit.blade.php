<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
<label for="type" class="col-sm-2  control-label">中标人</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<select id="yxf_id" name="yxf_id" class="form-control yxf_id">
   @foreach($yxfs as $yxf)
   <option value="{{$yxf->id}}">{{$yxf->name}}</option>
   @endforeach
</select>
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
        
    });
    </script> 
</form>