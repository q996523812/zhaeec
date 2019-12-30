<form method="post" id="formBdqy">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
			<input type="hidden" name="targetCompanyBaseInfo_id" id="targetCompanyBaseInfo_id" value="{{$bdqy->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table cellpadding="0" cellspacing="1" class="table table-bordered">
	<tbody><tr>
		<th colspan="4">标的企业基本情况</th>
	</tr>
	<tr>
	    <th style="width:260px;">标的企业名称<font color="red">*</font></th>
	    <td colspan="3"><input type="text" name="compName" size="90" value="{{$bdqy->compName}}" required="true"></td>
  	</tr>
  	<tr>
		<th>统一社会信用代码或组织机构代码<font color="red">*</font></th>
		<td colspan="3"><input id="compZcode" name="compZcode" type="text" size="35" class="easyui-validatebox validatebox-text" validtype="length[9,30]" required="true" value="{{$bdqy->compZcode}}">
		&nbsp;&nbsp;请填大于等于9位小于等于30位组织机构代码社会信用代码</td>
	</tr>
	<tr>
		<th>所属行业<font color="red">*</font></th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <select id="compIndustry1" name="compIndustry1" class="form-control compIndustry1"></select>
                </div>
                <div class="col-sm-3">
                  <select id="compIndustry2" name="compIndustry2" class="form-control compIndustry2"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
		<th><font color="red">金融业分类（财政部监测）</font></th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <select id="comp0One" name="comp0One" class="form-control comp0One"></select>
                </div>
                <div class="col-sm-3">
                  <select id="comp0Two" name="comp0Two" class="form-control comp0Two"></select>
                </div>
            </div>
&nbsp;&nbsp;<font color="red">当所属行业为金融业时必须选择金融业分类（财政部监测）</font>
		</td>
	</tr>
	<tr>
		<th>成立时间<font color="red">*</font></th>
		<td colspan="3">
			<div class="input-group">
	          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
	          <input type="text" id="compTime" name="compTime" value="{{$bdqy->compTime}}" class="form-control date" placeholder="输入 成立时间">
	        </div>
		</td>
	</tr>
	<tr>
		<th>所在地区<font color="red">*</font></th>
		<td colspan="3">
			<div id="distpicker11">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <select class="form-control" id="compProvince" name="compProvince"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <select class="form-control" id="compCity" name="compCity"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="area" >District</label>
                  <select class="form-control" id="compCounty" name="compCounty"></select>
                </div>
            </div>

		</td>
	</tr>
	<tr>
		<th>
			注册地（地址）
		</th>
		<td colspan="3" class="unput">
			<input name="compAddress" type="text" size="50" value="{{$bdqy->compAddress}}">
		</td>
	</tr>
	
	<tr>
		<th>企业类型<font color="red">*</font></th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <select id="compUniGslx" name="compUniGslx" class="form-control compUniGslx"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
		<th>经济类型<font color="red">*</font></th>
		<td colspan="3">
			
			<div>
                <div class="col-sm-3">
                  <select id="compUniJjlx" name="compUniJjlx" class="form-control compUniJjlx"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
		<th>经营范围<font color="red">*</font></th>
		<td colspan="3"><textarea name="compScope" rows="3" cols="50" class="easyui-validatebox validatebox-text" validtype="length[1,800]" required="true">{{$bdqy->compScope}}</textarea></td>
	</tr>
	<tr>
		<th>注册资本（万元）<font color="red">*</font></th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <input type="text" name="compFunding" size="20" value="{{$bdqy->compFunding}}" class="money" required="true">
                </div>
                <div class="col-sm-3">
                  <select id="moneytype" name="moneytype" class="form-control moneytype"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
		<th>法定代表人</th>
		<td colspan="3" class="unput">
			<input name="compBoss" type="text" size="20" value="{{$bdqy->compBoss}}" >
		</td>
	</tr>
	<tr>
		<th>经营规模<font color="red">*</font></th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <select id="compScale" name="compScale" class="form-control compScale"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr class="unput">
		<th>职工人数<font color="red" id="compZrsfont">*</font></th>
		<td colspan="3">
		<input type="text" size="6" id="compZrs" name="compZrs" value="{{$bdqy->compZrs}}" class="number"> 人
		<!-- 其中：在岗<input  name="compZgrs"   type=text size=6  class="easyui-numberbox"  min="0"/>人，
		离退<input name="compLtrs" type=text size=6 class="easyui-numberbox"  min="0"/>人 -->
		</td>
	</tr>
		<tr>
	    <th style="width:180px;">内部决策情况<font color="red" class="yupilu">*</font></th>
	    <td>
	    	<div id="innerAudit_div"></div>
			<input id="innerAuditDesc" name="innerAuditDesc" type="text" size="20" value="{{$bdqy->innerAuditDesc}}">
		</td>
	</tr>
	<tr>
		<th>
		是否含有国有划拨土地
		<font color="red" id="isGY" style="display: inline-block;">*</font>
		</th>
		<td colspan="3">
			<div>
                <div class="col-sm-3">
                  <select id="compTdhb" name="compTdhb" class="form-control compTdhb"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
	<th>股东数量(个)<font color="red">*</font></th>
	<td colspan="3">
	<input id="holderNum" name="holderNum" type="text" size="10" class="number" value="{{$bdqy->holderNum}}">
	</td>
	</tr>
	<tr>
	<th>股份总数</th>
	<td colspan="3">
	  <input id="spare2" type="text" size="10" name="spare2" class="number" value="{{$bdqy->spare2}}" >
	  <font color="red">股份有限公司请填写标的企业的股份总数</font>
	</td>
	</tr>
	</tbody></table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      <button type="button" id="btnSaveBdqy" class="btn btn-primary btn-pass">保存</button>
    </div>
  </div>
