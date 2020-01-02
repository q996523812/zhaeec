<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$gg->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目编号</label>
  <div class="col-sm-8">
    <div class="input-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
        <input type="text" id="xmbh" name="xmbh" value="{{$gg->xmbh}}" class="form-control readonly xmbh" placeholder="输入 项目编号" readonly="readonly">
      </div>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">标的名称</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="title" name="title" value="{{$gg->title}}" class="form-control readonly title" placeholder="输入 标的名称" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">公告类型</label>
  <div class="col-sm-8">
    <div class="input-group">
      <select id="type" name="type" class="form-control readonly" readonly="readonly"></select>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf" name="wtf" value="{{$gg->wtf}}" class="form-control wtf" placeholder="输入 委托方" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">理由</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="content" name="content" value="{{$gg->content}}" class="form-control content" placeholder="输入 理由">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">终结日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="date_matter" name="date_matter" value="{{$gg->date_matter}}" class="form-control date date_matter" placeholder="输入 终结日期">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">落款单位</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="inscription_company" name="inscription_company" value="{{$gg->inscription_company}}" class="form-control inscription_company" placeholder="输入 落款单位">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">落款日期</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="inscription_date" name="inscription_date" value="{{$gg->inscription_date}}" class="form-control date inscription_date" placeholder="输入 落款日期">
    </div>
  </div>
</div>


<div class="form-group  ">
	<div class="col-md-8">
        <div class="btn-group pull-right">
          	<button type="button" id="btnSaveGG" class="btn btn-primary btn-pass">保存</button>
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
          province: "{{$gg->wtf_province}}",
          city: "{{$gg->wtf_city}}",
          district: "{{$gg->wtf_area}}"
        });
*/
        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        
        //下拉框
        $('#type').selecter({
          autoSelect: false,
          type: "suspendtype",
          savetype: 2,
          selectvalue: "{{$gg->type}}"
        });

        $('#btnSaveGG').on('click',function(){
          $("button").attr("disabled","disabled");
          var url = "/admin/gg"
          if($("#id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formdetail')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#id").val()){
                $("#id").val(str_reponse.message.id);
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){console.log(XMLHttpRequest);
              $("button").removeAttr("disabled");
              //error(XMLHttpRequest);

            }
          });
        });
    });
    </script> 
</form>