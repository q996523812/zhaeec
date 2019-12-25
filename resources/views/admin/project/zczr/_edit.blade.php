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

<table class="table table-bordered" cellspacing="1" cellpadding="0">
	<tbody><tr>
		<th style="width:300px;">项目名称<font color="red">*</font></th>
		<td><input type="text" class="easyui-validatebox validatebox-text" required="true" name="proName" maxlength="100" value="{{$detail->proName}}" size="50"></td>
	</tr>
	<tr>
		<th style="width:300px;">转让底价(万元)<font color="red">*</font></th>
		<td>
         	<input type="text" class="easyui-validatebox validatebox-text" required="true" id="proPrice" name="proPrice" value="{{$detail->proPrice}}">&nbsp;&nbsp;
			<span id="proPrice_zh" style="color:red;font-size:16px;">(壹佰万)</span>
         </td>
	</tr>
	<tr>
		<th style="width:300px;">是否国资<font color="red">*</font></th>
		<td>
 			<div id="isGzw_div"></div>
		</td>
	</tr>
	<tr>
		<th style="width:280px;">是否让公共资源采集</th>
		<td>
			<div id="pauseTime_div"></div>
		</td>
	</tr>
	<tr>
	<th>资产类型<font color="red">*</font></th>
		<td>
			<div>
                <div class="col-sm-3">
                  <select id="proType" name="proType" class="form-control proType"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr>
		<th>标的所在地区<font color="red">*</font></th>
		<td>
			<div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <select class="form-control" id="province" name="province"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <select class="form-control" id="city" name="city"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="area" >District</label>
                  <select class="form-control" id="county" name="county"></select>
                </div>
            </div>
			
		</td>
	</tr>
	<tr>
		<th>资产来源<font color="red">*</font></th>
		<td colspan="5">
 			<div id="proSource_div"></div>
		</td>
	</tr>
	
	<tr>
		<th>产权隶属关系</th>
		<td colspan="5">
 			<div id="pauseText_div"></div>
		</td>
	</tr>
	
	<tr>
		<th style="width:300px;">合作机构信息（最大输入300字）<br>可输入联系人、联系方式、单位名称</th>
		<td class="unput">
			<textarea cols="100" name="spare4" rows="6" class="easyui-validatebox validatebox-text" validtype="length[0,300]" maxlength="300">{{$detail->spare4}}</textarea>
		</td>
	</tr>
	<tr>
		<th style="width:300px;">资产概述（最大输入1000字）<font color="red">*</font></th>
		<td>
			<textarea cols="100" name="proDesc" rows="6" class="easyui-validatebox validatebox-text" validtype="length[0,1000]" maxlength="1000" required="true" missingmessage="最多可输入1000字" invalidmessage="最多可输入1000字" title="最多可输入1000字">{{$detail->proDesc}}</textarea>
		</td>
	</tr>	

</tbody>
</table>

<table cellpadding="0" cellspacing="1" class="table table-bordered">
   	<tbody>
