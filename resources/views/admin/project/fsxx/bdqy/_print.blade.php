
    <tr>
      <th colspan="4" class="title">标的企业</th>
    </tr>
    <tr>
        <th>客户名称</th>
        <td colspan="3">{{$bdqy->name}}</td>
    </tr>
    <tr>
      <th>所在地区</th>
      <td colspan="3">{{$bdqy->province}}{{$bdqy->city}}{{$bdqy->county}}</td>
    </tr>
    @if($bdqy->type == 2)
    <tr class="company">
      <th>是否国资</th>
      <td>
    {{getDicName('sf',$detail->sfgz)}}
    </td>
      <th>成立时间</th>
      <td>{{format_date($detail->found_date)}}</td>
    </tr>
    <tr class="company">
      <th>注册地址</th>
      <td colspan="3">
    {{$bdqy->address}}
    </td>
    </tr>
    <tr class="company">
      <th>注册资本（万元）</th>
      <td>{{$bdqy->funding}}（{{$bdqy->currency}}）</td>
      <th>法定代表人</th>
      <td>{{$bdqy->boss}}</td>
    </tr>
    <tr class="company">
      <th>所属行业</th>
      <td colspan="3">{{$bdqy->industry1}}{{$bdqy->industry2}}</td>
    </tr>
    <tr class="company">
      <th>金融业分类</th>
      <td colspan="3">{{$bdqy->financial_industry1}}{{$bdqy->financial_industry2}}</td>
    </tr>
    <tr class="company">
      <th>企业类型</th>
      <td>{{$bdqy->companytype}}</td>
      <th>经济类型</th>
      <td>{{$bdqy->economytype}}</td>
    </tr>
    <tr class="company">
      <th>经营规模</th>
      <td colspan="3">{{$bdqy->scale}}</td>
    </tr>
    <tr class="company">
      <th>经营范围</th>
      <td colspan="3">{{$bdqy->scope}}</td>
    </tr>
    <tr class="company">
      <th>主体资格证明</th>
      <td colspan="3">{{$bdqy->credit_cer}}</td>
    </tr>
    <tr class="company">
      <th>内部决策情况</th>
      <td>{{$bdqy->inner_audit}}</td>
      <th>内部决策情况说明</th>
      <td>{{$bdqy->inner_audit_desc}}</td>
    </tr>
    <tr class="company">
      <th>股东数量(个)</th>
      <td>{{$bdqy->Shareholder_num}}</td>
      <th>股份总数</th>
      <td>{{$bdqy->stock_num}}</td>
    </tr>
    @elseif($bdqy->type == 1)
    <tr class="person">
      <th>工作单位</th>
      <td>{{$bdqy->work_unit}}</td>
      <th>职务</th>
      <td>{{$bdqy->work_duty}}</td>
    </tr>
    @endif
    <tr>
      <th>传真</th>
      <td>{{$bdqy->fax}}</td>
      <th>电话</th>
      <td>{{$bdqy->phone}}</td>
    </tr>
    <tr>
      <th>邮箱</th>
      <td colspan="3">{{$bdqy->email}}</td>
    </tr>
    <tr>
      <th>邮寄地址</th>
      <td colspan="3">{{$bdqy->mailing_address}}</td>
    </tr>
