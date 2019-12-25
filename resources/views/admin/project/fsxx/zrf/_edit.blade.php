<form method="post" id="formZrf">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$bdqy->project_id}}">
			<input type="hidden" name="sellerInfo_id" id="sellerInfo_id" value="{{$zrf->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table cellpadding="0" cellspacing="1" class="table table-bordered">
<tbody><tr>
	<th width="67">基本情况</th>
	<td>
		<table cellpadding="0" cellspacing="1" class="table table-bordered">
			<tbody><tr id="sellerTypeTr" style="display: none;">
				<td>转让方类型<font color="red">*</font></td>	
				<td>
					<input name="sellerType" type="radio" value="A11001" onclick="clickF()" checked="checked">法人或其他组织
					<input name="sellerType" type="radio" value="A11002" onclick="clickZ()">自然人
				</td>
			</tr>
			<tr>
				<td width="170">转让方名称<font color="red">*</font></td>	
				<td><input name="sellerName" size="50" class="easyui-validatebox validatebox-text" required="true" validtype="length[0,100]" maxlength="100" value="{{$zrf->sellerName}}"></td>
			</tr>
			
			<tr class="unionTr" style="">
				<td>是否联合转让<font color="red">*</font></td>	
				<td>
					<input type="radio" name="unionFlag" value="1" readonly="readonly">是 &nbsp;&nbsp;
					<input type="radio" name="unionFlag" value="2" checked="" readonly="readonly">否 
					&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="unions" onclick="addAseller()" style="display:none;">增加一个联合转让方</a>
					<a class="unions" onclick="sellerListEdit()" style="display:none;">查看联合转让方</a>
					<div class="unions" id="sellerListBox" style="display: none;"></div>
				</td>
			</tr>
			<tr>
				<td>所在地区<font color="red" class="yupilu">*</font></td>
				<td>
			<div id="seller_xzqh">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <select class="form-control" id="sellerProvince" name="sellerProvince"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <select class="form-control" id="sellerCity" name="sellerCity"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="area" >District</label>
                  <select class="form-control" id="sellerCounty" name="sellerCounty"></select>
                </div>
            </div>
					
				</td>
			</tr>
		</tbody></table>
		
		<table id="farenTable" cellpadding="0" cellspacing="1" class="table table-bordered">
		   <tbody><tr id="sellerIsGz" style="display:none;">
				<td>是否国资</td>	
				<td>
					<input name="sellerIsGz" type="radio" value="T" checked="checked"> 是 
					<input name="sellerIsGz" type="radio" value="F"> 否
				</td>
			</tr>
			<tr>
				<td width="170">注册地（地址）</td>
				<td class="unput">
					<input name="sellerAddress" type="text" size="50" class="easyui-validatebox validatebox-text" validtype="length[0,100]" value="{{$zrf->sellerAddress}}">
				</td>
			</tr>
			<tr>
				<td>注册资本（万元）</td>
				<td>
					<div>
		                <div class="col-sm-3">
		                  <input name="sellerFunding" type="text" value="{{$zrf->sellerFunding}}">
		                </div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="moneyType" name="moneyType"></select>
		                </div>
		            </div>
				</td>
			</tr>
			<tr>
				<td>企业类型<font color="red" class="yupilu">*</font></td>
				<td>
					<div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="sellerUniGslx" name="sellerUniGslx"></select>
		                </div>
		            </div>
				</td>
			</tr>
			<tr>
				<td>经济类型<font color="red">*</font></td>
				<td>
					<div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="sellerUniJjlx" name="sellerUniJjlx"></select>
		                </div>
		            </div>
				</td>
			</tr>
			<tr>
				<td>法定代表人</td>
				<td class="unput">
					<input name="sellerBoss" type="text" size="24" class="easyui-validatebox validatebox-text" validtype="length[0,16]" value="{{$zrf->sellerBoss}}">
				</td>
			</tr>
			<tr>
				<td>所属行业<font color="red" class="yupilu">*</font></td>
				<td>
					<div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="sellerIndustry1" name="sellerIndustry1"></select>
		                </div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="sellerIndustry2" name="sellerIndustry2"></select>
		                </div>
		            </div>
				</td>
			</tr>
			<tr>
				<td><font color="red">金融业分类（财政部监测）</font></td>
				<td colspan="3">
					<div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="seller0One" name="seller0One"></select>
		                </div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="seller0Two" name="seller0Two"></select>
		                </div>
		            </div>
		            &nbsp;&nbsp;<font color="red">当所属行业为金融业时必须选择金融业分类（财政部监测）</font>
				</td>
			</tr>
			<tr>
				<td>经营规模<font color="red" class="yupilu">*</font></td>
				<td>
					<div>
		                <div class="col-sm-3">
		                  <select class="form-control" id="sellerScale" name="sellerScale"></select>
		                </div>
		            </div>
				</td>
			</tr>
		<!-- 	<tr>
				<td>批准单位名称<font color="red">*</font></td>
				<td>
					<input name="permitCompName"  type="text" size="20" maxlength="20" class="easyui-validatebox"  required="true"/>
				</td>
			</tr> -->
			<tr>
				<td>统一社会信用代码或组织机构代码<font color="red">*</font></td>
				<td>
					<input name="sellerZcode" required="true" id="sellerZcode" type="text" size="20" maxlength="20" class="easyui-validatebox validatebox-text" value="{{$zrf->sellerZcode}}">
					（请填大于等于9位小于等于30位组织机构代码社会信用代码）
				</td>
			</tr>
			<tr>
	    		<td>内部决策情况</td>
	    		<td>
	    			<div id="innerAudit_div"></div>
					<input id="innerAuditDesc" name="innerAuditDesc" type="text" size="30" value="{{$zrf->innerAuditDesc}}">
				</td>
			</tr>
		</tbody></table>
		<table id="ziranrenTable" cellpadding="0" cellspacing="1" class="info" style="display: none;">
			<tbody><tr>
				<td width="170">证件类型<font color="red">*</font></td>
				<td>
					<input type="text" id="certificateName" class="easyui-combobox combobox-f combo-f" size="25" comboname="certificateName" style="display: none;"><span class="combo" style="width: 176px; height: 20px;"><input type="text" class="combo-text validatebox-text" autocomplete="off" readonly="readonly" style="width: 154px; height: 20px; line-height: 20px;"><span><span class="combo-arrow" style="height: 20px;"></span></span><input type="hidden" class="combo-value" name="certificateName" value=""></span>
				</td>
			</tr>
			<tr>
				<td>证件号码<font color="red">*</font></td>
				<td>
					<input type="text" name="certificateNo" class="easyui-validatebox validatebox-text" validtype="cardRex" size="24" required="true" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>工作单位</td>
				<td class="unput">
					<input type="text" name="company" size="50" class="easyui-validatebox validatebox-text" validtype="length[0,60]" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>职务</td>
				<td class="unput">
					<input type="text" name="position" size="24" class="easyui-validatebox validatebox-text" validtype="length[0,60]" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>个人资产申报</td>
				<td class="unput">
					<textarea name="assetApplyDesc" cols="50" class="easyui-validatebox validatebox-text" rows="3" validtype="length[0,300]"></textarea>
				</td>
			</tr>
		</tbody></table>
		
		<table cellpadding="0" cellspacing="1" class="table table-bordered">
			<tbody><tr>
				<td width="170">转让方持有产（股）权比例<font color="red">*</font></td>
				<td>
					<input size="4" precision="4" class="easyui-numberbox numberbox-f validatebox-text" value="{{$zrf->holdPercent}}" name="holdPercent">%
					<font color="red">(不能超过100%)</font>
				</td>
			</tr>
			<tr>
				<td width="170">转让方持有产（股）份数量</td>
				<td>
					<input size="4" class="easyui-numberbox numberbox-f validatebox-text" value="{{$zrf->sharesHave}}" name="sharesHave">
					<font color="red">(标的企业为股份有限公司，转让方持有股份数量不能为空)</font>
				</td>
			</tr>
			<tr>
				<td>本次拟转让产（股）权比例<font color="red">*</font></td>
				<td>
					<input size="4" precision="4" class="easyui-numberbox numberbox-f validatebox-text" value="{{$zrf->sellPercent}}" name="sellPercent">%
					<font color="red">(不能超过100%)</font>
				</td>
			</tr>
			<tr>
				<td>本次拟转让产（股）份数量</td>
				<td>
					<input size="4" class="easyui-numberbox numberbox-f validatebox-text" value="{{$zrf->sellPercent}}" name="sharesWant">
					<font color="red">(标的企业为股份有限公司，转让方转让股份数量不能为空)</font>
				</td>
			</tr>
		</tbody></table>
	</td>
