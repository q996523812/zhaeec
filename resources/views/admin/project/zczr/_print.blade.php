		<tr>
			<th colspan="4" class="title">项目信息</th>
		</tr>
		<tr>
			<th class="control-label">项目编号</th>
			<td colspan="3">{{$detail->xmbh}}</td>
		</tr>
		<tr>
			<th>项目名称</th>
			<td colspan="3">{{$detail->title}}</td>
		</tr>
		<tr>
			<th>转让底价(万元)</th>
			<td colspan="3">{{$detail->gpjg}}</td>
		</tr>
		<tr>
			<th>是否国资</th>
			<td>{{$detail->isGzw}}</td>
			<th>资产类型</th>
			<td>{{$detail->proType}}</td>
		</tr>
		<tr>
			<th>标的所在地区</th>
			<td colspan="3">{{$detail->proProvince}}{{$detail->proCity}}{{$detail->proCounty}}</td>
		</tr>
		<tr>
			<th>资产来源</th>
			<td>{{$detail->proSource}}</td>
			<th>产权隶属关系</th>
			<td>{{$detail->pauseText}}</td>
		</tr>
		<tr>
			<th>合作机构信息</th>
			<td colspan="3">{{$detail->spare4}}</td>
		</tr>
		<tr>
			<th>项目名称</th>
			<td colspan="3">{{$detail->proDesc}}</td>
		</tr>
		<tr>
			<th>挂牌公告期</th>
			<td colspan="3">从 {{format_date($detail->gp_date_start)}} 至 {{format_date($detail->gp_date_end)}}</td>
		</tr>
		<tr>
			<th rowspan="3">交易情况说明</th>
			<th colspan="2">挂牌期满后，如未征集到符合条件的意向受让方是否自动延牌</th>
			<td>{{$detail->pubDelayFlag}}</td>
		</tr>
		<tr>
			<th colspan="2">如只征集到一家符合条件的意向方采用的交易方式</th>
			<td>{{$detail->pubDealWay1}}</td>
		</tr>
		<tr>
			<th colspan="2">征集到两个以上意向方采用的交易方式</th>
			<td>{{$detail->pubDealWay2}}</td>
		</tr>
		@if($detail->pubDelayFlag == '1')
		<tr>
			<th>延牌条件</th>
			<td colspan="3">少于等于{{$detail->delayBuyerSize}}个意向受让方</td>
		</tr>
		<tr>
			<th>最长延长周期数</th>
			<td colspan="3">{{$detail->delayMax}}</td>
		</tr>
		<tr>
			<th>延牌周期（工作日，至少5个）</th>
			<td colspan="3">{{$detail->delayPeroid}}</td>
		</tr>
		@endif
		@if($detail->pubDealWay2 == '1')
		<tr>
			<th>报价方式</th>
			<td>{{getDicName('bjms',$detail->bidmode)}}</td>
			<th>是否采用动态报价</th>
			<td>{{getDicName('bjms',$detail->ifBiddyn)}}</td>
		</tr>
		@endif
		<tr>
			<th>意向方需要提交的资料清单</th>
			<td colspan="3">{{$detail->information_list}}</td>
		</tr>
		<tr>
			<th>优先权人是否放弃优先购买权</th>
			<td colspan="3">{{$detail->allowEndPrio}}</td>
		</tr>
		<tr>
			<th>是否允许联合受让</th>
			<td>{{$detail->unitTransferee}}</td>
			<th>是否允许网上报名</th>
			<td>{{$detail->pub0}}</td>
		</tr>
		<tr>
			<th>保证金金额（万元）</th>
			<td colspan="3">{{$detail->pubBail}}</td>
		</tr>
		<tr>
			<th>保证金交纳时间</th>
			<td colspan="3">{{$detail->bailStartFlag}}</td>
		</tr>
		<tr>
			<th>保证金交纳截止时间要求</th>
			<td colspan="3">
				@if($detail->pubBailType == 0) 
				挂牌截止日17:00前(以银行到账时间为准) 
				@elseif($detail->pubBailType == 1)
				交纳开始后，{{$detail->pubBailDays}}个工作日17:00前有效(以银行到账时间为准)
				@endif
			</td>
		</tr>
		<tr>
			<th rowspan="3">保证金交纳账号</th>
			<th>账户名称</th>
			<td colspan="2">{{$detail->bail_account_name}}</td>
		</tr>
			<th>开户行</th>
			<td colspan="2">{{$detail->bail_account_bank}}</td>
		</tr>
		</tr>
			<th>银行账号</th>
			<td colspan="2">{{$detail->bail_account_code}}</td>
		</tr>
		<tr>
			<th>受让方资格条件</th>
			<td colspan="3">{{$detail->buyConditions}}</td>
		</tr>
		<tr>
			<th>价款支付方式</th>
			<td colspan="3">{{$detail->pubPayMode}}</td>
		</tr>
		<tr>
			<th>价款支付要求</th>
			<td colspan="3">{{$detail->payPeriodInfo}}</td>
		</tr>
		<tr>
			<th>重大事项及其他披露内容</th>
			<td colspan="3">{{$detail->important}}</td>
		</tr>
		<tr>
			<th>与转让相关的其他条件</th>
			<td colspan="3">{{$detail->sellConditions}}</td>
		</tr>
		<tr>
			<th>保证内容</th>
			<td colspan="3">{{$detail->valueDesc}}</td>
		</tr>
		<tr>
			<th>处置方法</th>
			<td colspan="3">{{$detail->pubBailMemo}}</td>
		</tr>
