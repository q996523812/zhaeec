<form method="post" id="formPgqk">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
			<input type="hidden" name="assessment_id" id="assessment_id" value="{{$pgqk->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table cellpadding="0" cellspacing="1" class="table table-bordered">
	<tbody><tr>
		<th width="67" rowspan="19" align="center">标的<br>企业<br>评估<br>核准<br>或备<br>案情<br>况 </th>
		<td width="150">评估机构</td>
		<td colspan="2"><input type="text" name="pgjg" class="form-control" validtype="length[1,100]" size="50" required="true" value="{{$pgqk->pgjg}}"></td>
  	</tr>
  	<tr>
		<td>评估核准（备案）机构</td> 
		<td colspan="2" class="unput">
			<input type="text" name="pgbajg" class="form-control" validtype="length[0,50]" size="50" required="required" value="{{$pgqk->pgbajg}}">
   			<input name="hezhunFlag" type="checkbox" value="Y">核准 &nbsp;&nbsp;&nbsp;&nbsp;
    		<input name="beianFlag" type="checkbox" value="Y">备案，最多50个汉字
    	</td>
  	</tr>
  	<tr>
		<td>核准（备案）日期</td>
		<td colspan="2">
			<div class="input-group">
	          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
	          <input id="hzbarq" type="text" name="hzbarq" size="15" class="form-control date" value="{{$pgqk->hzbarq}}">
	        </div>
			
		</td>
  	</tr>
  	<tr>
		<td>评估基准日</td>
		<td colspan="2">
    		<div class="input-group">
	          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
	          <input id="pgjzr" type="text" name="pgjzr" size="15" class="form-control date" value="{{$pgqk->pgjzr}}">
	        </div>
			
    	</td>
  	</tr>
	<tr>
		<td>评估报告文号</td>
		<td colspan="2">
			<input name="estNoticeno" type="text" size="50" class="form-control" validtype="length[0,100]" required="true" value="{{$pgqk->estNoticeno}}">
		</td>
	</tr>
	<tr>
	    <td>评估基准日审计机构</td>
	    <td colspan="2" class="unput">
	    	<input name="pgjzrsjjg" type="text" size="50" class="form-control" validtype="length[0,300]" value="{{$pgqk->pgjzrsjjg}}">
	    </td>
	</tr>  
	<tr>
	    <td>律师事务所</td>
	    <td colspan="2" class="unput">
	    	<input name="lssws" type="text" size="50" class="form-control" validtype="length[0,300]" value="{{$pgqk->lssws}}">
	    </td>
	</tr>
	<tr>
     	<td>转让标的评估值</td>
    	<td colspan="2">
        
        <div>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                <input name="estimatePrice" type="text" size="15" maxlength="20" class="form-control money" required="true" value="{{$pgqk->estimatePrice}}">
              </div>
            </div>
            <div class="col-sm-3">
              <span id="estimatePrice_zh" style="color:red;font-size:16px;"></span>
              万元
            </div>
        </div>
			
		</td>
    </tr>
    <!-- 
    <tr>
     	<td>账面原值</td>
   	 	<td colspan="2" class="unput">
			<input name="originalPrice"  type=text size=15  maxlength="20" onkeyup="numberTypeFloat(this); bigTxtWanYuan('originalPrice',this.value)" onblur="numberPoint(this,6)"/>&nbsp;万元
			<span id="originalPrice" style="color:red;font-size:16px;"></span>
		</td>
    </tr>  
    --> 
	<tr>
    	<th colspan="3">资产评估结果(<font color="red">万元</font>)</th>
    </tr>
  	<tr>
    	<td>项目</td>
    	<td>账面价值</td>
    	<td>评估价值</td>
    </tr>
	<tr>
    	<td>流动资产</td>
    	<td><input name="zmLdzc" type="text" size="12" class="form-control money" value="{{$pgqk->zmLdzc}}"></td>
    	<td><input name="pgLdzc" type="text" size="12" class="form-control money" value="{{$pgqk->pgLdzc}}"></td>
    </tr>
	<tr>
    	<td>其他资产</td>
    	<td><input name="zmQtzc" type="text" size="12" class="form-control money" value="{{$pgqk->zmQtzc}}"></td>
    	<td><input name="pgQtzc" type="text" size="12" class="form-control money" value="{{$pgqk->pgQtzc}}"></td>
    </tr>
	<tr>
    	<td>总资产</td>
    	<td>
    		<input name="zmZzc" type="text" size="12" class="form-control money" value="{{$pgqk->zmZzc}}">
    	</td>
    	<td align="left">
	    	<input name="pgZzc" type="text" size="12" class="form-control money" value="{{$pgqk->pgZzc}}">
		</td>
    </tr>
	<tr>
    <td>流动负债</td>
    	<td><input name="zmLdfz" type="text" size="12" class="form-control money" value="{{$pgqk->zmLdfz}}"></td>
    	<td><input name="pgLdfz" type="text" size="12" class="form-control money" value="{{$pgqk->pgLdfz}}"></td>
    </tr>
	<tr>
		<td>长期负债</td>
    	<td align="left"><input name="zmCqfz" type="text" size="12" class="form-control money" value="{{$pgqk->zmCqfz}}"></td>
    	<td align="left"><input name="pgCqfz" type="text" size="12" class="form-control money" value="{{$pgqk->pgCqfz}}"></td>
	</tr>
	<tr>
    	<td>总负债</td>
    	<td>
		    <input name="zmZfz" type="text" size="12" class="form-control money" value="{{$pgqk->zmZfz}}">
    	</td>
    	<td>
    		<input name="pgZfz" type="text" size="12" class="form-control money" value="{{$pgqk->pgZfz}}">
    	</td>
    </tr>
	<tr>
    	<td>净资产</td>
    	<td>
			<input name="zmJzc" type="text" size="12" class="form-control money" value="{{$pgqk->zmJzc}}">
    	</td>
    	<td>
			<input name="pgJzc" type="text" size="12" class="form-control money" value="{{$pgqk->pgJzc}}">
     	</td>
	</tr>
	<tr>
		<th colspan="4">评估备注信息</th>
	</tr>
	<tr>
		<td colspan="4" class="unput"><textarea name="remark" rows="6" cols="110" class="form-control" validtype="length[0,666]">{{$pgqk->remark}}</textarea></td>
	</tr>
	<tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSavePgqk" class="btn btn-primary btn-pass">保存评估信息</a></center></td>
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

      $('#btnSavePgqk').on('click', function () {
          $("button").attr("disabled","disabled");
          var url = "/admin/pgqk"
          if($("#assessment_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formPgqk')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#assessment_id").val()){
                $("#assessment_id").val(str_reponse.message.id);
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

    });
</script>
</form>