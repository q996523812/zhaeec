
<form method="post" id="formCwbb" class="form-horizontal cwxx">
  {{csrf_field()}}
        <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
        <input type="hidden" name="financialStatement_id" id="financialStatement_id" value="{{$cwbb->id}}">
<div class="container" style="width:99%;">
<div class="row" style="background-color: #F2F2F2F2;font-size: 20PX;border-top: 1px solid #e1e1e1;">
  <div class="form-group  col-sm-12"><center>以下数据出自企业财务报表</center></div>
</div>

<div class="row">
  <div class="form-group  col-sm-4">
    <label for="type" class="col-sm-5 control-label">财务报表日期</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
        <input id="statement_date" name="statement_date" type="text" size="15" class="form-control date" value="{{$cwbb->statement_date}}">
      </div>
    </div>
  </div>
  <div class="form-group  col-sm-8">
    <input type="hidden" id="ywwftg" name="ywwftg" value="{{$cwbb->ywwftg}}" >
    <input id="ywwftg1" name="ywwftg1" type="checkbox" class="noborder" value="1" 
@if($cwbb->ywwftg == '1')
checked
@endif
    >
        业务无法提供
  </div>
</div>
<div class="row">
  <div class="form-group  col-sm-4">
    <label for="type" class="col-sm-5  control-label">报表类型</label>
    <div class="col-sm-7">
      <input id="type1" name="type" type="radio" value="1" @if($cwbb->type == '1') checked @endif>年报
      <input id="type2" name="type" type="radio" value="2" @if($cwbb->type == '2') checked @endif>季报
      <input id="type3" name="type" type="radio" value="3" @if($cwbb->type == '3') checked @endif>月报
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">资产总额(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="zzc" name="zzc" value="{{$cwbb->zzc}}" class="form-control money zzc" >
      </div>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">负债总额(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="zfz" name="zfz" value="{{$cwbb->zfz}}" class="form-control money zfz" >
      </div>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">净资产(所有者权益)(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="syzqy" name="syzqy" value="{{$cwbb->syzqy}}" class="form-control money zzc" >
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">营业收入(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="yysl" name="yysl" value="{{$cwbb->yysl}}" class="form-control money yysl" >
      </div>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">利润总额(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="yylr" name="yylr" value="{{$cwbb->yylr}}" class="form-control money yylr" >
      </div>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">净利润(万元)</label>
    <div class="col-sm-7">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
        <input type="text" id="jlr" name="jlr" value="{{$cwbb->jlr}}" class="form-control money jlr" >
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-4">
    <label for="type" class="col-sm-5 control-label">备注</label>
    <div class="col-sm-7">
      <textarea name="desc" cols="60" rows="3" class="form-control">{{$cwbb->desc}}</textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
  <center><a href="javascript:void(0)" id="btnSaveCwbb" class="btn btn-primary btn-pass">保存财务信息</a></center>
</div>
</div>
</div>


<script>
    $(document).ready(function(){

      $('#btnSaveCwbb').on('click', function () {
          $("button").attr("disabled","disabled");
          var url = "/admin/cwbb"
          if($("#financialStatement_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formCwbb')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#financialStatement_id").val()){
                $("#financialStatement_id").val(str_reponse.message.id);
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("button").removeAttr("disabled");
              error(XMLHttpRequest);
            }
          });
      });
      function error(XMLHttpRequest){
        // console.log(XMLHttpRequest.responseText);
        // console.log(XMLHttpRequest.responseJSON);
        var status = XMLHttpRequest.status;
        var response = XMLHttpRequest.responseJSON;
        var message = "";
        if(status == '422'){
          var errors = response.errors;
          for(var index in errors){
            message += errors[index];
          }
        }
        else{
          message = response.message;
        }
        show_warning(message);
      }
      function show_warning(message){
        var html = "";
        html = "<div class='alert alert-warning alert-dismissable'>";
        html += message;
        html += '<\/div>';
        $(".warning-message").html(html);
      }

      function ywwftg(obj){
        if(obj.checked == true){
          $('#formCwbb #ywwftg').val(1);
          $('#formCwbb input').attr('readonly','true');
          $('#formCwbb textarea').attr('readonly','true');
          $('#formCwbb .form-control').val('');
          $('#formCwbb .form-control').val('');
        }
        else{
          $('#formCwbb #ywwftg').val(2);
          $('#formCwbb input').removeAttr('readonly');
          $('#formCwbb textarea').removeAttr('readonly');
        }
      }
      $('#formCwbb #ywwftg1').on('click',function(){
        ywwftg(this);
      });
      $('#formCwbb #ywwftg1').on('checked',function(){
        ywwftg(this);
      });

      $('#formCwbb #ywwftg1').trigger('checked');
    });
</script>
</form>