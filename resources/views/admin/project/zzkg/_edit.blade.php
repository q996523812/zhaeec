
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

<table border="0" align="center" cellpadding="0" cellspacing="1" class="table table-bordered">
    <tbody><tr>
		<th colspan="4">项目基本情况</th>
	</tr>
		<tr>
		<th title="">项目编号</th>
		<td><input type="text" class="" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" disabled="true"></td>
		</tr>

    <tr>
      <td class=" control-label">项目推荐人</td>
      <td colspan="2">
        <input type="text" id="tjr" name="tjr" value="{{empty($project->customer_id)?'':$project->customer->name}}" class="form-control" readonly="true">
        <input type="hidden" id="customer_id" name="customer_id" value="{{$project->customer_id}}">
      </td>
      <td><a class="btn btn-primary" data-toggle="modal" data-target="#tjrModal">导  入</a></td>
    </tr>
	<tr>
		<th>项目名称<font color="red">*</font></th>
		<td colspan="4"><input type="text"  required="true" name="title" value="{{$detail->title}}" size="75"></td>
	</tr>
	
	<tr>
		<th>是否国有</th>
		<td colspan="4">
			<div id="isGzw_div"></div>
		</td>
	</tr>
	<tr>
		<th>产权隶属关系</th>
		<td colspan="5">
 			<div id="pauseText_div"></div>
		</td>
	</tr>
	<tr>
		<th>拟公开募集资金总额(万元)<font color="red">*</font></th>
		<td width="300px">
		<input type="text" id="gpjg"  size="10" value="{{$detail->gpjg}}" name="gpjg">
		至
		<input type="text" id="proPriceMax" size="10"  value="{{$detail->proPriceMax}}" name="proPriceMax">
		<input type="radio" id="lowV" name="lowV" value="1">最低不限  
		<input type="radio" name="lowV" id="bestV" value="2">最高不限
		<input type="radio" name="lowV" id="increaseV" value="3">视增资情况定
		</td>
		<th>拟公开募集资金总额说明</th>
		<td class="unput">
			<input name="planPriceDesc"  size="70" value="{{$detail->planPriceDesc}}">
		</td>
		
	</tr>
	<tr>
		<input type="hidden" name="sellPercent" id="sellPercent" value="">
		<th>拟公开募集资金对应持股比例(%)</th>
		<td width="300px">
			<input id="sellPercent1" size="10"  value="{{$detail->sellPercent1}}" name="sellPercent1">至
			 <input id="sellPercent2" size="10"  value="{{$detail->sellPercent2}}" name="sellPercent2">
			 
			 <input type="radio" id="lowV1" name="lowV1" value="1">最低不限  
			 <input type="radio" name="lowV1" id="bestV1" value="2">最高不限
			<input type="radio" name="lowV1" id="increaseV1" value="3">视增资情况定<br>
		</td>
		<th>拟公开募集资金对应持股比例说明</th>
		<td class="unput"><input name="planPercentDesc" id="planPercentDesc2" value="{{$detail->planPercentDesc}}" size="70"></td>
	</tr>
	<tr>
		<input type="hidden" name="proExt1" id="proExt1" value="">
		<th>拟公开募集资金对应股份数(股)</th>
		<td>
			<input id="sellNum1" size="10"  value="{{$detail->sellNum1}}" name="sellNum1">
			至
			<input id="sellNum2" size="10"  value="{{$detail->sellNum2}}" name="sellNum2">
		</td>
		<th>拟公开募集资金对应股份数说明</th>
		<td class="unput"><input name="proExt2" id="planPercentDesc1"  value="{{$detail->proExt2}}" size="70"></td>
	</tr>
	<tr>
		<th>拟新增注册资本(万元)</th>
		<td style="width:400px;">
			<input type="hidden" id="spare2" name="pub_spare2" value="">
			<input id="spare21" size="10"  value="{{$detail->spare21}}" name="spare21">至
			<input id="spare22" size="10"  value="{{$detail->spare22}}" name="spare22">
			<input type="radio" id="lowV2" name="lowV2" value="1">最低不限  
			<input type="radio" name="lowV2" id="bestV2" value="2">最高不限
			<input type="radio" name="lowV2" id="increaseV2" value="3">视增资情况定
		</td>
		<th>拟新增注册资本说明</th>
		<td class="unput"><input name="announceMedia" value="{{$detail->announceMedia}}" size="70"></td>
	</tr>
	<tr>
		<th>拟公开征集投资方数量(个)</th>
		<td width="300px">
			<input type="hidden" id="spare9" name="spare9" value="">
			
			<input id="spare91" size="10" required="true"  value="{{$detail->spare91}}" name="spare91">至
			<input id="spare92" size="10"  value="{{$detail->spare92}}" name="spare92">
			<input type="radio" id="lowV3" name="lowV3" value="1">最低不限  
			<input type="radio" name="lowV3" id="bestV3" value="2">最高不限
			<input type="radio" name="lowV3" id="increaseV3" value="3">视增资情况定
		</td>
		<th>拟公开征集投资方数量说明</th>
		<td class="unput">
		<input type="text"  name="planBuyersDesc" value="{{$detail->planBuyersDesc}}" size="70"></td>
	
	</tr>
	<tr>
		<th>募集资金用途</th>
		<td colspan="4">
			<textarea name="pub_moneyFor" id="moneyFor"  required="true" cols="75" rows="6" >{{$detail->pub_moneyFor}}</textarea>
			
		</td>
	</tr>
	
	<tr>
		<th>原股东是否有投资意向</th>
		<td>
	         <div id="pub_holderIn_div"></div>
		</td>
		<th>企业管理层或员工是否有投资意向</th>
		<td>
	         <div id="pub_buyerPaperFlag_div"></div>
		</td>
  	</tr>
	  
	<tr>
		<th>专业机构推荐意见</th>
		<td class="unput" colspan="4">
			<textarea cols="75" name="pub_valueDesc" rows="6" >{{$detail->pub_valueDesc}}</textarea>
		
		</td>
	</tr>

	
