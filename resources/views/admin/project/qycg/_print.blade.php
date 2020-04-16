
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
			<td colspan="2">{{getDicName('jyfs',$detail->jyfs)}}</td>
		</tr>
		<tr>
			<th>预算价格(万元)</th>
			<td>{{$detail->gpjg}}</td>
			<th>是否含税</th>
			<td>{{getDicName('sf',$detail->sfhs)}}</td>
		</tr>
		<tr>
			<th>预算价格说明</th>
			<td colspan="3">{{$detail->gpjg_sm}}</td>
		</tr>
		<tr>
			<th>项目(标的)意向</th>
			<td>{{getDicName('bdyx',$detail->bdyx)}}</td>
			<th>项目配置类型</th>
			<td>{{getDicName('xmpz',$detail->xmpz)}}</td>
		</tr>
		<tr>
			<th>工期（天）</th>
			<td>{{$detail->gq}}</td>
			<th>交易（开标、谈判）时间</th>
			<td>{{$detail->jy_date}}</td>
		</tr>
		<tr class="wljj">
			<th>报价模式</th>
			<td>{{getDicName('bjms',$detail->bjms)}}</td>
			<th>报价幅度</th>
			<td>{{$detail->jjfd}}</td>
		</tr>
		<tr class="wljj">
			<th>报价幅度说明</th>
			<td colspan="3">{{$detail->quotationRangeDesc}}</td>
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
			<th>交纳保证金截止时间</th>
			<td>{{$detail->bzj_jn_time_end}}</td>
			<th>竞标保证金金额(人民币) (万元)</th>
			<td>{{$detail->bzj}}</td>
		</tr>
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
