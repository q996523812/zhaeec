<form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
  <div class="box-body">
    <div class="fields-group">
      <div class="row">
<div class="row table-responsive align-items-center project-table">
  <div class="col-md-12 ">
<table class="table table-bordered">
  <thead>
    <th colspan="5">物业租赁项目信息公告表</th>
  </thead>
  <tbody>
    <tr>
      <td rowspan="25" class=" control-label">交易内容</td>
      <td class=" control-label">项目编号</td>
      <td colspan="3">
        {{$detail->xmbh}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">项目名称</td>
      <td colspan="3">
        {{$detail->title}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">挂牌交易批准机构</td>
      <td colspan="3">
        {{$detail->pzjg}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">标的概况</td>
      <td colspan="3">
        {{$detail->bdgk}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">其它需要披露的事项</td>
      <td colspan="3">
        {{$detail->other}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">挂牌开始日期</td>
      <td>
        {{$detail->gp_date_start}}
      </td>
      <td class=" control-label">挂牌结束日期</td>
      <td>
        {{$detail->gp_date_end}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">总租金(元)</td>
      <td>
        {{$detail->gpjg_zj}}
      </td>
      <td class=" control-label">是否含税</td>
      <td>
        {{$detail->sfhs}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">月租金/单价（元）</td>
      <td>
        {{$detail->gpjg_dj}}
      </td>
      <td class=" control-label">租赁期限（月）</td>
      <td>
        {{$detail->zlqx}}
      </td>
    </tr>    
    <tr>
      <td class=" control-label">租金说明</td>
      <td colspan="3">
        {{$detail->gpjg_sm}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">交易目的</td>
      <td>
        {{$detail->jymd}}
      </td>
      <td class=" control-label">资产类别</td>
      <td>
        {{$detail->zclb}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">信息发布方式</td>
      <td colspan="3">
        <div id="fbfs">

        </div>
      </td>
    </tr>
    <tr>
      <td class=" control-label">交易资产中是否存在权利受到限制的情形</td>
      <td colspan="3">
        {{$detail->zcsfsx}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">标的资产评估值(人民币)元</td>
      <td colspan="3">
        {{$detail->pgjz}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">交易方式</td>
      <td colspan="3">
        {{$detail->jyfs}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">报价模式</td>
      <td>
        {{$detail->bjms}}
      </td>
      <td class=" control-label">加价幅度</td>
      <td>
        {{$detail->jjfd}}
      </td>
    </tr>
    <!--
    <tr>
      <td class=" control-label">交易时间</td>
      <td colspan="3">
        <input type="text" id="jysj" name="jysj" value="{{$detail->jysj}}" class="form-control jysj" placeholder="输入 交易时间">
      </td>
    </tr>
  -->
    <tr>
      <td class=" control-label">交易时间备注</td>
      <td colspan="3">
        {{$detail->jysj_bz}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">意向方资格条件</td>
      <td colspan="3">
        {{$detail->yxf_zgtj}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">意向登记要求及资料清单</td>
      <td colspan="3">
        {{$detail->yxdj_zlqd}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">报名资料提交及交纳竞标保证金截止时间</td>
      <td colspan="3">
        {{$detail->bzj_jn_time_end}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">竞标保证金金额(人民币) (万元)</td>
      <td colspan="3">
        {{$detail->bzj}}
      </td>
    </tr>
        <tr>
          <td rowspan="3" class=" control-label">缴纳保证金账户</td>
          <td class="control-label">账户名称</td>
          <td colspan="2">
            {{$detail->bzj_zhm}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">开户行</td>
          <td colspan="2">
            {{$detail->bzj_bank}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">账号</td>
          <td colspan="2">
            {{$detail->bzj_zh}}
          </td>
        </tr>
    <tr>
      <td class=" control-label">项目经办人及联系方式</td>
      <td colspan="3">
        {{$detail->jypt_lxfs}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">备注</td>
      <td colspan="3">
        {{$detail->notes}}
      </td>
    </tr>
    <!--委托方-->
    <tr>
      <td rowspan="9" class=" control-label">委托方</td>
      <td class=" control-label">名称</td>
      <td colspan="3">
        {{$detail->wtf_name}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">企业性质</td>
      <td colspan="3">
        {{$detail->wtf_qyxz}}
    </tr>
    <tr>
      <td class=" control-label">地区</td>      
      <td colspan="3">
        {{$detail->wtf_province}}{{$detail->wtf_city}}{{$detail->wtf_area}}
      </td>    
    </tr>
    <tr>
      <td class=" control-label">详细地址</td>
      <td colspan="3">
        {{$detail->wtf_street}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">法定代表人姓名</td>
      <td>
        {{$detail->wtf_fddbr}}
      </td>
      <td class=" control-label">法定代表人电话</td>
      <td>
        {{$detail->wtf_phone}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">邮编</td>
      <td>
        {{$detail->wtf_yb}}
      </td>
      <td class=" control-label">传真</td>
      <td>
        {{$detail->wtf_fax}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">邮箱</td>
      <td colspan="3">
        {{$detail->wtf_email}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">所属集团</td>
      <td colspan="3">
        {{$detail->wtf_jt}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">委托代理人姓名</td>
      <td>
        {{$detail->wtf_dlr_name}}
      </td>
      <td class=" control-label">委托代理人电话</td>
      <td>
        {{$detail->wtf_dlr_phone}}
      </td>
    </tr>
    <!--房产信息-->
    <tr>
      <td rowspan="8" class=" control-label">房产信息</td>
      <td class=" control-label">地区</td>
      <td colspan="3">
        {{$detail->fc_province}}{{$detail->fc_city}}{{$detail->fc_area}}       
      </td>
    </tr>
    <tr>
      <td class=" control-label">详细地址</td>
      <td colspan="3">
        {{$detail->fc_street}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">功能</td>
      <td colspan="3">
        {{$detail->fc_gn}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">面积</td>
      <td>
        {{$detail->fc_mj}}
      </td>
      <td class=" control-label">房产证号</td>
      <td>
        {{$detail->fc_zjh}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">建筑结构</td>
      <td>
        {{$detail->fc_zjjg}}
      </td>
      <td class=" control-label">已使用年限</td>
      <td>
        {{$detail->fc_ysynx}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">规划用途</td>
      <td>
        {{$detail->fc_ghyt}}
      </td>
      <td class=" control-label">当前用途</td>
      <td>
        {{$detail->fc_dqyt}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">是否有原租户</td>
      <td>
        {{$detail->fc_sfyyzh}}
      </td>
      <td class=" control-label">原租户是否享有优先权</td>
      <td>
        {{$detail->fc_yzh_yxq}}
      </td>
    </tr>
    <tr>
      <td class=" control-label">建成时间</td>
      <td colspan="3">
        {{$detail->fc_jcsj}}
      </td>
    </tr>            
  </tbody>
</table>
</div>
</div>

      </div>                                               
    </div>
  </div>
  <script>
     $(function () {
        function showCheckboxValue(values){
          var a = values.split(",");
          var fbfs = checkbox_datas["fbfs"];
          var r = [];
          $.each(a, function (i,n) {
            // console.log(i+":"+n);
            r.push('<div>'+fbfs[n]+'<\/div>');
          });
          $("#fbfs").html(r.join(""));
        };
        showCheckboxValue("{{$detail->fbfs}}");
     });
  </script>
</form> 