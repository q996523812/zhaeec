		<tr>
			<th colspan="4" class="title">标的详情</th>
		</tr>
		<tr>
			<th class="control-label">土地证号</th>
			<td colspan="3">{{$bdxq->certificateNo}}</td>
		</tr>
		<tr>
			<th>地址</th>
			<td colspan="3">{{$bdxq->address}}</td>
		</tr>
		<tr>
			<th>土地面积</th>
			<td>{{$bdxq->area}}</td>
			<th>土地类型</th>
			<td>{{$bdxq->type}}</td>
		</tr>
		<tr>
			<th>使用年限</th>
			<td>{{$bdxq->useYear}}</td>
			<th>已用年限</th>
			<td>{{$bdxq->usedYear}}</td>
		</tr>
		<tr>
			<th>规划用途</th>
			<td>{{$bdxq->planningPurposes}}</td>
			<th>目前用途</th>
			<td>{{$bdxq->currentlyUse}}</td>
		</tr>
		<tr>
			<th>配套设施</th>
			<td colspan="3">{{$bdxq->supporting_facilities}}</td>
		</tr>