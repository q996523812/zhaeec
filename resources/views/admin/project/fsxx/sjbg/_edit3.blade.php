<form method="post" id="formSjbg1">

<div class="box-body">
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
        <input name="year" type="text" size="4" required="true" class="form-control1 number" value="{{$sj1->year}}">年
    	<br>
      <input type="hidden" id="ywwftg" name="ywwftg" value="{{$sj1->ywwftg}}">
      <input id="ywwftg1" name="ywwftg1" type="checkbox" value="1" @if($sj1->ywwftg == 1) checked="checked" @endif>业务无法提供
    	</td>
    	<td>资产总额<font color="red">*</font>
			   <input name="zzc" type="text" size="12" class="form-control1 money" value="{{$sj1->zzc}}">万元
      	</td>
      	<td>负债总额<font color="red">*</font>
        	<input name="zfz" type="text" size="12" class="form-control1 money" value="{{$sj1->zfz}}">万元
      	</td>
      	<td>净资产（所有者权益）<font color="red">*</font>
      		<input name="syzqy" type="text" size="12" class="form-control1 money" value="{{$sj1->syzqy}}">万元
      	</td>
    	</tr>
    <tr>
    	<td>营业收入<font color="red">*</font>
    		<input name="yysl" type="text" size="12" class="form-control1 money" value="{{$sj1->yysl}}">万元
    	</td>
    	<td>利润总额<font color="red">*</font>
    		<input name="yylr" type="text" size="12" class="form-control1 money" value="{{$sj1->yylr}}">万元
      	</td>
    	<td>净利润<font color="red">*</font>
			<input name="jlr" type="text" size="12" class="form-control1 money" value="{{$sj1->jlr}}">万元
        </td>
    </tr>
    <tr>
      	<td colspan="3">审计机构名称  <font color="red">*</font>
      		<input name="sjjgmc" type="text" class="form-control1" required="true" value="{{$sj1->sjjgmc}}">
      	</td>
    </tr>
    <tr>
      	<td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" class="form-control1">{{$sj1->desc}}</textarea>
        </td>
    </tr>
    <tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveSj1" class="btn btn-primary btn-pass">保存审计信息</a></center></td>
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
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

<script>
    $(document).ready(function(){

      $('#btnSaveSj1').on('click', function () {
          $("#formSjbg1 .btn").attr("disabled","disabled");
          var url = "/admin/sjbg"
          if($("#formSjbg1 #auditReport_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formSjbg1')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#formSjbg1 #auditReport_id").val()){
                $("#formSjbg1 #auditReport_id").val(str_reponse.message.id);
              }
              $("#formSjbg1 .btn").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("#formSjbg1 .btn").removeAttr("disabled");
              // error(XMLHttpRequest);
              console.log(XMLHttpRequest);
            }
          });
      });
      function ywwftg(obj){
        if(obj.checked == true){
          $('#formSjbg1 #ywwftg').val(1);
          $('#formSjbg1 input').attr('readonly','true');
          $('#formSjbg1 textarea').attr('readonly','true');
          $('#formSjbg1 .form-control1').val('');
          $('#formSjbg1 .form-control1').val('');
        }
        else{
          $('#formSjbg1 #ywwftg').val(2);
          $('#formSjbg1 input').removeAttr('readonly');
          $('#formSjbg1 textarea').removeAttr('readonly');
        }
        console.log($('#formSjbg1 #ywwftg').val());
      }
      $('#formSjbg1 #ywwftg1').on('click',function(){
        ywwftg(this);
      });
      $('#formSjbg1 #ywwftg1').on('checked',function(){
        ywwftg(this);
      });

      $('#formSjbg1 #ywwftg1').trigger('checked');
    });
</script>
</form>

<form method="post" id="formSjbg2">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj2->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">


<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
  <tbody><tr>
    <th colspan="4">以下数据出自年度审计报告</th>
  </tr>
  <tr>
      <td rowspan="4">
        前二年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="form-control1 number" value="{{$sj2->year}}">年
      <br>
      <input type="hidden" id="ywwftg" name="ywwftg" value="{{$sj2->ywwftg}}">
      <input id="ywwftg2" name="ywwftg2" type="checkbox" value="1"
      @if($sj2->ywwftg == '1')
      checked
      @endif
      >业务无法提供
      </td>
      <td>资产总额<font color="red">*</font>
         <input name="zzc" type="text" size="12" class="form-control1 money" value="{{$sj2->zzc}}">万元
        </td>
        <td>负债总额<font color="red">*</font>
          <input name="zfz" type="text" size="12" class="form-control1 money" value="{{$sj2->zfz}}">万元
        </td>
        <td>净资产（所有者权益）<font color="red">*</font>
          <input name="syzqy" type="text" size="12" class="form-control1 money" value="{{$sj2->syzqy}}">万元
        </td>
      </tr>
    <tr>
      <td>营业收入<font color="red">*</font>
        <input name="yysl" type="text" size="12" class="form-control1 money" value="{{$sj2->yysl}}">万元
      </td>
      <td>利润总额<font color="red">*</font>
        <input name="yylr" type="text" size="12" class="form-control1 money" value="{{$sj2->yylr}}">万元
        </td>
      <td>净利润<font color="red">*</font>
      <input name="jlr" type="text" size="12" class="form-control1 money" value="{{$sj2->jlr}}">万元
        </td>
    </tr>
    <tr>
        <td colspan="3">审计机构名称  <font color="red">*</font>
          <input name="sjjgmc" type="text" class="form-control1" value="{{$sj2->sjjgmc}}">
        </td>
    </tr>
    <tr>
        <td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" class="form-control1" >{{$sj2->desc}}</textarea>
        </td>
    </tr>
    <tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveSj2" class="btn btn-primary btn-pass">保存审计信息</a></center></td>
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
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

