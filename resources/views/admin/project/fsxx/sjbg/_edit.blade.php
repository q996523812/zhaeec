<form method="post" accept-charset="UTF-8" class="form-inline" pjax-container="" id="formSjbg">

<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj1->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">


<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
	<tbody><tr>
		<th colspan="4">以下数据出自年度审计报告</th>
	</tr>
	<tr>
    	<td rowspan="4">
        前一年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="number" value="{{$sj1->year}}">年
    	<br>
      <input id="ywwftg" name="ywwftg" type="checkbox" value="1" 
      @if($sj1->ywwftg == '1')
      checked
      @endif
      >业务无法提供
    	</td>
    	<td>资产总额<font color="red">*</font>
			   <input name="zzc" type="text" size="12" class="form-control money" value="{{$sj1->zzc}}">万元
      	</td>
      	<td>负债总额<font color="red">*</font>
        	<input name="zfz" type="text" size="12" class="form-control money" value="{{$sj1->zfz}}">万元
      	</td>
      	<td>净资产（所有者权益）<font color="red">*</font>
      		<input name="syzqy" type="text" size="12" class="form-control money" value="{{$sj1->syzqy}}">万元
      	</td>
    	</tr>
    <tr>
    	<td>营业收入<font color="red">*</font>
    		<input name="yysl" type="text" size="12" class="form-control money" value="{{$sj1->yysl}}">万元
    	</td>
    	<td>利润总额<font color="red">*</font>
    		<input name="yylr" type="text" size="12" class="form-control money" value="{{$sj1->yylr}}">万元
      	</td>
    	<td>净利润<font color="red">*</font>
			<input name="jlr" type="text" size="12" class="form-control money" value="{{$sj1->jlr}}">万元
        </td>
    </tr>
    <tr>
      	<td colspan="3">审计机构名称  <font color="red">*</font>
      		<input name="sjjgmc" type="text" size="80" class="form-control" required="true" value="{{$sj1->sjjgmc}}">
      	</td>
    </tr>
    <tr>
      	<td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" class="form-control">{{$sj1->desc}}</textarea>
        </td>
    </tr>
    <tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveSj" class="btn btn-primary btn-pass">保存审计信息</a></center></td>
    </tr>
    
</tbody>
</table>
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      
    </div>
  </div>
</div> 
                                            

            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

<script>
    $(document).ready(function(){

      $('#btnSaveSj').on('click', function () {
          $("button").attr("disabled","disabled");
          var url = "/admin/sjbg"
          if($("#auditReport_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formSjbg')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#auditReport_id").val()){
                $("#auditReport_id").val(str_reponse.message.id);
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              alert("保存失败");
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

      $('#formSjbg #ywwftg').on('click',function(){console.log(this.checked);
        if(this.checked == true){
          $('#formSjbg input').attr('readonly','true');
          $('#formSjbg textarea').attr('readonly','true');
        }
        else{
          $('#formSjbg input').removeAttr('readonly');
          $('#formSjbg textarea').removeAttr('readonly');
        }
      });

      $('#formSjbg #ywwftg').on('click',function(){
        if(this.checked == true){
          $('#formSjbg input').attr('readonly','true');
          $('#formSjbg textarea').attr('readonly','true');
        }
        else{
          $('#formSjbg input').removeAttr('readonly');
          $('#formSjbg textarea').removeAttr('readonly');
        }
      });
      $('#formSjbg #ywwftg').click();
    });
</script>
</form>