<!--
   		<tr>
   	
   	<th>受让审核级别<font color="red">*</font></th>
		<td>
			<input type="radio" name="buyerAuditLevel" value="0" disabled="disabled">不需要审核  
			<input type="radio" name="buyerAuditLevel" value="1" checked="checked">需要交易机构审核 
			<input type="radio" name="buyerAuditLevel" value="2">需要会同转让方审核
        </td>
   	</tr>
   -->
   	<tr>
		<th colspan="2">挂牌信息</th>
	</tr>
	<tr>
		<th class="th-m-80">
				挂牌公告期
		<font color="red">*</font></th>
		<td>
			<input name="pubDays" value="20" onkeyup="numberTypeInt(this)" class="easyui-validatebox validatebox-text" required="true" value="{{$detail->pubDays}}"> 个工作日
		</td>
	</tr>
   	<tr>
		<th>挂牌期满后，如未征集到符合条件的意向受让方是否自动延牌</th>
		<td>
			<div>
                <div class="col-sm-3">
                  <select id="pubDelayFlag" name="pubDelayFlag" class="form-control pubDelayFlag"></select>
                </div>
            </div>
        </td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>延牌条件</th>
		<td>
			少于等于<input name="delayBuyerSize" class="easyui-validatebox validatebox-text" size="2" value="{{$detail->delayBuyerSize}}" maxlength="2"> 个意向受让方
		</td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>最长延长周期数<font color="red">*</font></th>
		<td>
			<input name="delayMax" class="easyui-validatebox validatebox-text" value="{{$detail->delayMax}}" maxlength="2"> 个
		</td>
	</tr>
	<tr class="pubDelayFlagTr" style="display:none;">
		<th>延牌周期（工作日，至少5个）<font color="red">*</font></th>
		<td>
			<input name="delayPeroid" class="easyui-validatebox validatebox-text" value="{{$detail->delayPeroid}}" maxlength="2"> 个工作日
		</td>
	</tr>

	<tr class="pubdealway" style="">
		<th>征集到两个以上受让方采用的交易方式</th>
		<td>
			<div>
                <div class="col-sm-3">
                  <select id="pubDealWay" name="pubDealWay" class="form-control pubDealWay"></select>
                </div>
            </div>
			<span id="dealWayDescSpan" style="display:none">
				<input type="text" name="dealWayDesc" id="dealWayDesc" value="" size="30">
			</span>
		</td>
	</tr>
	<tr>
		<th>是否采用动态报价<font color="red">*</font></th>
		<td>
			<div>
                <div class="col-sm-3">
                  <select id="ifBiddyn" name="ifBiddyn" class="form-control ifBiddyn"></select>
                </div>
            </div>
		</td>
	</tr>
	<tr id="bidmodeTr">
		<th>报价方式<font color="red">*</font></th>
		<td>
			<div id="bidmode_div"></div>
		    &nbsp;&nbsp;&nbsp;<font color="red">只有当动态报价或者网络竞价才有此项选择</font>
		</td>
	</tr>
   	<tr>
		<th colspan="2">披露信息</th>
	</tr>
	<!-- 只有股权 20161103 by xwcui
	<tr><th>管理层是否有收购意向</th>
		<td>
		 <input type="radio" value="T" name="holderIn" />是
		 <input type="radio" value="F" name="holderIn" /> 否
		</td>
	</tr>
	 -->
	<tr>
		<th>优先权人是否放弃优先购买权<font color="red">*</font></th>
		<td>
			<div id="allowEndPrio_div"></div>
		</td>
	</tr>
	<!--
	<tr>
   		<th>披露方式<span style="color: red;">*</span></th>
   		<td>
   			<input type="checkbox" name="announceWay1"  value="A16001" />省级以上经济金融或综合报刊
   			<input type="checkbox" name="announceWay1"  value="A16002" />产权交易机构网站
   			<input type="checkbox" name="announceWay1"  value="A16003"/>金融企业网站
   			<input type="checkbox" name="announceWay1"  value="A16004"/>其他方式公告
   		</td>
   	</tr>
   	<tr>
   		<th>披露媒体</th>
   		<td class="unput">
   			<input type="text" name="announceMedia"/>
   		</td>
   	</tr>
   	-->
   	
	<tr>
		<th>是否允许联合受让<font color="red">*</font></th>
		<td>
			<div id="unitTransferee_div"></div>
        </td>
	</tr>
	
	<tr>
		<th>是否允许网上报名<font color="red">*</font></th>
		<td>
			<div id="pub0_div"></div>
        </td>
	</tr>
   	
		<tr>
			<th colspan="2">保证金交纳规则</th>
		</tr>
	  	<tr>
		<th class="th-m-80">保证金金额（万元）<font color="red">*</font></th>
		<td><input type="text" id="pubBailWan" value="{{$detail->pubBailWan}}" class="easyui-validatebox validatebox-text" required="true">
		<b class="bigPrice">万元</b> <span id="pubBail" class="bigPrice"></span>
		</td>
	</tr>
		<tr>
			<th class="th-m-80">保证金交纳时间<font color="red">*</font></th>
			<td>
				<div>
	                <div class="col-sm-3">
	                  <select id="bailStartFlag" name="bailStartFlag" class="form-control bailStartFlag"></select>
	                </div>
	            </div>
			</td>
	  	</tr>
	  	<tr>
			<th class="th-m-80">保证金交纳截止时间要求<font color="red">*</font></th>
			<td>
				<input type="radio" name="pubBailType" value="0">
					挂牌截止日<span class="workEndTime">17:00</span>前(以银行到账时间为准)<br>
				<input type="radio" name="pubBailType" value="1">
					交纳开始后，<input class="easyui-numberbox numberbox-f validatebox-text" size="2" maxlength="2" name="pubBailDays" value="{{$detail->pubBailDays}}"> 个工作日<span class="workEndTime">17:00</span>前有效(以银行到账时间为准)<br>
					<!-- 
				<input type="radio"  name="pubBailType" value="2" />在
					<input name="bailDeadTime" class="easyui-datebox" size="20" ></input><span class="workEndTime"></span>前(以银行到账时间为准)<br/> -->
					<font color="red">建议交易方式为动态报价时不选择[挂牌截止日前交纳保证金]。</font>	
			</td>
	  	</tr>
