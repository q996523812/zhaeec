<form action="#" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
<div class="box-body">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <thead>
        <th colspan="5">企业采购项目信息公告表</th>
      </thead>  
      <tbody>

        <tr>
          <td rowspan="27" class=" control-label">交易内容</td>
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
          	{{$detail->gp_date_start}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">预算价格(元)</td>
          <td>
            {{$detail->gpjg_zj}}
          </td>
          <td class=" control-label">是否含税</td>
          <td>
            {{$detail->sfhs}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">预算价格说明</td>
          <td colspan="3">
            {{$detail->gpjg_sm}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目(标的)意向</td>
          <td colspan="3">
            {{$detail->bdyx}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目配置类型</td>
          <td colspan="3">
            {{$detail->xmpz}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">工期</td>
          <td colspan="3">
            {{$detail->gq}}
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
          <td class=" control-label">加价幅度(元)</td>
          <td>
            {{$detail->jjfd}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易（开标、谈判）时间</td>
          <td colspan="3">
            {{$detail->jy_date}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">招标代理机构联系方式</td>
          <td colspan="3">
            {{$detail->zbdl_lxfs}}
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
          <td class=" control-label">意向登记的时间</td>
          <td colspan="3">
            {{$detail->yxdj_sj}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记方式、招标文件价格</td>
          <td colspan="3">
            {{$detail->yxdj_fs}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">交纳保证金截止时间</td>
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
          <td class=" control-label">投标文件递交时间及地点</td>
          <td colspan="3">
            {{$detail->zbwj_dj}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易平台联系方式</td>
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
      </tbody>
    </table>
  </div>
</div>

                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

</form>