</div> 
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

<script>
    $(function () {

        //行政区划下拉框联动
        $("#distpicker11").distpicker({
          autoSelect: false,
          province: "{{$bdqy->compProvince}}",
          city: "{{$bdqy->compCity}}",
          district: "{{$bdqy->compCounty}}"
        });


        //下拉框
        $('#compUniGslx').selecter({
          autoSelect: false,
          type: "companytype",
	  		savetype: 2,
          selectvalue: "{{$bdqy->compUniGslx}}"
        });
        $('#compUniJjlx').selecter({
          autoSelect: false,
          type: "economytype",
	  		savetype: 2,
          selectvalue: "{{$bdqy->compUniJjlx}}"
        });
        $('#moneytype').selecter({
          autoSelect: false,
          type: "currency",
	  		savetype: 2,
          selectvalue: "{{$bdqy->moneytype}}"
        });
        $('#compScale').selecter({
          autoSelect: false,
          type: "scale",
	  		savetype: 2,
          selectvalue: "{{$bdqy->compScale}}"
        });
        $('#compTdhb').selecter({
          autoSelect: false,
          type: "sf",
	  		savetype: 2,
          selectvalue: "{{$bdqy->compTdhb}}"
        });

        //多选
        $('#innerAudit_div').checkbox({
          autoSelect: false,
          type: "innerAudit",
          defaultvalue: "{{$bdqy->innerAudit}}"
        });

        //联动下拉框
        $('#compIndustry1').selectunion({
          type: "industry1",
          selectvalue: "{{$bdqy->compIndustry1}}",
          savetype: 2,
          subid: 'compIndustry2',
          subtype: "industry2",
          subselectvalue: "{{$bdqy->compIndustry2}}",
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

      $('#btnSaveBdqy').on('click', function () {
          $("button").attr("disabled","disabled");
          var url = "/admin/bdqy"
          if($("#targetCompanyBaseInfo_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formBdqy')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if(!$("#targetCompanyBaseInfo_id").val()){
                $("#targetCompanyBaseInfo_id").val(str_reponse.message.id);
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