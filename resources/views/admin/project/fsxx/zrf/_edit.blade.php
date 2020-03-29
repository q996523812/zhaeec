<!--
<form method="post" id="formZrf">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$zrf->project_id}}">
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
				<td width="170">客户名称<font color="red">*</font></td>	
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
		 	<tr>
				<td>批准单位名称<font color="red">*</font></td>
				<td>
					<input name="permitCompName"  type="text" size="20" maxlength="20" class="easyui-validatebox"  required="true"/>
				</td>
			</tr> 
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
      <td colspan="4"><center><a href="javascript:void(0)" id="btnSaveZrf" class="btn btn-primary btn-pass">保存</a></center></td>
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
          selectvalue: "{{$zrf->sellerIndustry1}}",
          savetype: 2,
          subid: 'sellerIndustry2',
          subtype: "industry2",
          subselectvalue: "{{$zrf->sellerIndustry2}}",
          subsavetype: 2,
          
        });
        $('#comp0One').selectunion({
          type: "finance_industry1",
          selectvalue: "{{$zrf->comp0One}}",
          savetype: 2,
          subid: 'comp0Two',
          subtype: "finance_industry2",
          subselectvalue: "{{$zrf->comp0Two}}",
          subsavetype: 2,
          
        });
    });
</script>
</form>
-->
<form method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formZrf">
      
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
			<input type="hidden" name="sellerInfo_id" id="sellerInfo_id" value="{{$zrf->id}}">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class=" control-label">
          	@if($projecttype === 'zczl')
          	出租方类型
          	@else
          	转让方类型
          	@endif
      	</td>
          <td>
            <select id="type" name="type" class="form-control type"></select>
          </td>
          <td colspan="2"><a class="btn btn-primary" data-toggle="modal" data-target="#customerModal">导  入</a></td>
        </tr>
        <tr>
          <td class=" control-label">
          @if($projecttype === 'zczl')
          	出租方名称
          	@else
          	转让方名称
          	@endif
      		</td>
          <td colspan="3">
            <input type="text" id="name" name="name" value="{{$zrf->name}}" class="form-control name" placeholder="输入 客户名称" >
          </td>
          
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            <input type="text" id="certificate_type" name="certificate_type" value="{{$zrf->certificate_type}}" class="form-control certificate_type" placeholder="输入 证件类型">
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            <input type="text" id="certificate_code" name="certificate_code" value="{{$zrf->certificate_code}}" class="form-control certificate_code" placeholder="输入 证件号码">
          </td>
        </tr>
        <tr>
          <td class=" control-label">所在地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <input type="text" id="province" name="province" value="{{$zrf->province}}" class="form-control" >
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <input type="text" id="city" name="city" value="{{$zrf->city}}" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="county" >District</label>
                  <input type="text" id="county" name="county" value="{{$zrf->county}}" class="form-control">
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属集团</td>
          <td colspan="3">
            <input type="text" id="ssjt" name="ssjt" value="{{$zrf->ssjt}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td>
            <select id="sfgz" name="sfgz" class="form-control"></select>
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$zrf->found_date}}" class="form-control date found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            <input type="text" id="address" name="address" value="{{$zrf->address}}" class="form-control address" placeholder="输入 注册地址">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="funding" name="funding" value="{{$zrf->funding}}" class="form-control money funding" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <input type="text" id="currency" name="currency" value="{{$zrf->currency}}" class="form-control">
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="boss" name="boss" value="{{$zrf->boss}}" class="form-control boss" placeholder="输入 法定代表人">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属行业</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="industry1" name="industry1" value="{{$zrf->industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="industry2" name="industry2" value="{{$zrf->industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">金融业分类</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry1" name="financial_industry1" value="{{$zrf->financial_industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry2" name="financial_industry2" value="{{$zrf->financial_industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">企业类型</td>
          <td>
            <input type="text" id="companytype" name="companytype" value="{{$zrf->companytype}}" class="form-control">
          </td>
          <td class=" control-label">经济类型</td>
          <td>
            <input type="text" id="economytype" name="economytype" value="{{$zrf->economytype}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营规模</td>
          <td colspan="3">
            <input type="text" id="scale" name="scale" value="{{$zrf->scale}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营范围</td>
          <td colspan="3">
            <input type="text" id="scope" name="scope" value="{{$zrf->scope}}" class="form-control scope" placeholder="输入 经营范围">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            <input type="text" id="credit_cer" name="credit_cer" value="{{$zrf->credit_cer}}" class="form-control credit_cer" placeholder="输入 主体资格证明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">内部决策情况</td>
          <td>
            <input type="text" id="inner_audit" name="inner_audit" value="{{$zrf->inner_audit}}" class="form-control">
          </td>
          <td class=" control-label">内部决策情况说明</td>
          <td>
            <input type="text" id="inner_audit_desc" name="inner_audit_desc" value="{{$zrf->inner_audit_desc}}" class="form-control inner_audit_desc" placeholder="输入 内部决策情况说明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">股东数量(个)</td>
          <td>
            <input type="text" id="Shareholder_num" name="Shareholder_num" value="{{$zrf->Shareholder_num}}" class="form-control number Shareholder_num" placeholder="输入 股东数量">
          </td>
          <td class=" control-label">股份总数</td>
          <td>
            <input type="text" id="stock_num" name="stock_num" value="{{$zrf->stock_num}}" class="form-control number stock_num" placeholder="输入 股份总数">
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            <input type="text" id="work_unit" name="work_unit" value="{{$zrf->work_unit}}" class="form-control work_unit" placeholder="输入 工作单位">
          </td>
          <td class=" control-label">职务</td>
          <td>
            <input type="text" id="work_duty" name="work_duty" value="{{$zrf->work_duty}}" class="form-control work_duty" placeholder="输入 职务">
          </td>
        </tr>
        <tr>
          <td class=" control-label">传真</td>
          <td>
            <input type="text" id="fax" name="fax" value="{{$zrf->fax}}" class="form-control fax" placeholder="输入 传真">
          </td>
          <td class=" control-label">电话</td>
          <td>
            <input type="text" id="phone" name="phone" value="{{$zrf->phone}}" class="form-control phone" placeholder="输入 电话">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮箱</td>
          <td colspan="3">
            <input type="text" id="email" name="email" value="{{$zrf->email}}" class="form-control email" placeholder="输入 邮箱">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮寄地址</td>
          <td colspan="3">
            <input type="text" id="mailing_address" name="mailing_address" value="{{$zrf->mailing_address}}" class="form-control mailing_address" placeholder="输入 邮寄地址">
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>


<div class="form-group  ">
  <div class="col-md-8">
        <div class="btn-group pull-right">
            <button type="button" id="btnSaveZrf" class="btn btn-primary btn-pass">保存</button>
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

        //行政区划下拉框联动
        $("#formZrf #distpicker1").distpicker({
          autoSelect: false,
          province: "{{$zrf->province}}",
          city: "{{$zrf->city}}",
          district: "{{$zrf->area}}"
        });

        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        $('.number').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#formZrf #sfgz').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$zrf->sfgz}}",
          savetype: 2,
        });
        $('#formZrf #registered_capital_currency').selecter({
          autoSelect: false,
          type: "currency",
          selectvalue: "{{$zrf->registered_capital_currency}}"
        });
        $('#formZrf #companytype').selecter({
          autoSelect: false,
          type: "companytype",
          selectvalue: "{{$zrf->companytype}}"
        });
        $('#formZrf #economytype').selecter({
          autoSelect: false,
          type: "economytype",
          selectvalue: "{{$zrf->economytype}}"
        });
        $('#formZrf #scale').selecter({
          autoSelect: false,
          type: "scale",
          selectvalue: "{{$zrf->scale}}"
        });

        //联动下拉框
        $('#formZrf #type').selectunion({
          type: "customertype",
          selectvalue: "{{$zrf->type}}",
          savetype: 2,
          selectchange: function(){
            if($('#type').find(':selected').data('code')==1){
              $('.company').hide();
              $('.person').show();
            }
            else{
              $('.company').show();
              $('.person').hide();
            }
          },
          subid: 'certificate_type',
          subtype: "id_type",
          subselectvalue: "{{$zrf->certificate_type}}",
          subsavetype: 1,
          
        });
        $('#industry1').selectunion({
          type: "industry1",
          selectvalue: "{{$zrf->industry1}}",
          savetype: 1,
          subid: 'industry2',
          subtype: "industry2",
          subselectvalue: "{{$zrf->industry2}}",
          subsavetype: 1,
          
        });

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
            success : function(str_reponse){
            	console.log(str_reponse);
              if(str_reponse.success == 'true'){
              	alert("保存成功");
              	if(!$("#sellerInfo_id").val()){
	                $("#sellerInfo_id").val(str_reponse.message.id);
	            }
	            $(".warning-message").html("");
              }
              else{
              	alert("保存失败");
              	$(".warning-message").html(str_reponse.message);
              }
              $("#btnSaveZrf").removeAttr("disabled");
            },
            error : function(XMLHttpRequest,err,e){
            	alert("保存失败");
              $("#btnSaveZrf").removeAttr("disabled");
              // error(XMLHttpRequest);
            }
          });
      });
		function readonly(){
			$('#formZrf input').attr('readonly','true');
			$('#formZrf select').attr('readonly','true');
		}
		readonly();
    });
    </script> 
</form>