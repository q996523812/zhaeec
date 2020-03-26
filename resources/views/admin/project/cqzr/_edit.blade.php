
<form action="#" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
          <input type="hidden" name="status" value="1" class="status form-control">
          <input type="hidden" name="process" value="11" class="process form-control">
          <input type="hidden" name="user_id" value="1" class="user_id form-control">
          <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
          <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id form-control">
          <input type="hidden" name="sjly" value="业务录入" class="sjly form-control">
          <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table class="table table-bordered" cellpadding="0" cellspacing="1" >

	<tbody>
		<tr>
		<th class=" control-label" style="width:280px;" title="">项目编号</th>
		<td><input type="text" class="" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" disabled="true"></td>
		</tr>
		
        <tr>
          <th class=" control-label">项目推荐人</th>
          <td>
            <input type="text" id="tjr" name="tjr" value="{{empty($project->customer_id)?'':$project->customer->name}}" class="form-control" readonly="true">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$project->customer_id}}">
          </td>
          <td><a class="btn btn-primary" data-toggle="modal" data-target="#tjrModal">导  入</a></td>
        </tr>

		<tr>
		<th class=" control-label" style="width:280px;" title="">项目名称</th>
		<td><input type="text" class="" id="title" required="true" name="title" value="{{$detail->title}}" ></td>
		</tr>

		<tr>
			<th class=" control-label" style="width:280px;">是否让公共资源采集</th>
			<td>
				<div id="pauseTime_div"></div>
			</td>
		</tr>
			<tr>
				<th class=" control-label">转让底价（万元）</th>
				<td>
					<input type="text" required="true" id="gpjg" name="gpjg" class="money" value="{{$detail->gpjg}}">&nbsp;&nbsp;
					<span id="proPrice_zh" style="color:red;font-size:16px;"></span>
					</td>
			</tr>
		<tr>
			<th class=" control-label">债权金额（万元）</th>
			<td>
			
				<input type="text" class="easyui-validatebox validatebox-text" id="bidPrice" name="bidPrice" class="money" value="{{$detail->bidPrice}}">&nbsp;&nbsp;
				<span id="bidPrice_zh" style="color:red;font-size:16px;"></span>
				&nbsp;&nbsp;&nbsp;<span style="color:red;">转让底价中如果包含债权金额（即股权、债权捆绑转让），此项不能为空。</span>
			</td>
			
		</tr>
	<tr>
		<th class=" control-label">拟转让比例（总）</th>
		<td colspan="2">
			<input id="sellPercent" type="text" name="sellPercent" class="number" value="{{$detail->sellPercent}}" >%
		</td>
	</tr>
	<tr>
		<th class=" control-label">拟转让股份数（总）</th>
		<td colspan="2">
			<input id="proExt1" type="text" name="proExt1" class="number" value="{{$detail->proExt1}}">
		</td>
	</tr>
	
	<tr>
		<th class=" control-label">是否导致转让标的企业的实际控制权发生转移</th>
		<td colspan="2">
			<div id="ifControlTrans_div"></div>
		</td>
	</tr>

	<tr>
		<th class=" control-label">产权隶属关系</th>
		<td colspan="2">
			<div id="pauseText_div"></div>
		</td>
	</tr>
	
	<tr>
		<th class=" control-label">合作机构信息<br>可输入联系人、联系方式、单位名称</th>
		<td>
			<textarea cols="90" name="spare4" rows="6" >{{$detail->spare4}}</textarea>
		</td>
	</tr>
	<tr>
		<th class=" control-label">项目概述</th>
		<td>
			<textarea cols="90" name="proDesc" rows="6" >{{$detail->proDesc}}</textarea>
			 <br>
		</td>
	</tr>


	<tr>
		<th colspan="2">挂牌信息</th>
	</tr>
	<tr>
		<th style="width:250px;">
				挂牌公告期<span id="gpPrio">
		</span></th>
		<td>
			<input name="pubDays" value="{{$detail->pubDays}}" class="number" > 个工作日
		</td>
	</tr>
   	<tr>
		<th>挂牌期满后，如未征集到符合条件的意向受让方是否自动延牌</th>
		<td>
			<div id="pubDelayFlag_div"></div>
        </td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>延牌条件</th>
		<td>
			少于等于<input name="delayBuyerSize" class="number" size="2" maxlength="2" value="{{$detail->delayBuyerSize}}"> 个意向受让方
		</td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>最长延长周期数</th>
		<td>
			<input name="delayMax" class="number" maxlength="2" value="{{$detail->delayMax}}"> 个
		</td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>延牌周期（工作日，至少5个）</th>
		<td>
			<input name="delayPeroid" class="number" maxlength="2" value="{{$detail->delayPeroid}}"> 个工作日
		</td>
	</tr>

	<tr class="pubdealway" style="">
		<th>征集到两个以上受让方采用的交易方式</th>
		<td>
			<div id="pubDealWay_div"></div>
		    <span id="dealWayDescSpan" style="display:none">
				<input type="text" name="dealWayDesc" id="dealWayDesc" value="{{$detail->dealWayDesc}}" size="30">
			</span>
		</td>
	</tr>
	<!--
	<tr id="ifBiddyn_tr">
		<th>是否采用动态报价</th>
		<td>
			<div id="ifBiddyn_div"></div>
		</td>
	</tr>