<!--
	  	<tr>
			<th>保证金交纳方式<font color="red">*</font></th>
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
							<th>银行名称</th>
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
		<th class="th-m-80">受让方资格条件</th>
		<td class="unput">
			<textarea name="buyConditions" cols="75" rows="10" class="easyui-validatebox validatebox-text" validtype="length[0,1000]" maxlength="1000" missingmessage="最多可输入1000字" invalidmessage="最多可输入1000字" title="最多可输入1000字">{{$detail->buyConditions}}</textarea>
				
				最多输入1000字
		</td>
	</tr>

  	<tr>
	    <th>价款支付方式</th>
	    <td>
			<div id="pubPayMode_div"></div>
		    <br>
		    <div style="float:left">
		    	<span style="width:80px; height:75px; line-height:75px; display:inline-block;float:left;">价款支付要求</span>
		      <textarea id="payPeriodInfo" name="payPeriodInfo" cols="60" rows="5" class="easyui-validatebox validatebox-text" validtype="length[0,300]" maxlength="300" missingmessage="最多可输入300字" invalidmessage="最多可输入300字" title="最多可输入300字">{{$detail->payPeriodInfo}}</textarea>
		    </div>
	    </td>
	</tr>
	<tr>
		<th>重大事项及其他披露内容</th>
		<td class="unput">
			<textarea name="important" cols="75" rows="10" class="easyui-validatebox validatebox-text" validtype="length[0,3000]" maxlength="3000" missingmessage="最多可输入3000字" invalidmessage="最多可输入3000字" title="最多可输入3000字">{{$detail->important}}</textarea>
		</td>
	</tr>
	<tr>
		<th>与转让相关的其他条件<span style="color: red;">*</span></th>
		<td class="unput">
			<textarea name="sellConditions" id="sellConditions" cols="75" rows="10" class="easyui-validatebox validatebox-text" validtype="length[0,4000]" maxlength="4000" missingmessage="最多可输入4000字" invalidmessage="最多可输入4000字" title="最多可输入4000字">{{$detail->sellConditions}}</textarea>
		</td>
	</tr>
	<tr>
		<th>保证内容</th>
		<td class="unput">
			<textarea name="valueDesc" id="valueDesc" cols="75" rows="10" maxlength="3000">{{$detail->valueDesc}}</textarea>最多输入3000字 
		</td>
	</tr>
	<tr>
		<th>处置方法</th>
		<td class="unput">
			<textarea name="pubBailMemo" id="pubBailMemo" cols="75" rows="10" maxlength="1000">{{$detail->pubBailMemo}}</textarea>最多输入1000字 
		</td>
	</tr>
	</tbody></table>
<br>
<center><a id="btnSaveData" class="btn btn-primary btn-pass" >保存信息</a></center>
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
        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$detail->province}}",
          city: "{{$detail->city}}",
          district: "{{$detail->county}}"
        });

	
	//下拉框
        $('#proType').selecter({
          autoSelect: false,
          type: "proType",
	  savetype: 2,
          selectvalue: "{{$detail->proType}}"
        });
        $('#pubDelayFlag').selecter({
          autoSelect: false,
          type: "sf",
	  savetype: 2,
          selectvalue: "{{$detail->pubDelayFlag}}"
        });
        $('#pubDealWay').selecter({
          autoSelect: false,
          type: "pubDealWay",
	  savetype: 2,
          selectvalue: "{{$detail->pubDealWay}}"
        });
        $('#ifBiddyn').selecter({
          autoSelect: false,
          type: "sf",
	  savetype: 2,
          selectvalue: "{{$detail->ifBiddyn}}"
        });
        $('#bailStartFlag').selecter({
          autoSelect: false,
          type: "bailStartFlag",
	  savetype: 2,
          selectvalue: "{{$detail->bailStartFlag}}"
        });



        //单选
        $('#isGzw_div').radio({
          autoSelect: false,
          type: "sf",
          tabname: "isGzw",
          defaultvalue: "{{$detail->isGzw}}"
        });
        $('#proSource_div').radio({
          autoSelect: false,
          type: "proSource",
          tabname: "proSource",
          defaultvalue: "{{$detail->proSource}}"
        });
        $('#pauseText_div').radio({
          autoSelect: false,
          type: "pauseText",
          tabname: "pauseText",
          defaultvalue: "{{$detail->pauseText}}"
        });

        $('#bidmode_div').radio({
          autoSelect: false,
          type: "bidmode",
          tabname: "bidmode",
          defaultvalue: "{{$detail->bidmode}}"
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
        $('#pubPayMode_div').radio({
          autoSelect: false,
          type: "pubPayMode",
          tabname: "pubPayMode",
          defaultvalue: "{{$detail->pubPayMode}}"
        });


		//页面控制
		$("#pubDelayFlag").on('change',function(){
			if(this.value == 1){
				$('.pubDelayFlagTr').show();
			}
			else if(this.value == 2){
				$('.pubDelayFlagTr').hide();
			}
		});
    });
	</script>
</form>