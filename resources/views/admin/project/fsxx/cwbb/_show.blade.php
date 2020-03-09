
<form method="post" id="formCwbb">

	<div class="box-body">
		<div class="fields-group">

			<div class="row">
				{{csrf_field()}}
				<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$bdqy->project_id}}">
				<input type="hidden" name="financialStatement_id" id="financialStatement_id" value="{{$cwbb->id}}">
			</div>

			<div class="row">
				<div class="container table-responsive col-md-12 align-items-center project-table">

					<table id="thisYear" cellpadding="0" cellspacing="1" class="table table-bordered">
						<tbody><tr>
							<th colspan="4">以下数据出自企业财务报表<br></th>
						</tr> 
						<tr>
							<td colspan="4">
	      	<center>
	      		<div id="type_div"></div>
	      	</center> 
      	</td>
    </tr> 
    <tr>
	    <td width="159" rowspan="3">
	    	财务报表日期 <font color="red">*</font><br>
	    	<div class="input-group">
	          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
	          <input id="statement_date" name="statement_date" type="text" size="15" class="form-control date" value="{{$cwbb->statement_date}}">
	        </div>
			
			<br>
    <input id="ywwftg" name="ywwftg" type="checkbox" class="noborder" value="1" 
@if($cwbb->ywwftg == '1')
checked
@endif
    >
        业务无法提供
		</td>
    	<td>资产总额<font color="red">*</font>
			   <input name="zzc" type="text" size="12" class="money" value="{{$cwbb->zzc}}">万元
      	</td>
      	<td>负债总额<font color="red">*</font>
        	<input name="zfz" type="text" size="12" class="money" value="{{$cwbb->zfz}}">万元
      	</td>
      	<td>净资产（所有者权益）<font color="red">*</font>
      		<input name="syzqy" type="text" size="12" class="money" value="{{$cwbb->syzqy}}">万元
      	</td>
	</tr>	 
    <tr>
    	<td>营业收入<font color="red">*</font>
    		<input name="yysl" type="text" size="12" class="money" value="{{$cwbb->yysl}}">万元
    	</td>
    	<td>利润总额<font color="red">*</font>
    		<input name="yylr" type="text" size="12" class="money" value="{{$cwbb->yylr}}">万元
      	</td>
    	<td>净利润<font color="red">*</font>
			<input name="jlr" type="text" size="12" class="money" value="{{$cwbb->jlr}}">万元
        </td>
    </tr>
    <tr>
	    <td colspan="4" class="unput">
	    	备注<br>
	    	<textarea name="desc" cols="60" rows="3" validtype="length[0,1000]">{{$cwbb->desc}}</textarea>
	    </td>
    </tr>

</tbody></table>
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
              // error(XMLHttpRequest);
            }
          });
      });

        $('#type_div').radio({
          autoSelect: false,
          type: "reporttype",
          tabname: "type",
          defaultvalue: "{{$detail->type}}"
        });
    });
</script>
</form>