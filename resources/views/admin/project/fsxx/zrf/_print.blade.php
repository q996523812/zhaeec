
    <tr>
      <th colspan="4" class="title">委托方</th>
    </tr>
    <tr>
        <th>客户名称</th>
        <td colspan="3">{{$zrf->name}}</td>
    </tr>
    <tr>
      <th>所在地区</th>
      <td colspan="3">{{$zrf->province}}{{$zrf->city}}{{$zrf->county}}</td>
    </tr>
    @if($zrf->type == 2)
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
      {{$zrf->address}}
      </td>
    </tr>
    <tr class="company">
      <th>注册资本（万元）</th>
      <td>{{$zrf->funding}}（{{$zrf->currency}}）</td>
      <th>法定代表人</th>
      <td>{{$zrf->boss}}</td>
    </tr>
    <tr class="company">
      <th>所属行业</th>
      <td colspan="3">{{$zrf->industry1}}{{$zrf->industry2}}</td>
    </tr>
    <tr class="company">
      <th>金融业分类</th>
      <td colspan="3">{{$zrf->financial_industry1}}{{$zrf->financial_industry2}}</td>
    </tr>
    <tr class="company">
      <th>企业类型</th>
      <td>{{$zrf->companytype}}</td>
      <th>经济类型</th>
      <td>{{$zrf->economytype}}</td>
    </tr>
    <tr class="company">
      <th>经营规模</th>
      <td colspan="3">{{$zrf->scale}}</td>
    </tr>
    <tr class="company">
      <th>经营范围</th>
      <td colspan="3">{{$zrf->scope}}</td>
    </tr>
    <tr class="company">
      <th>主体资格证明</th>
      <td colspan="3">{{$zrf->credit_cer}}</td>
    </tr>
    <tr class="company">
      <th>内部决策情况</th>
      <td>{{$zrf->inner_audit}}</td>
      <th>内部决策情况说明</th>
      <td>{{$zrf->inner_audit_desc}}</td>
    </tr>
    <tr class="company">
      <th>股东数量(个)</th>
      <td>{{$zrf->Shareholder_num}}</td>
      <th>股份总数</th>
      <td>{{$zrf->stock_num}}</td>
    </tr>
    @elseif($zrf->type == 1)
    <tr class="person">
      <th>工作单位</th>
      <td>{{$zrf->work_unit}}</td>
      <th>职务</th>
      <td>{{$zrf->work_duty}}</td>
    </tr>
    @endif
    <tr>
      <th>传真</th>
      <td>{{$zrf->fax}}</td>
      <th>电话</th>
      <td>{{$zrf->phone}}</td>
    </tr>
    <tr>
      <th>邮箱</th>
      <td colspan="3">{{$zrf->email}}</td>
    </tr>
    <tr>
      <th>邮寄地址</th>
      <td colspan="3">{{$zrf->mailing_address}}</td>
    </tr>
