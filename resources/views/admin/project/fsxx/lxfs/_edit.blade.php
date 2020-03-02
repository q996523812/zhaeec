<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formLxfs">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}" class="project_id">
    <input type="hidden" id="contact_id" name="contact_id" value="{{$lxfs->id}}">
<div class="fields-group">
<!--
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方联系人姓名</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf_lxr_name" name="wtf_lxr_name" value="{{$lxfs->wtf_lxr_name}}" class="form-control pubDays" placeholder="输入 委托方联系人姓名">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方联系人电话</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf_lxr_mobile" name="wtf_lxr_mobile" value="{{$lxfs->wtf_lxr_mobile}}" class="form-control pubDays" placeholder="输入 委托方联系人电话">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方联系人邮箱</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="wtf_lxr_email" name="wtf_lxr_email" value="{{$lxfs->wtf_lxr_email}}" class="form-control pubDays" placeholder="输入 委托方联系人邮箱">
    </div>
  </div>
</div>
-->


<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易机构联系人姓名</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="ptf_lxr_name" name="ptf_lxr_name" value="{{$lxfs->ptf_lxr_name}}" class="form-control pubDays" placeholder="输入 交易机构联系人姓名">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易机构联系人电话</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="ptf_lxr_mobile" name="ptf_lxr_mobile" value="{{$lxfs->ptf_lxr_mobile}}" class="form-control pubDays" placeholder="输入 交易机构联系人电话">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">交易机构联系人邮箱</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="ptf_lxr_email" name="ptf_lxr_email" value="{{$lxfs->ptf_lxr_email}}" class="form-control pubDays" placeholder="输入 交易机构联系人邮箱">
    </div>
  </div>
</div>


<div class="form-group  ">
	<div class="col-md-8">
        <div class="btn-group pull-right">
          	<button type="button" id="btnSaveLxfs" class="btn btn-primary btn-pass">保存</button>
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

      $('#btnSaveLxfs').on('click', function () {
          $("#btnSaveJgxx").attr("disabled","disabled");
          var url = "/admin/lxfs"
          if($("#contact_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formLxfs')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#contact_id").val()){
                $("#contact_id").val(str_reponse.message.id);
              }
              $("#btnSaveLxfs").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("#btnSaveLxfs").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });


    });
    </script> 
</form>