<script>
    $(document).ready(function(){

      $('#btnSaveSj2').on('click', function () {
          $("#formSjbg2 .btn").attr("disabled","disabled");
          var url = "/admin/sjbg"
          if($("#formSjbg2 #auditReport_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formSjbg2')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#formSjbg2 #auditReport_id").val()){
                $("#formSjbg2 #auditReport_id").val(str_reponse.message.id);
              }
              $("#formSjbg2 .btn").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("#formSjbg2 .btn").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });
      function ywwftg(obj){
        if(obj.checked == true){
          $('#formSjbg2 #ywwftg').val(1);
          $('#formSjbg2 input').attr('readonly','true');
          $('#formSjbg2 textarea').attr('readonly','true');
          $('#formSjbg2 .form-control1').val('');
          $('#formSjbg2 .form-control1').val('');
        }
        else{
          $('#formSjbg2 #ywwftg').val(2);
          $('#formSjbg2 input').removeAttr('readonly');
          $('#formSjbg2 textarea').removeAttr('readonly');
        }
      }
      $('#formSjbg2 #ywwftg2').on('click',function(){
        ywwftg(this);
      });
      $('#formSjbg2 #ywwftg2').on('checked',function(){
        ywwftg(this);
      });

      $('#formSjbg2 #ywwftg2').trigger('checked');
    });
</script>
</form>

<form method="post" id="formSjbg3">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj3->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">


<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
  <tbody><tr>
    <th colspan="4">以下数据出自年度审计报告</th>
  </tr>
  <tr>
      <td rowspan="4">
        前三年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="form-control1 number" value="{{$sj3->year}}">年
      <br>
      <input type="hidden" id="ywwftg" name="ywwftg" value="{{$sj3->ywwftg}}">
      <input id="ywwftg3" name="ywwftg3" type="checkbox" value="1"
      @if($sj3->ywwftg == '1')
      checked
      @endif
      >业务无法提供
      </td>
      <td>资产总额<font color="red">*</font>
         <input name="zzc" type="text" size="12" class="form-control1 money" value="{{$sj3->zzc}}">万元
        </td>
        <td>负债总额<font color="red">*</font>
          <input name="zfz" type="text" size="12" class="form-control1 money" value="{{$sj3->zfz}}">万元
        </td>
        <td>净资产（所有者权益）<font color="red">*</font>
          <input name="syzqy" type="text" size="12" class="form-control1 money" value="{{$sj3->syzqy}}">万元
        </td>
      </tr>
    <tr>
      <td>营业收入<font color="red">*</font>
        <input name="yysl" type="text" size="12" class="form-control1 money" value="{{$sj3->yysl}}">万元
      </td>
      <td>利润总额<font color="red">*</font>
        <input name="yylr" type="text" size="12" class="form-control1 money" value="{{$sj3->yylr}}">万元
        </td>
      <td>净利润<font color="red">*</font>
      <input name="jlr" type="text" size="12" class="form-control1 money" value="{{$sj3->jlr}}">万元
        </td>
    </tr>
    <tr>
        <td colspan="3">审计机构名称  <font color="red">*</font>
          <input name="sjjgmc" type="text" class="form-control1" value="{{$sj3->sjjgmc}}">
        </td>
    </tr>
    <tr>
        <td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" class="form-control1" >{{$sj3->desc}}</textarea>
        </td>
    </tr>
    <tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveSj3" class="btn btn-primary btn-pass">保存审计信息</a></center></td>
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
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

<script>
    $(document).ready(function(){

      $('#btnSaveSj3').on('click', function () {
          $("#formSjbg3 .btn").attr("disabled","disabled");
          var url = "/admin/sjbg"
          if($("#formSjbg3 #auditReport_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formSjbg3')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#formSjbg3 #auditReport_id").val()){
                $("#formSjbg3 #auditReport_id").val(str_reponse.message.id);
              }
              $("#formSjbg3 .btn").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("#formSjbg3 .btn").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });
      function ywwftg(obj){
        if(obj.checked == true){
          $('#formSjbg3 #ywwftg').val(1);
          $('#formSjbg3 input').attr('readonly','true');
          $('#formSjbg3 textarea').attr('readonly','true');
          $('#formSjbg3 .form-control1').val('');
          $('#formSjbg3 .form-control1').val('');
        }
        else{
          $('#formSjbg3 #ywwftg').val(2);
          $('#formSjbg3 input').removeAttr('readonly');
          $('#formSjbg3 textarea').removeAttr('readonly');
        }
      }
      $('#formSjbg3 #ywwftg3').on('click',function(){
        ywwftg(this);
      });
      $('#formSjbg3 #ywwftg3').on('checked',function(){
        ywwftg(this);
      });

      $('#formSjbg3 #ywwftg3').trigger('checked');
    });
</script>
</form>