</tbody></table>

<table id="table3" border="0" align="center" cellpadding="0" cellspacing="1" class="table table-bordered">
<tbody><tr>
		<th>是否允许联合投资</th>
		<td colspan="2">
			<div id="unitTransferee_div"></div>
        </td>
	</tr>
	<tr>
		<th rowspan="9" style="width:180px;">保证金设定</th>
	</tr>
	<tr>
		<td style="width:189px;">保证金<font color="red">*</font></td>
		<td>
			<input type="radio" value="1" name="pubBailCtrl" @if($detail->pubBailCtrl == 1) checked="checked" @endif>
			按固定金额收取（万元）
			<input type="radio" value="2" name="pubBailCtrl" @if($detail->pubBailCtrl == 2) checked="checked" @endif>
			按投资方拟投资金额比例收取(%)
			<br>
			<input type="text" id="pubBail" name="pubBail" class="easyui-numberbox" value="{{$detail->pubBail}}">
		</td>
	</tr>
	<tr>
		<td style="width:189px;">保证金交纳开始时间</td>
		<td>
			<input type="radio" name="bailStartFlag" value="1" checked="checked" onclick="StartFlag(this.value);">交易所登记通过后即可交纳
			<input type="radio" name="bailStartFlag" value="2" onclick="StartFlag(this.value);">融资方审核通过后可交纳
		</td>
	</tr>
	<tr>
		<td>保证金交纳期限</td>
	  	<td>
	  		<span id="qx">
	  			<input type="radio" name="pubBailType" value="1">
				挂牌截止日<span class="workEndTime">17:00</span>前(以银行到账时间为准)<br>
			</span>
			<input type="radio" name="pubBailType" value="2">
				交纳开始后，<input name="pubBailDays" class="easyui-numberbox" size="2" maxlength="2" value="{{$detail->pubBailDays}}"> 个工作日<span class="workEndTime">17:00</span>前有效(以银行到账时间为准)<br>
			</td>
	  	</tr>
<!--
	  	<tr class="transway1">
			<td>保证金交纳方式</td>
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
			<td>保证金处置方式</td>
			<td>
				<textarea class="easyui-validatebox" required="true" name="pubBailMemo" id="pubBailMemo" cols="70" rows="5">{{$detail->pubBailMemo}}</textarea><br>
			</td>
		</tr>
		<tr>
			<td>保证内容</td>
			<td>
			<textarea class="easyui-validatebox" rows="5" cols="70" name="valueDesc" id="valueDesc">{{$detail->valueDesc}}</textarea>
			</td> 
		</tr>

	</tbody></table>
<br>

