		<tr>
			<th colspan="4" class="title">财务报表</th>
		</tr>
		<tr>
			<th rowspan="4">
				@if($cwbb->ywwftg == '1')
					业务无法提供
				@else
					财务报表日期<br>
					{{format_date($cwbb->statement_date)}}
				@endif
			</th>
			<th>资产总额(万元)</th>
			<th>负债总额(万元)</th>
			<th>净资产(所有者权益)(万元</th>
		</tr>
		<tr>
			<td>{{$cwbb->zzc}}</td>
			<td>{{$cwbb->zfz}}</td>
			<td>{{$cwbb->syzqy}}</td>
		</tr>
		<tr>
			<th>营业收入(万元)</th>
			<th>利润总额(万元)</th>
			<th>净利润(万元)</th>
		</tr>
		<tr>
			<td>{{$cwbb->yysl}}</td>
			<td>{{$cwbb->yylr}}</td>
			<td>{{$cwbb->jlr}}</td>
		</tr>
		