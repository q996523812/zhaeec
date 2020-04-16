		<tr>
			<th colspan="4" class="title">监管信息</th>
		</tr>
		<tr>
			<th>国资监管类型</th>
			<td colspan="3">{{getDicName('regulatortype',$jgxx->sellerIsYq)}}</td>
		</tr>
		<tr>
			<th>国资监管机构</th>
			<td colspan="3">{{getDicName('regulator',$jgxx->mgrType)}}</td>
		</tr>
		<tr>
			<th>监管机构属地</th>
			<td colspan="3">{{$jgxx->mgrProvince}}{{$jgxx->mgrCity}}{{$jgxx->mgrDistrict}}</td>
		</tr>
		<tr>
			<th>国家出资企业或主管部门名称</th>
			<td colspan="3">{{$jgxx->mgrName}}</td>
		</tr>
		<tr>
			<th>统一社会信用代码或组织机构代码</th>
			<td colspan="3">{{$jgxx->mgrCode}}</td>
		</tr>
		<tr>
			<th colspan="4" class="title">产权转让行为批准情况</th>
		</tr>
		<tr>
			<th>批准机构类型</th>
			<td colspan="3">{{getDicName('permitCompType',$jgxx->permitCompType)}}</td>
		</tr>
		<tr>
			<th>批准单位名称</th>
			<td colspan="3">{{$jgxx->permitCompName}}</td>
		</tr>
		<tr>
			<th>批准文件类型</th>
			<td colspan="3">{{getDicName('regulator',$jgxx->permitFileType)}}{{$jgxx->permitFileDesc}}</td>
		</tr>
		<tr>
			<th>批准文件名称/决议名称</th>
			<td colspan="3">{{$jgxx->permitFileName}}</td>
		</tr>
		<tr>
			<th>批准文号</th>
			<td>{{$jgxx->permitFileNo}}</td>
			<th>批准日期</th>
			<td>{{format_date($detail->permitDate)}}</td>
		</tr>
		