<table id="table3" border="0" align="center" cellpadding="0" cellspacing="1" class="table table-bordered">
	<tbody>
		<tr>
			<th rowspan="2" style="width:180px;" id="tradeTerms">交易条件</th>
		</tr>
		<tr>
		    <td>价款支付方式</td>
		    <td>
			    <div id="pubPayMode_div"></div>
			    <p>支付要求:</p>
			    <div>
			    	<textarea id="payPeriodInfo" name="payPeriodInfo" cols="60" rows="3" class="easyui-validatebox" validtype="length[0,300]" maxlength="300" missingmessage="最多可输入300字" invalidmessage="最多可输入300字">{{$detail->payPeriodInfo}}</textarea>
			    </div>
		    </td>
		</tr>
		<!--
		<tr>
		    <th>是否披露意向方应提交的附件材料</th>
		    <td colspan="2">
				<div id="pub16_div"></div>
		    </td>
		</tr>
	-->
		<tr><th style="width:180px" rowspan="5">挂牌条件</th></tr>
		<tr>
			<td>挂牌公告期<font color="red">*</font></td>
			<td>
				<input name="pubDays" id="pubDays" class="easyui-numberbox" value="{{$detail->pubDays}}">
			</td>
		</tr>
		<tr>
			<td>未征集到意向投资方<br>
				<textarea name="pub10" style="width:180px;height:40px;font-size:12px">{{$detail->pub10}}</textarea>
			</td>
			<td>
				<div>
					<input type="radio" name="pubDelayFlag" value="1" checked="checked" onclick="$('.pubDelayFlagTr').hide();">信息发布终结<br>
					<input type="radio" name="pubDelayFlag" value="2" onclick="$('.pubDelayFlagTr').show();">自动延长信息发布<br>
				</div>
				<div class="pubDelayFlagTr" style="display: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;以<input type="text" id="delayPeroid" name="delayPeroid" size="5" onkeyup="$(this).changeNotFormatebleWord(0);$(this).notZero();">个工作日为周期进行延牌，直至征集到符合条件的意向投资方：<br>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="delayFlag" value="1">无限期延牌；<br>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="delayFlag" value="2" checked="checked">最多延长<input type="text" id="delayMax" name="delayMax" size="5" value="{{$detail->delayMax}}">个周期；
				</div>
			</td>
		</tr>
		<tr>
			<td>征集到意向投资方<br><textarea name="pub7" style="width:180px;height:40px;font-size:12px">{{$detail->pub7}}</textarea></td>
			<td>
				<div>
					<input type="radio" name="pub1" value="1">信息发布终结，说明：<input type="text" name="pub2" size="70" value="{{$detail->pub2}}"><br>
					<input type="radio" name="pub1" value="2" checked="checked">延长信息发布，说明：<input type="text" name="pub3" size="70" value="{{$detail->pub3}}"><br>
					
				</div>
			</td>
		</tr>
		<tr>
			<td>征集到意向投资方<br>
				<textarea name="pub8" style="width:180px;height:40px;font-size:12px">{{$detail->pub8}}</textarea>
			</td>
			<td>
				信息发布终结，说明：<input type="text" name="pub9" size="70" value="{{$detail->pub9}}"><br>
			</td>
		</tr>
		<tr>
			<th rowspan="3">遴选方式</th>
			<td>遴选方式</td>
			<td>
				<input name="pubDealWay" type="checkbox" value="A20001001"> 竞价
				<input name="pubDealWay" type="checkbox" value="A20001002"> 综合评议
				<input name="pubDealWay" type="checkbox" value="A20001003"> 竞争性谈判
				<input name="pubDealWay" type="checkbox" value="A20001004"> 其他
				<input name="dealWayDesc" id="dealWayDesc" type="text" value="{{$detail->dealWayDesc}}"> 
			</td>
		</tr>
		<tr>
			<td>遴选方案</td>
			<td class="unput">
				<div style="width:60%;"><textarea class="easyui-validatebox" name="pubDesc" id="pubDesc" cols="70" rows="5">{{$detail->pubDesc}}</textarea>
				</div>
			</td>
		</tr>
		
		<tr>
			<td>是否允许网上报名</td>
			<td>
				<div id="pub0_div"></div>
	        </td>
		</tr>
		<tr><th>是否披露意向方应提交的附件材料</th>
	    <td colspan="2">
			<div id="pub16_div"></div>
	    </td>
		</tr><tr>
			<th style="width:180px;">对增资有重大影响的信息</th>
			<td colspan="2" class="unput">
				<div style="width:60%;">
					<textarea name="important" class="easyui-validatebox" id="important" cols="70" rows="10">{{$detail->important}}</textarea>
				</div>
				<div class="zhushi">
					<p>注：<br>&nbsp;&nbsp;&nbsp;&nbsp;1.审计报告、评估报告、法律意见书相关披露事项；<br> &nbsp;&nbsp;&nbsp;&nbsp;2.增资方案中的重大事项；<br>&nbsp;&nbsp;&nbsp;&nbsp;3.融资方认为有必要披露的相关事项；<br>&nbsp;&nbsp;&nbsp;&nbsp;4.增资后企业治理结构、期间损益安排、募集资金超出注册资本金额的安排等。</p>
				</div>
			</td>
		</tr>
        <tr class="transway1">
			<th style="width:180px;">投资方资格条件</th>
			<td colspan="2">
				<div style="width:60%;"><textarea id="buyConditions" class="easyui-validatebox" name="buyConditions" cols="70" rows="10" required="required">{{$detail->buyConditions}}</textarea></div>
				<div class="zhushi">
					<p>注：<br>投资方资格条件可以包括主体资格、商业信誉、经营情况、财务状况、管理能力、资产规模、业务资源、竞争优势等，但不得具有明确指向性或者违反公平竞争的内容。</p>
				</div>
			</td>
		</tr>
		<tr>
			<th style="width:180px;">增资方案主要内容</th>
			<td colspan="2">
			<div style="width:60%;">
			<textarea class="easyui-validatebox" required="required" rows="10" cols="70" name="addMoneyPlan" id="addMoneyPlan">{{$detail->addMoneyPlan}}</textarea></div>
			<br>
			</td> 
		</tr>
		<tr class="transway1">
			<th style="width:180px;">增资条件</th>
			<td colspan="2" class="unput">
				<div style="width:60%;"><textarea id="sellConditions" class="ke-container" name="sellConditions" cols="70" rows="10">{{$detail->sellConditions}}</textarea></div>
				<div class="zhushi">
					<p>注：<br>包括但不限于增资方案中的条件<br>1.募集资金支付要求；2.因增资涉及的职工安置要求；
									<br>3.因增资涉及的债权债务处置要求；4.融资方存续发展方面的要求；
									<br>5.其他:如终止条件、尽职调查要求、签订合同的要求等
					</p>
					<br>
				</div>
			</td>
		</tr>
		<tr>
			<th style="width:180px;">交易达成条件</th>
			<td colspan="2">
				<div style="width:60%;">
				<textarea class="easyui-validatebox" required="true" rows="10" cols="70" name="dealConditions" id="dealConditions">{{$detail->dealConditions}}</textarea></div>
				<div class="zhushi">
					<p>注：<br>对最低成交条件、终结条件如新增股东个数、募集金额等方面的要求进行说明。</p>
				</div>
			</td> 
		</tr>
		<tr>
			<th style="width:180px;">其他披露事项</th>
			<td colspan="2">
			<div style="width:60%;">
			<textarea class="easyui-validatebox" rows="10" cols="70" name="spare4" id="spare4">{{$detail->dealConditions}}</textarea></div>
			</td> 
		</tr>
		<tr>
			<th style="width:180px;">增资后（拟）股权结构描述</th>
			<td colspan="2">
				<input type="text" name="pub15" class="easyui-validatebox" size="50" value="{{$detail->pub15}}">
			</td>
		</tr>
    </tbody></table>