-->
	<tr id="bidmodeTr" style="">
		<th>报价方式</th>
		<td>
			<div id="bidmode_div"></div>
		</td>
	</tr>
		<tr>
		<th>权重报价或招投标实施方案主要内容</th>
		<td class="unput">
			<textarea name="pubDesc" cols="75" rows="10" class="easyui-validatebox validatebox-text" validtype="length[0,300]" maxlength="300" missingmessage="最多可输入300字" invalidmessage="最多可输入300字" title="最多可输入300字">{{$detail->pubDesc}}</textarea>
		</td>
	</tr>
   	<tr>
		<th colspan="2">披露信息</th>
	</tr>
	
	<tr><th>企业管理层是否参与受让</th>
		<td>
			<div id="holderIn_div"></div>
		</td>
	</tr>
	<tr>
		<th>标的企业原股东是否放弃优先受让权</th>
		<td>
			<div id="allowEndPrio_div"></div>
		</td>
	</tr>

	<tr>
   		<th>披露方式</th>
   		<td>
   			<div id="announceWay_div"></div>
   		</td>
   	</tr>
   	<tr>
   		<th>披露媒体</th>
   		<td class="unput">
   			<input type="text" name="announceMedia" value="{{$detail->announceMedia}}">
   		</td>
   	</tr>
	<tr>
		<th>是否允许联合受让</th>
		<td>
			<div id="unitTransferee_div"></div>
        </td>
	</tr>
	<tr>
		<th>是否允许网上报名</th>
		<td>
			<div id="pub0_div"></div>
        </td>
	</tr>
		<tr>
			<th colspan="2">保证金交纳规则</th>
		</tr>
	  	<tr>
		<th style="width:250px;">保证金金额（万元）</th>
		<td><input type="text" id="pubBail" name="pubBail" class="money" required="true" value="{{$detail->pubBail}}">
		<b class="bigPrice">万元</b> <span id="pubBail_zh" class="bigPrice"></span>
		</td>
	</tr>
		<tr>
			<th style="width:250px;">保证金交纳时间</th>
			<td>
				<input type="radio" name="bailStartFlag" value="1" @if($detail->bailStartFlag ==1) checked @endif>
					交易机构受让登记后交纳保证金<br>
				<input type="radio" name="bailStartFlag" value="2" @if($detail->bailStartFlag ==2) checked @endif>
					经资格确认后交纳保证金<br>
				<font color="red">建议交易方式为动态报价时选择[交易机构受让登记后交纳]或[交易机构资格确认后交纳]，其他交易方式选择[经资格确认后交纳保证金]。</font>	
			</td>
	  	</tr>
	  	<tr>
			<th style="width:250px;">保证金交纳截止时间要求</th>
			<td>
			<input type="radio" name="pubBailType" value="1" @if($detail->pubBailType ==1) checked @endif>
					挂牌截止日<span class="workEndTime">17:00</span>前(以银行到账时间为准)<br>
				<input type="radio" name="pubBailType" value="2" @if($detail->pubBailType ==2) checked @endif>
					交纳开始后，<input class="easyui-numberbox numberbox-f validatebox-text" size="2" maxlength="2" numberboxname="pubBailDays" name="pubBailDays" value="{{$detail->pubBailDays}}"> 个工作日<span class="workEndTime">17:00</span>前有效(以银行到账时间为准)<br>
			</td>
	  	</tr>
<!--
	  	<tr>
			<th>保证金交纳方式</th>
			<td>
				<input type="checkbox" style="display:none" id="pubBailMethod1" name="pubBailMethod" value="0"><span style="display:none" id="pubBailMethod_text">电子钱包支付&nbsp;&nbsp;</span>
				<input type="checkbox" id="pubBailMethod2" name="pubBailMethod" value="2" onclick="checkClick()">银行转账&nbsp;&nbsp;
				<input type="checkbox" id="pubBailMethod4" name="pubBailMethod" value="4">其它&nbsp;&nbsp;
			</td>
	  	</tr>
