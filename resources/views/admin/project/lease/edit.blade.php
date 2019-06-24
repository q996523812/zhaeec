@extends('admin.project.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/print/zczl')

@section('content')
  <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
    <div class="box-body">
      <div class="fields-group">
        <div class="row">
          {{csrf_field()}}
          <input type="hidden" name="status" value="1" class="status form-control">
          <input type="hidden" name="process" value="11" class="process form-control">
          <input type="hidden" name="user_id" value="1" class="user_id form-control">
          <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
          <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id form-control">
          <input type="hidden" name="sjly" value="业务录入" class="sjly form-control">
          <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
        </div>      
        <div class="row">
          @include('admin.project.lease._project_edit')
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group pull-right">
              <button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
            </div>
          </div>
        </div> 

      </div>
    </div>         
  </form>  
@endsection


@section('script')
<script>
$(function () {
    //行政区划下拉框联动
    $("#distpicker1").distpicker({
      autoSelect: false,
      province: "{{$detail->wtf_province}}",
      city: "{{$detail->wtf_city}}",
      district: "{{$detail->wtf_area}}"
    });
    $('#distpicker2').distpicker({
      autoSelect: false,
      province: "{{$detail->fc_province}}",
      city: "{{$detail->fc_city}}",
      district: "{{$detail->fc_area}}"
    });

    //日期
    $('.gp_date_start').parent().datetimepicker({
      "format":"YYYY-MM-DD",
      "locale":"zh-CN",
      "allowInputToggle":true
    });
    $('.gp_date_end').parent().datetimepicker({
      "format":"YYYY-MM-DD",
      "locale":"zh-CN",
      "allowInputToggle":true
    });
    $('.bzj_jn_time_end').parent().datetimepicker({
      "format":"YYYY-MM-DD HH:mm:ss",
      "locale":"zh-CN",
      "allowInputToggle":true
    });
    $('.fc_jcsj').parent().datetimepicker({
      "format":"YYYY-MM-DD",
      "locale":"zh-CN",
      "allowInputToggle":true
    });

    //金额、数字
    $('.gpjg_zj').inputmask({"alias":"decimal","rightAlign":true});
    $('.gpjg_dj').inputmask({"alias":"decimal","rightAlign":true});
    $('.zlqx').inputmask({"alias":"decimal","rightAlign":true});
    $('.pgjz').inputmask({"alias":"decimal","rightAlign":true});
    $('.jjfd').inputmask({"alias":"decimal","rightAlign":true});
    $('.bzj').inputmask({"alias":"decimal","rightAlign":true});
    $('.fc_mj').inputmask({"alias":"decimal","rightAlign":true});

    //下拉框
    $('#sfhs').selecter({
      autoSelect: false,
      type: "sf",
      selectvalue: "{{$detail->sfhs}}"
    });
    $('#wtf_qyxz').selecter({
      autoSelect: false,
      type: "qyxz",
      selectvalue: "{{$detail->wtf_qyxz}}"
    });    
    
    $('#wtf_jt').selecter({
      autoSelect: false,
      type: "ssjt",
      selectvalue: "{{$detail->wtf_jt}}"
    }); 

    $('#jyfs').selecter({
      autoSelect: false,
      type: "jyfs",
      selectvalue: "{{$detail->jyfs}}"
    });
    $('#bjms').selecter({
      autoSelect: false,
      type: "bjms",
      selectvalue: "{{$detail->bjms}}"
    });
    $('#jymd').selecter({
      autoSelect: false,
      type: "jymd",
      selectvalue: "{{$detail->jymd}}"
    });
    $('#zclb').selecter({
      autoSelect: false,
      type: "zclb",
      selectvalue: "{{$detail->zclb}}"
    });
    $('#fbfs').selecter({
      autoSelect: false,
      type: "xxfbfs",
      selectvalue: "{{$detail->fbfs}}"
    });
});
</script>
@endsection