</tr>
<tr>
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveZrf" class="btn btn-primary btn-pass">保存评估信息</a></center></td>
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

      $('#btnSaveZrf').on('click', function () {
          $("#btnSaveZrf").attr("disabled","disabled");
          var url = "/admin/zrf"
          if($("#sellerInfo_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formZrf')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#sellerInfo_id").val()){
                $("#sellerInfo_id").val(str_reponse.message.id);
              }
              $("#btnSaveZrf").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              $("#btnSaveZrf").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });

        //行政区划下拉框联动
        $("#seller_xzqh").distpicker({
          autoSelect: false,
          province: "{{$zrf->sellerProvince}}",
          city: "{{$zrf->sellerCity}}",
          district: "{{$zrf->sellerCounty}}"
        });
        
        //下拉框
        $('#moneyType').selecter({
          autoSelect: false,
          type: "currency",
	  		savetype: 2,
          selectvalue: "{{$zrf->moneytype}}"
        });
        $('#sellerUniGslx').selecter({
          autoSelect: false,
          type: "companytype",
	  		savetype: 2,
          selectvalue: "{{$zrf->sellerUniGslx}}"
        });
        $('#sellerUniJjlx').selecter({
          autoSelect: false,
          type: "economytype",
	  		savetype: 2,
          selectvalue: "{{$zrf->sellerUniJjlx}}"
        });
        $('#sellerScale').selecter({
          autoSelect: false,
          type: "scale",
	  		savetype: 2,
          selectvalue: "{{$zrf->sellerScale}}"
        });


	//单选
        $('#innerAudit').radio({
          autoSelect: false,
          type: "innerAudit",
          tabname: "innerAudit",
          selectvalue: "{{$zrf->innerAudit}}"
        });


        //联动下拉框
        $('#sellerIndustry1').selectunion({
          type: "industry1",
          selectvalue: "{{$bdqy->sellerIndustry1}}",
          savetype: 2,
          subid: 'sellerIndustry2',
          subtype: "industry2",
          subselectvalue: "{{$bdqy->sellerIndustry2}}",
          subsavetype: 2,
          
        });
        $('#comp0One').selectunion({
          type: "finance_industry1",
          selectvalue: "{{$bdqy->comp0One}}",
          savetype: 2,
          subid: 'comp0Two',
          subtype: "finance_industry2",
          subselectvalue: "{{$bdqy->comp0Two}}",
          subsavetype: 2,
          
        });
    });
</script>
</form>