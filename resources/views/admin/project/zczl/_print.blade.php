
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
			<th>挂牌交易批准机构</th>
			<td colspan="3">{{$detail->pzjg}}</td>
		</tr>
		<tr>
			<th>标的概况</th>
			<td colspan="3">{{$detail->bdgk}}</td>
		</tr>
		<tr>
			<th>其它需要披露的事项</th>
			<td colspan="3">{{$detail->other}}</td>
		</tr>
		<tr>
			<th>挂牌公告期</th>
			<td colspan="3">从 {{format_date($detail->gp_date_start)}} 至 {{format_date($detail->gp_date_end)}}</td>
		</tr>
		<!--
		<tr>
			<th rowspan="3">交易情况说明</th>
			<th>意向登记期满，如没有征集到符合条件的意向受让方</th>
			<td colspan="2">{{$detail->yxfsl_0_desc}}</td>
		</tr>
		<tr>
			<th>意向登记期满，如只征集到1个符合条件的意向方</th>
			<td colspan="2">{{$detail->yxfsl_1_desc}}</td>
		</tr>
		<tr>
			<th>意向登记期满，征集到不少于3个符合条件的意向方</th>
			<td colspan="2">{{$detail->jyfs}}</td>
		</tr>
	-->
		<tr>
			<th>总租金(万元)</th>
			<td>{{$detail->gpjg}}</td>
			<th></th>
			<td></td>
		</tr>
		<tr>
			<th>月租金/单价(万元)</th>
			<td>{{$detail->gpjg_dj}}</td>
			<th>租赁期限（月）</th>
			<td>{{$detail->zlqx}}</td>
		</tr>
		<tr>
			<th>租金说明</th>
			<td colspan="3">{{$detail->gpjg_sm}}</td>
		</tr>
		<tr>
			<th>交易目的</th>
			<td>{{$detail->jymd}}</td>
			<th>资产类别</th>
			<td>{{$detail->zclb}}</td>
		</tr>
		<tr>
			<th>信息发布方式</th>
			<td colspan="3">{{$detail->fbfs}}</td>
		</tr>
		<tr>
			<th>交易资产中是否存在权利受到限制的情形</th>
			<td colspan="3">{{$detail->zcsfsx}}</td>
		</tr>
		<tr>
			<th>标的资产评估值(人民币)(万元)</th>
			<td>{{$detail->pgjz}}</td>
			<th></th>
			<td></td>
		</tr>
		<tr>
			<th>交易方式</th>
			<td>{{$detail->jyfs}}</td>
			<th></th>
			<td></td>
		</tr>

		<tr class="wljj">
			<th>报价模式</th>
			<td>{{$detail->bjms}}</td>
			<th>报价幅度</th>
			<td>{{$detail->jjfd}}</td>
		</tr>
		<tr class="wljj">
			<th>报价幅度说明</th>
			<td colspan="3">{{$detail->quotationRangeDesc}}</td>
		</tr>
		<tr>
			<th>交易时间备注</th>
			<td colspan="3">{{$detail->jysj_bz}}</td>
		</tr>


		<tr class="ztb">
			<th>招标代理机构联系方式</th>
			<td colspan="3">{{$detail->zbdl_lxfs}}</td>
		</tr>
		<tr class="ztb">
			<th>投标文件递交起止时间</th>
			<td colspan="3">从 {{$detail->zbwj_dj_time_start}} 至 {{$detail->zbwj_dj_time_end}}</td>
		</tr>
		<tr class="ztb">
			<th>投标文件递交地点</th>
			<td colspan="3">{{$detail->zbwj_dj_address}}</td>
		</tr>
		<tr class="ztb">
			<th>招标文件价格（元）</th>
			<td colspan="3">{{$detail->zbwjjg}}</td>
		</tr>
		<tr class="ztb">
			<th>招标文件说明</th>
			<td colspan="3">{{$detail->zbwjjgbz}}</td>
		</tr>

		<tr>
			<th>意向方资格条件</th>
			<td colspan="3">{{$detail->yxf_zgtj}}</td>
		</tr>
		<tr>
			<th>意向登记方式（要求）及资料清单</th>
			<td colspan="3">{{$detail->yxdj_zlqd}}</td>
		</tr>
		<tr>
			<th>意向登记的时间</th>
			<td colspan="3">从 {{$detail->yxdj_sj_start}} 至 {{$detail->yxdj_sj_end}}</td>
		</tr>
		<tr>
			<th>报名资料提交及交纳竞标保证金截止时间</th>
			<td colspan="3">{{$detail->bzj_jn_time_end}}</td>
		</tr>
		<tr>
			<th>竞标保证金金额(人民币) (万元)</th>
			<td colspan="3">{{$detail->bzj}}</td>
		</tr>
		<!--
		<tr>
			<th>交纳保证金截止时间</th>
			<td>{{$detail->bzj_jn_time_end}}</td>
			<th>竞标保证金金额(人民币) (万元)</th>
			<td>{{$detail->bzj}}</td>
		</tr>
	-->
		<tr>
			<th rowspan="3">缴纳保证金账户</th>
			<th>账户名称</th>
			<td colspan="2">{{$detail->bail_account_name}}</td>
		</tr>
		<tr>
			<th>开户行</th>
			<td colspan="2">{{$detail->bail_account_bank}}</td>
		</tr>
		<tr>
			<th>账号</th>
			<td colspan="2">{{$detail->bail_account_code}}</td>
		</tr>
		<tr>
			<th>备注</th>
			<td colspan="3">{{$detail->notes}}</td>
		</tr>

		<tr>
			<th colspan="4" class="title">房产信息</th>
		</tr>
		<tr>
			<th>地区</th>
			<td colspan="3">{{$detail->fc_province}}{{$detail->fc_city}}{{$detail->fc_area}}</td>
		</tr>
		<tr>
			<th>详细地址</th>
			<td colspan="3">{{$detail->fc_street}}</td>
		</tr>
		<tr>
			<th>面积</th>
			<td>{{$detail->fc_mj}}</td>
			<th>房产证号</th>
			<td>{{$detail->fc_zjh}}</td>
		</tr>
		<tr>
			<th>建筑结构</th>
			<td>{{$detail->fc_zjjg}}</td>
			<th>已使用年限</th>
			<td>{{$detail->fc_ysynx}}</td>
		</tr>
		<tr>
			<th>规划用途</th>
			<td colspan="3">{{$detail->fc_ghyt}}</td>
		</tr>
		<tr>
			<th>当前用途</th>
			<td colspan="3">{{$detail->fc_dqyt}}</td>
		</tr>
		<tr>
			<th>是否有原租户</th>
			<td>{{$detail->fc_sfyyzh}}</td>
			<th>原租户是否享有优先权</th>
			<td>{{$detail->fc_yzh_yxq}}</td>
		</tr>
		<tr>
			<th>建成时间</th>
			<td>{{$detail->fc_jcsj}}</td>
			<th></th>
			<td></td>
		</tr>
