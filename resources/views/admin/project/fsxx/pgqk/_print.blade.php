		<tr>
			<th colspan="4" class="title">标的企业评估核准或备案情况</th>
		</tr>
		<tr>
			<th>评估机构</th>
			<td colspan="3">{{$pgqk->pgjg}}</td>
		</tr>
		<tr>
			<th>评估机构</th>
			<td colspan="2">{{$pgqk->pgbajg}}</td>
			<td>
				@if($pgqk->hezhunFlag==1) 核准 @endif 
				@if($pgqk->beianFlag==1) 备案 @endif 
			</td>
		</tr>
		<tr>
			<th>核准（备案）日期</th>
			<td>{{format_date($pgqk->hzbarq)}}</td>
			<th>评估机构</th>
			<td>{{format_date($pgqk->pgjzr)}}</td>
		</tr>
		<tr>
			<th>评估报告文号</th>
			<td colspan="3">{{$pgqk->estNoticeno}}</td>
		</tr>
		<tr>
			<th>评估基准日审计机构</th>
			<td colspan="3">{{$pgqk->pgjzrsjjg}}</td>
		</tr>
		<tr>
			<th>律师事务所</th>
			<td colspan="3">{{$pgqk->lssws}}</td>
		</tr>
		<tr>
			<th>转让标的评估值</th>
			<td colspan="3">{{$pgqk->estimatePrice}}万元</td>
		</tr>
		<tr>
			<th rowspan="9">资产评估结果(万元)</th>
			<th>项目</th>
			<th>账面价值</th>
			<th>评估价值</th>
		</tr>
		<tr>
			<th>流动资产</th>
			<td>{{$pgqk->zmLdzc}}</td>
			<td>{{$pgqk->pgLdzc}}</td>
		</tr>
		<tr>
			<th>其他资产</th>
			<td>{{$pgqk->zmQtzc}}</td>
			<td>{{$pgqk->pgQtzc}}</td>
		</tr>
		<tr>
			<th>总资产</th>
			<td>{{$pgqk->zmZzc}}</td>
			<td>{{$pgqk->pgZzc}}</td>
		</tr>
		<tr>
			<th>流动负债</th>
			<td>{{$pgqk->zmLdfz}}</td>
			<td>{{$pgqk->pgLdfz}}</td>
		</tr>
		<tr>
			<th>长期负债</th>
			<td>{{$pgqk->zmCqfz}}</td>
			<td>{{$pgqk->pgCqfz}}</td>
		</tr>
		<tr>
			<th>总负债</th>
			<td>{{$pgqk->zmZfz}}</td>
			<td>{{$pgqk->pgZfz}}</td>
		</tr>
		<tr>
			<th>净资产</th>
			<td>{{$pgqk->zmJzc}}</td>
			<td>{{$pgqk->pgJzc}}</td>
		</tr>
		<tr>
			<th>评估备注信息</th>
			<td colspan="2">{{$pgqk->remark}}</td>
		</tr>
