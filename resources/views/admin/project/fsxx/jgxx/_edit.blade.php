<form method="post" id="formJgxx">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
			<input type="hidden" name="supervise_id" id="supervise_id" value="{{$jgxx->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

	<table cellpadding="0" cellspacing="1" class="table table-bordered" style="margin-top: 0px;">
		<tbody>
		<tr>
			<th rowspan="3" width="67">
				监管信息
			</th>
			<td width="199">
				国资监管类型
			</td>
			<td colspan="5">
				<input id="sellerIsYq1" type="radio" name="sellerIsYq" onclick="isYQ()" value="1" @if($jgxx->sellerIsYq==1) checked @endif>
				中央 &nbsp;&nbsp;
				<input id="sellerIsYq2" type="radio" name="sellerIsYq" onclick="notYQ()" value="2" @if($jgxx->sellerIsYq==2) checked @endif>
				地方
			</td>
		</tr>
		<tr>
			<td width="199">
				国资监管机构 
			</td>
			<td colspan="5" class="aleft">
				<div id="jgjg1" style="text-align: left; display: none;">
					<input type="radio" name="mgrType" value="1" onclick="clickMgrType(this.value,'1')" @if($jgxx->mgrType==1) checked @endif>
					国务院国资委监管
							
					<input type="radio" name="mgrType" value="2" onclick="clickMgrType(this.value,'1')" @if($jgxx->mgrType==2) checked @endif>
					财政部监管
							
					<input type="radio" name="mgrType" value="3" onclick="clickMgrType(this.value,'1')" @if($jgxx->mgrType==3) checked @endif>
					其他中央部委监管
				</div>

				<table id="jgjg2" cellspacing="0" cellpadding="0">
					<tbody><tr>
					<td>
					<input type="radio" name="mgrType" value="4" onclick="clickMgrType(this.value,'2')" @if($jgxx->mgrType==4) checked @endif>
					省级国资委监管		
					</td>
					<td>
					<input type="radio" name="mgrType" value="5" onclick="clickMgrType(this.value,'2')" @if($jgxx->mgrType==5) checked @endif>
					省级财政部门监管			
					</td>
					<td>		
					<input type="radio" name="mgrType" value="6" onclick="clickMgrType(this.value,'2')" @if($jgxx->mgrType==6) checked @endif>
					省级其他部门监管		
					</td></tr>		
					<tr><td>
					<input type="radio" name="mgrType" value="7" onclick="clickMgrType(this.value,'3')" @if($jgxx->mgrType==7) checked @endif>
					地市级国资委监管			
					</td><td>		
					<input type="radio" name="mgrType" value="8" onclick="clickMgrType(this.value,'3')" @if($jgxx->mgrType==8) checked @endif>
					地市级财政部门或金融办监管		 
					</td><td>		
					<input type="radio" name="mgrType" value="9" onclick="clickMgrType(this.value,'3')" @if($jgxx->mgrType==9) checked @endif>
					地市级其他部门监管			
					</td></tr>	
					
					<tr><td>
					<input type="radio" name="mgrType" value="10" onclick="clickMgrType(this.value,'4')" @if($jgxx->mgrType==10) checked @endif>
					区县级国资委监管
					</td><td>
					<input type="radio" name="mgrType" value="11" onclick="clickMgrType(this.value,'4')" @if($jgxx->mgrType==11) checked @endif>
					区县级财政部门或金融办监管
					</td><td>				
					<input type="radio" name="mgrType" value="12" onclick="clickMgrType(this.value,'4')" @if($jgxx->mgrType==12) checked @endif>
					区县其他部门监管
					</td></tr>
					<tr><td colspan="3" title="">
					监管机构属地
					
					<div id="jgxx_xzqh">
		                <div class="col-sm-3">
		                  <label class="sr-only" for="province">Province</label>
		                  <select class="form-control" id="mgrProvince" name="mgrProvince"></select>
		                </div>
		                <div class="col-sm-3">
		                  <label class="sr-only" for="city">City</label>
		                  <select class="form-control" id="mgrCity" name="mgrCity"></select>
		                </div>
		                <div class="col-sm-3">
		                  <label class="sr-only" for="area" >District</label>
		                  <select class="form-control" id="mgrDistrict" name="mgrDistrict"></select>
		                </div>
		            </div>

					</td></tr>
				</tbody>
			</table>

		</td>
	</tr>

			<tr id="mgrDictLink" style=""> 
				<td width="199">
				  选择国家出资企业或主管部门名称
				</td>
				<td width="220">
						<input name="mgrName" id="mgrName" type="text" size="34" value="{{$jgxx->mgrName}}">
					
				</td>
				<td width="199">
				 统一社会信用代码或组织机构代码
				</td>
				<td colspan="2">
					<input style="width:120px" name="mgrCode" id="mgrCode" type="text" value="{{$jgxx->mgrCode}}">
					
					
				</td>
			</tr>

		<tr>
			<th rowspan="7" width="67">
					产权转让<br>行为批准<br>情况
			</th>
			
			<td width="199">
				批准机构类型
			</td>
			<td colspan="5">
				<div>
	                <div class="col-sm-3">
	                  <select class="form-control" id="permitCompType" name="permitCompType"></select>
	                </div>
	            </div>
			</td>
			</tr>
			<tr>
				<td>
					批准单位名称
				</td>
				<td colspan="5">
					<input name="permitCompName" id="permitCompName" type="text" size="34" value="{{$jgxx->permitCompName}}">
				</td>
			</tr>
			<tr>
				<td>
					批准文件类型
				</td>
				<td colspan="5">
					<input name="permitFileType" type="radio" value="1" class="permitFileType" @if($jgxx->permitFileType==1) checked @endif onclick="permitFileTypeClick(this)">
									文件&nbsp;&nbsp;
					<input name="permitFileType" type="radio" value="2" class="permitFileType" @if($jgxx->permitFileType==2) checked @endif>
									董事会决议&nbsp;&nbsp;
					<input name="permitFileType" type="radio" value="3" class="permitFileType" @if($jgxx->permitFileType==3) checked @endif>
									股东会决议&nbsp;&nbsp;					
					<input name="permitFileType" type="radio" value="4" class="permitFileType" @if($jgxx->permitFileType==4) checked @endif>
									批复&nbsp;&nbsp;
					<input name="permitFileType" type="radio" value="5" class="permitFileType" @if($jgxx->permitFileType==5) checked @endif>
									总经理办公会议决议&nbsp;&nbsp;
					<input name="permitFileType" type="radio" value="6" class="permitFileType" @if($jgxx->permitFileType==6) checked @endif>
									其他
					<input id="permitFileDesc" name="permitFileDesc" value="{{$jgxx->permitFileDesc}}" type="text" size="20" disabled="">
				</td>
			</tr>
			

			<tr>
				<td width="159">
					批准文件名称/决议名称
				</td>
				<td colspan="5">
					<input id="permitFileName" name="permitFileName" type="text" size="80" value="{{$jgxx->permitFileName}}">
				</td>
			</tr>
			<tr>
				<td width="159">
					批准文号
				</td>
				<td colspan="5" class="unput">
					<input id="permitFileNo" name="permitFileNo" value="{{$jgxx->permitFileNo}}" type="text" size="24" class="easyui-validatebox validatebox-text">
				</td>
			</tr>
			<tr>
				<td width="159">
					批准日期
				</td>
				<td colspan="5">
					<div class="input-group">
			          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
			          <input id="permitDate" type="text" name="permitDate" size="15" class="form-control date" value="{{$jgxx->permitDate}}">
			        </div>
				</td>
			</tr>		
		</tbody></table>
			
		<center>
			<a href="javascript:void(0)" id="btnSaveJgxx" class="btn btn-primary btn-pass save_btn" >保存监管信息</a>
		</center>
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
        //行政区划下拉框联动
        $("#jgxx_xzqh").distpicker({
          autoSelect: false,
          province: "{{$jgxx->mgrProvince}}",
          city: "{{$jgxx->mgrCity}}",
          district: "{{$jgxx->mgrDistrict}}"
        });

      $('#btnSaveJgxx').on('click', function () {
          $("#btnSaveJgxx").attr("disabled","disabled");
          var url = "/admin/jgxx"
          if($("#supervise_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formJgxx')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#supervise_id").val()){
                $("#supervise_id").val(str_reponse.message.id);
              }
              $("#btnSaveJgxx").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
            	alert("保存成功");
              $("#btnSaveJgxx").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });

        //下拉框
        $('#permitCompType').selecter({
          	autoSelect: false,
          	type: "permitCompType",
	  		savetype: 2,
          	selectvalue: "{{$jgxx->permitCompType}}"
        });
		
		$('.permitFileType').on('click',function(){
			if(this.value=='6'){
        		$('#permitFileDesc').removeAttr('disabled');
        	}
        	else{
        		$('#permitFileDesc').attr('disabled','disabled');
        	}
		});

    });
</script>
</form>