<center><a id="btnSaveData" class="btn btn-primary btn-pass">保存信息</a></center>

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
    	$(function () {
		//下拉框
	        $('#proType').selecter({
	          autoSelect: false,
	          type: "proType",
		  		savetype: 2,
	          selectvalue: "{{$detail->proType}}"
	        });



	        //单选
	        $('#isGzw_div').radio({
	          autoSelect: false,
	          type: "sf",
	          tabname: "isGzw",
	          defaultvalue: "{{$detail->isGzw}}"
	        });

	        $('#pauseText_div').radio({
	          autoSelect: false,
	          type: "pauseText",
	          tabname: "pauseText",
	          defaultvalue: "{{$detail->pauseText}}"
	        });
	        $('#pub_holderIn_div').radio({
	          autoSelect: false,
	          type: "sf",
	          tabname: "pub_holderIn",
	          defaultvalue: "{{$detail->pub_holderIn}}"
	        });
	        $('#pub_buyerPaperFlag_div').radio({
	          autoSelect: false,
	          type: "sf",
	          tabname: "pub_buyerPaperFlag",
	          defaultvalue: "{{$detail->pub_buyerPaperFlag}}"
	        });
	        $('#unitTransferee_div').radio({
	          autoSelect: false,
	          type: "sf",
	          tabname: "unitTransferee",
	          defaultvalue: "{{$detail->unitTransferee}}"
	        });
	        $('#pubPayMode_div').radio({
	          autoSelect: false,
	          type: "pubPayMode",
	          tabname: "pubPayMode",
	          defaultvalue: "{{$detail->pubPayMode}}"
	        });
	        $('#pub16_div').radio({
	          autoSelect: false,
	          type: "sf",
	          tabname: "pub16",
	          defaultvalue: "{{$detail->pub16}}"
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
    	});
    </script>
</form>