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
			<th>是否国资</th>
			<td>{{$detail->isGzw}}</td>
			<th>产权隶属关系</th>
			<td>{{$detail->pauseText}}</td>
		</tr>
		<tr>
			<th>拟公开募集资金总额(万元)</th>
			<td>{{$detail->gpjg}} 至 {{$detail->proPriceMax}}</td>
			<th>拟公开募集资金总额说明</th>
			<td>{{$detail->planPriceDesc}}</td>
		</tr>
		<tr>
			<th>拟公开募集资金对应持股比例(%)</th>
			<td>{{$detail->sellPercent1}} 至 {{$detail->sellPercent2}}</td>
			<th>拟公开募集资金对应持股比例说明</th>
			<td>{{$detail->planPercentDesc}}</td>
		</tr>
		<tr>
			<th>拟公开募集资金对应股份数(股)</th>
			<td>{{$detail->sellNum1}} 至 {{$detail->sellNum2}}</td>
			<th>拟公开募集资金对应股份数说明</th>
			<td>{{$detail->proExt2}}</td>
		</tr>
		<tr>
			<th>拟新增注册资本(万元)</th>
			<td>{{$detail->spare21}} 至 {{$detail->spare22}}</td>
			<th>拟新增注册资本说明</th>
			<td>{{$detail->announceMedia}}</td>
		</tr>
		<tr>
			<th>拟公开征集投资方数量(个)</th>
			<td>{{$detail->spare91}} 至 {{$detail->spare92}}</td>
			<th>拟公开征集投资方数量说明</th>
			<td>{{$detail->planBuyersDesc}}</td>
		</tr>
		<tr>
			<th>募集资金用途</th>
			<td colspan="3">{{$detail->pub_moneyFor}}</td>
		</tr>
		<tr>
			<th>原股东是否有投资意向</th>
			<td>{{$detail->pub_holderIn}}</td>
			<th>企业管理层或员工是否有投资意向</th>
			<td>{{$detail->pub_buyerPaperFlag}}</td>
		</tr>
		<tr>
			<th>专业机构推荐意见</th>
			<td colspan="3">{{$detail->pub_valueDesc}}</td>
		</tr>
		<tr>
			<th>是否允许联合投资</th>
			<td colspan="3">{{$detail->unitTransferee}}</td>
		</tr>
		<tr>
			<th>保证金收取方式</th>
			<td>
				@if($detail->pubBailCtrl == 1) 
					按固定金额收取（万元）
				@elseif($detail->pubBailCtrl == 2)
					按投资方拟投资金额比例收取(%)
				@endif
			</td>
			<th>保证金</th>
			<td>
				{{$detail->pubBail}}
			</td>
		</tr>
		<tr>
			<th>保证金交纳开始时间</th>
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
			<th>保证金处置方式</th>
			<td colspan="3">{{$detail->pubBailMemo}}</td>
		</tr>
		<tr>
			<th>保证内容</th>
			<td colspan="3">{{$detail->valueDesc}}</td>
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
			<th>挂牌公告期</th>
			<td colspan="3">从 {{format_date($detail->gp_date_start)}} 至 {{format_date($detail->gp_date_end)}}</td>
		</tr>
		<tr>
			<th rowspan="3">交易情况说明</th>
			<th colspan="2">未征集到意向投资方{{$detail->pub10}}</th>
			<td>
				@if($detail->pubDelayFlag == 1) 
				信息发布终结
				@elseif($detail->pubDelayFlag == 2)
				自动延长信息发布
				@endif
			</td>
		</tr>
		<tr>
			<th colspan="2">征集到意向投资方{{$detail->pub7}}</th>
			<td>
				@if($detail->pub1 == 1) 
				信息发布终结，{{$detail->pub2}}
				@elseif($detail->pub1 == 2)
				自动延长信息发布，{{$detail->pub3}}
				@endif
			</td>
		</tr>
		<tr>
			<th colspan="2">征集到意向投资方{{$detail->pub8}}</th>
			<td>信息发布终结，{{$detail->pub9}}</td>
		</tr>
		<tr>
			<th>遴选方式</th>
			<td colspan="3">{{$detail->pubDealWay}}</td>
		</tr>
		<tr>
			<th>遴选方式说明</th>
			<td colspan="3">{{$detail->dealWayDesc}}</td>
		</tr>
		<tr>
			<th>遴选方案</th>
			<td colspan="3">{{$detail->pubDesc}}</td>
		</tr>
		<tr>
			<th>是否允许网上报名</th>
			<td colspan="3">{{$detail->pub0}}</td>
		</tr>
		<tr>
			<th>是否披露意向方应提交的附件材料</th>
			<td colspan="3">{{$detail->pub16}}</td>
		</tr>
		<tr>
			<th>对增资有重大影响的信息</th>
			<td colspan="3">{{$detail->important}}</td>
		</tr>
		<tr>
			<th>投资方资格条件</th>
			<td colspan="3">{{$detail->buyConditions}}</td>
		</tr>
		<tr>
			<th>增资方案主要内容</th>
			<td colspan="3">{{$detail->addMoneyPlan}}</td>
		</tr>
		<tr>
			<th>增资条件</th>
			<td colspan="3">{{$detail->sellConditions}}</td>
		</tr>
		<tr>
			<th>交易达成条件</th>
			<td colspan="3">{{$detail->dealConditions}}</td>
		</tr>
		<tr>
			<th>其他披露事项</th>
			<td colspan="3">{{$detail->dealConditions}}</td>
		</tr>
		<tr>
			<th>增资后（拟）股权结构描述</th>
			<td colspan="3">{{$detail->pub15}}</td>
		</tr>