-->

	  	<tr>
	  		<th class="bailOther" style="width:250px;">保证金交纳账号</th>
	  		<td>
	  			<table class="info" cellspacing="1" cellpadding="0" id="list-edit_table">
					<tbody>
						<tr>
							<th>账户名称</th>
							<th>开户行</th>
							<th>银行账号</th>
						</tr>
						<tr>
							<td><input type="text" name="bail_account_name" value="{{$detail->bail_account_name}}"></td>
							<td><input type="text" name="bail_account_bank" value="{{$detail->bail_account_bank}}"></td>
							<td><input type="text" name="bail_account_code" value="{{$detail->bail_account_code}}"></td>
						</tr>
					</tbody>
				</table>
	  		</td>
    	</tr>

	<tr>
		<th colspan="2">交易条件</th>
	</tr>

  	<tr>
		<th style="width:250px;">受让方资格条件</th>
		<td class="unput">
			<textarea name="buyConditions" rows="10" cols="75">{{$detail->buyConditions}}</textarea>
		</td>
	</tr>

  	<tr>
	    <th>价款支付方式</th>
	    <td>
	    	<div id="pubPayMode_div"></div>
	    <br>
	    <div style="float:left">
	    	<span style="width:90px; height:75px; line-height:75px; display:inline-block;float:left;">价款支付要求</span>
	       <textarea id="payPeriodInfo" name="payPeriodInfo" cols="60" rows="5">{{$detail->payPeriodInfo}}</textarea>
	    </div>
	    </td>
	</tr>
	<tr>
	    <th>是否披露意向方应提交的附件材料</th>
	    <td>
	    	<div id="pub16_div"></div>
	    </td>
	</tr>
	<tr>
		<th>重大事项及其他披露内容</th>
		<td class="unput">
			<textarea name="important" cols="75" rows="10" >{{$detail->important}}</textarea>
			
		</td>
	</tr>
	<tr>
		<th>与转让相关的其他条件</th>
		<td class="unput">
			<textarea name="sellConditions" id="sellConditions" cols="75" rows="10">{{$detail->sellConditions}}</textarea>
			
		</td>
	</tr>
	<tr>
	<th>保证内容</th>
		<td class="unput">
			<textarea name="valueDesc" id="valueDesc" cols="75" rows="10">{{$detail->valueDesc}}</textarea>
		</td>
	</tr>
	<tr>
		<th>处置方法</th>
		<td class="unput">
			<textarea name="pubBailMemo" id="pubBailMemo" cols="75" rows="10">{{$detail->pubBailMemo}}</textarea>
		</td>
	</tr>
	</tbody></table>


  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      <button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
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
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$detail->wtf_province}}",
          city: "{{$detail->wtf_city}}",
          district: "{{$detail->wtf_area}}"
        });

        //下拉框

        //单选
        $('#pauseTime_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "pauseTime",
          defaultvalue: "{{$detail->pauseTime}}"
        });
        $('#ifControlTrans_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "ifControlTrans",
          defaultvalue: "{{$detail->ifControlTrans}}"
        });
        $('#pauseText_div').radio({
          autoSelect: false,
          type: "pauseText",
          tabname: "pauseText",
          defaultvalue: "{{$detail->pauseText}}"
        });
        
        $('#pubDelayFlag_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "pubDelayFlag",
          defaultvalue: "{{$detail->pubDelayFlag}}"
        });

		$('#ifBiddyn_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "ifBiddyn",
          defaultvalue: "{{$detail->ifBiddyn}}"
        });
		$('#pubDealWay_div').radio({
          autoSelect: false,
          type: "pubDealWay",
          tabname: "pubDealWay",
          defaultvalue: "{{$detail->pubDealWay}}"
        });
        $('#bidmode_div').radio({
          autoSelect: false,
          type: "bjms",
          tabname: "bidmode",
          defaultvalue: "{{$detail->bidmode}}"
        });
        $('#holderIn_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "holderIn",
          defaultvalue: "{{$detail->holderIn}}"
        });
        $('#allowEndPrio_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "allowEndPrio",
          defaultvalue: "{{$detail->allowEndPrio}}"
        });
        $('#unitTransferee_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "unitTransferee",
          defaultvalue: "{{$detail->unitTransferee}}"
        });
        $('#pub0_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "pub0",
          defaultvalue: "{{$detail->pub0}}"
        });
        $('#pub16_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "pub16",
          defaultvalue: "{{$detail->pub16}}"
        });

        //多选
        $('#announceWay_div').checkbox({
          autoSelect: false,
          type: "announceWay",
          defaultvalue: "{{$detail->announceWay}}"
        });
        $('#pubPayMode_div').checkbox({
          autoSelect: false,
          type: "pubPayMode",
          defaultvalue: "{{$detail->pubPayMode}}"
        });


        //页面控制
        $("#pubDelayFlag1").click(function(){
        	$('.pubDelayFlagTr').show();
        });
        $("#pubDelayFlag2").click(function(){
        	$('.pubDelayFlagTr').hide();
        });
		$("#pubDealWay1").click(function(){
			$("#dealWayDescSpan").hide();
			$("#bidmodeTr").show();
			$("#ifBiddyn_tr").show();
		});
		$("#pubDealWay2").click(function(){
			$("#dealWayDescSpan").hide();
			$("#bidmodeTr").hide();
			$("#ifBiddyn_tr").hide();
		});
		$("#pubDealWay3").click(function(){
			$("#dealWayDescSpan").hide();
			$("#bidmodeTr").hide();
			$("#ifBiddyn_tr").hide();
		});
		$("#pubDealWay4").click(function(){
			$("#dealWayDescSpan").show();
			$("#bidmodeTr").hide();
			$("#ifBiddyn_tr").hide();
		});

		$("ifBiddyn1").click(function(){
			$("#bidmodeTr").show();
		});
		$("ifBiddyn2").click(function(){
			$("#bidmodeTr").hide();
		});

    });
    </script>  
</form>