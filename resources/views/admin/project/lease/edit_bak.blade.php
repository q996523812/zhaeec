<style>
  .table tbody tr td{
      vertical-align: middle;
  }
</style>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active">
          <a href="#tab1" data-toggle="tab">
              基本信息
          </a>
      </li>
      <li><a href="#tab2" data-toggle="tab">意向方</a></li>
      <li><a href="#tab3" data-toggle="tab">附件</a></li>  
    </ul>

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/projects" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
<form action="admin/projects/{{$detail->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
<div class="box-body">
<div class="fields-group">
<div class="row">

<div class="container table-responsive col-md-12 align-items-center">
<table class="table table-bordered">
  <caption>物业租赁项目信息公告表</caption>
  <tbody>
    <tr>
      <td rowspan="4" class=" control-label">交易内容</td>
      <td class=" control-label">项目编号</td>
      <td colspan="3">
        <input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" placeholder="输入 委托方名称">
      </td>
    </tr>
    <tr>
      <td class=" control-label">项目名称</td>
      <td colspan="3">
        <input type="text" id="title" name="title" value="{{$detail->title}}" class="form-control title" placeholder="输入 委托方名称">
      </td>
    </tr>
    <tr>
      <td class=" control-label">挂牌交易批准机构</td>
      <td colspan="3">
        <input type="text" id="pzjg" name="pzjg" value="{{$detail->pzjg}}" class="form-control pzjg" placeholder="输入 挂牌交易批准机构">
      </td>
    </tr>
    <tr>
      <td class=" control-label">标的概况</td>
      <td colspan="3">
        <textarea id="bdgk" name="bdgk" class="form-control bdgk" rows="5" placeholder="输入 标的概况">{{$detail->bdgk}}</textarea>
      </td>
    </tr>

    <!--委托方-->
    <tr>
      <td rowspan="9" class=" control-label">委托方</td>
      <td class=" control-label">名称</td>
      <td colspan="3">
        <input type="text" id="wtf_name" name="wtf_name" value="{{$detail->wtf_name}}" class="form-control wtf_name" placeholder="输入 委托方名称">
      </td>
    </tr>
    <tr>
      <td class=" control-label">企业性质</td>
      <td colspan="3">
        <input type="text" id="wtf_qyxz" name="wtf_qyxz" value="{{$detail->wtf_qyxz}}" class="form-control wtf_qyxz" placeholder="输入 委托方企业性质">
      </td>
    </tr>
    <tr>
      <td class=" control-label">地区</td>
      <td>
        <input type="text" id="wtf_province" name="wtf_province" value="{{$detail->wtf_province}}" class="form-control wtf_province" placeholder="输入 省">
      </td>
      <td>  
        <input type="text" id="wtf_city" name="wtf_city" value="{{$detail->wtf_city}}" class="form-control wtf_city" placeholder="输入 市">
      </td>
      <td>
        <input type="text" id="wtf_area" name="wtf_area" value="{{$detail->wtf_area}}" class="form-control wtf_area" placeholder="输入 区">
      </td>
    </tr>
    <tr>
      <td class=" control-label">详细地址</td>
      <td colspan="3">
        <input type="text" id="wtf_street" name="wtf_street" value="{{$detail->wtf_street}}" class="form-control wtf_street" placeholder="输入 详细地址">
      </td>
    </tr>
    <tr>
      <td class=" control-label">法定代表人姓名</td>
      <td>
        <input type="text" id="wtf_fddbr" name="wtf_fddbr" value="{{$detail->wtf_fddbr}}" class="form-control wtf_fddbr" placeholder="输入 法定代表人姓名">
      </td>
      <td class=" control-label">法定代表人电话</td>
      <td>
        <input type="text" id="wtf_phone" name="wtf_phone" value="{{$detail->wtf_phone}}" class="form-control wtf_phone" placeholder="输入 法定代表人电话">
      </td>
    </tr>
    <tr>
      <td class=" control-label">邮编</td>
      <td>
        <input type="text" id="wtf_yb" name="wtf_yb" value="{{$detail->wtf_yb}}" class="form-control wtf_yb" placeholder="输入 邮编">
      </td>
      <td class=" control-label">传真</td>
      <td>
        <input type="text" id="wtf_fax" name="wtf_fax" value="{{$detail->wtf_fax}}" class="form-control wtf_fax" placeholder="输入 传真">
      </td>
    </tr>
    <tr>
      <td class=" control-label">邮箱</td>
      <td colspan="3">
        <input type="text" id="wtf_email" name="wtf_email" value="{{$detail->wtf_email}}" class="form-control wtf_email" placeholder="输入 邮箱">
      </td>
    </tr>
    <tr>
      <td class=" control-label">所属集团</td>
      <td colspan="3">
        <input type="text" id="wtf_jt" name="wtf_jt" value="{{$detail->wtf_jt}}" class="form-control wtf_jt" placeholder="输入 所属集团">
      </td>
    </tr>
    <tr>
      <td class=" control-label">委托代理人姓名</td>
      <td>
        <input type="text" id="wtf_dlr_name" name="wtf_dlr_name" value="{{$detail->wtf_dlr_name}}" class="form-control wtf_dlr_name" placeholder="输入 委托代理人姓名">
      </td>
      <td class=" control-label">委托代理人电话</td>
      <td>
        <input type="text" id="wtf_dlr_phone" name="wtf_dlr_phone" value="{{$detail->wtf_dlr_phone}}" class="form-control wtf_dlr_phone" placeholder="输入 委托代理人电话">
      </td>
    </tr>

  </tbody>
</table>
</div>

<div class="col-md-8">
  <div class=" ">
    <label for="wtf_name" class=" control-label">委托方名称</label>
    <div class="">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
        <input type="text" id="wtf_name" name="wtf_name" value="{{$detail->wtf_name}}" class="form-control wtf_name" placeholder="输入 委托方名称">
      </div>        
    </div>
  </div>
</div>

<div class="col-md-4">
<div class=" ">
<label for="wtf_qyxz" class=" control-label">委托方企业性质</label>
<div class="">      
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_qyxz" name="wtf_qyxz" value="{{$detail->wtf_qyxz}}" class="form-control wtf_qyxz" placeholder="输入 委托方企业性质">
</div>      
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_province" class=" control-label">省</label>
<div class="">      
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_province" name="wtf_province" value="{{$detail->wtf_province}}" class="form-control wtf_province" placeholder="输入 省">
</div>     
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_city" class=" control-label">市</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_city" name="wtf_city" value="{{$detail->wtf_city}}" class="form-control wtf_city" placeholder="输入 市">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_area" class=" control-label">区</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_area" name="wtf_area" value="{{$detail->wtf_area}}" class="form-control wtf_area" placeholder="输入 区">
</div>

        
</div>
</div>
</div>
<div class="col-md-12">
<div class=" ">
<label for="wtf_street" class=" control-label">详细地址</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_street" name="wtf_street" value="{{$detail->wtf_street}}" class="form-control wtf_street" placeholder="输入 详细地址">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_yb" class=" control-label">邮编</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_yb" name="wtf_yb" value="{{$detail->wtf_yb}}" class="form-control wtf_yb" placeholder="输入 邮编">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_fddbr" class=" control-label">法定代表人</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_fddbr" name="wtf_fddbr" value="{{$detail->wtf_fddbr}}" class="form-control wtf_fddbr" placeholder="输入 法定代表人">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_phone" class=" control-label">联系电话</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_phone" name="wtf_phone" value="{{$detail->wtf_phone}}" class="form-control wtf_phone" placeholder="输入 联系电话">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_fax" class=" control-label">传真</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_fax" name="wtf_fax" value="{{$detail->wtf_fax}}" class="form-control wtf_fax" placeholder="输入 传真">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_email" class=" control-label">邮箱</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_email" name="wtf_email" value="{{$detail->wtf_email}}" class="form-control wtf_email" placeholder="输入 邮箱">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_jt" class=" control-label">所属集团</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_jt" name="wtf_jt" value="{{$detail->wtf_jt}}" class="form-control wtf_jt" placeholder="输入 所属集团">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_dlr_name" class=" control-label">委托代理人</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_dlr_name" name="wtf_dlr_name" value="{{$detail->wtf_dlr_name}}" class="form-control wtf_dlr_name" placeholder="输入 委托代理人">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="wtf_dlr_phone" class=" control-label">联系电话</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="wtf_dlr_phone" name="wtf_dlr_phone" value="{{$detail->wtf_dlr_phone}}" class="form-control wtf_dlr_phone" placeholder="输入 联系电话">
</div>

        
</div>
</div>
</div>
<div class="col-md-12">
<hr>
</div>
<div class="col-md-4">
<div class=" ">
<label for="xmbh" class=" control-label">项目编号</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="title" class=" control-label">标的名称</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="title" name="title" value="{{$detail->title}}" class="form-control title" placeholder="输入 标的名称">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="pzjg" class=" control-label">挂牌交易批准机构</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="pzjg" name="pzjg" value="{{$detail->pzjg}}" class="form-control pzjg" placeholder="输入 挂牌交易批准机构">
</div>

        
</div>
</div>
</div>
<div class="col-md-12">
<div class=" ">
<label for="bdgk" class=" control-label">标的概况</label>
<div class="">

        
<textarea name="bdgk" class="form-control bdgk" rows="5" placeholder="输入 标的概况">{{$detail->bdgk}}</textarea>
</div>
</div>
</div>
<div class="col-md-12">
<div class=" ">
<label for="other" class=" control-label">其它需要披露的事项</label>
<div class="">

        
<textarea name="other" class="form-control other" rows="5" placeholder="输入 其它需要披露的事项">{{$detail->bdgk}}</textarea>
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="gp_date_start" class=" control-label">挂牌开始日期</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            
<input style="width: 160px" type="text" id="gp_date_start" name="gp_date_start" value="{{$detail->gp_date_start}}" class="form-control gp_date_start" placeholder="输入 挂牌开始日期">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="gp_date_end" class=" control-label">挂牌结束日期</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            
<input style="width: 160px" type="text" id="gp_date_end" name="gp_date_end" value="{{$detail->gp_date_start}}" class="form-control gp_date_end" placeholder="输入 挂牌结束日期">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="sfhs" class=" control-label">是否含税</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="sfhs" name="sfhs" value="{{$detail->sfhs}}" class="form-control sfhs" placeholder="输入 是否含税">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="gpjg_sm" class=" control-label">预算价格说明</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="gpjg_sm" name="gpjg_sm" value="{{$detail->gpjg_sm}}" class="form-control gpjg_sm" placeholder="输入 预算价格说明">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="gpjg_zj" class=" control-label">预算价格</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
            
<input style="width: 130px; text-align: right;" type="text" id="gpjg_zj" name="gpjg_zj" value="{{$detail->gpjg_zj}}" class="form-control gpjg_zj" placeholder="输入 预算价格">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="bdyx" class=" control-label">项目(标的)意向</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="bdyx" name="bdyx" value="{{$detail->bdyx}}" class="form-control bdyx" placeholder="输入 项目(标的)意向">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="xmpz" class=" control-label">项目配置类型</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="xmpz" name="xmpz" value="{{$detail->xmpz}}" class="form-control xmpz" placeholder="输入 项目配置类型">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="gq" class=" control-label">工期</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="gq" name="gq" value="{{$detail->gq}}" class="form-control gq" placeholder="输入 工期">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="jyfs" class=" control-label">交易方式</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="jyfs" name="jyfs" value="{{$detail->jyfs}}" class="form-control jyfs" placeholder="输入 交易方式">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="bjms" class=" control-label">报价模式</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="bjms" name="bjms" value="{{$detail->bjms}}" class="form-control bjms" placeholder="输入 报价模式">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="jjfd" class=" control-label">降价幅度</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
            
<input style="width: 130px; text-align: right;" type="text" id="jjfd" name="jjfd" value="{{$detail->jjfd}}" class="form-control jjfd" placeholder="输入 降价幅度">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="jy_date" class=" control-label">交易（开标、谈判）时间</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            
<input style="width: 160px" type="text" id="jy_date" name="jy_date" value="{{$detail->jy_date}}" class="form-control jy_date" placeholder="输入 交易（开标、谈判）时间">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="zbdl_lxfs" class=" control-label">招标代理机构联系方式</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="zbdl_lxfs" name="zbdl_lxfs" value="{{$detail->zbdl_lxfs}}" class="form-control zbdl_lxfs" placeholder="输入 招标代理机构联系方式 ">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="yxf_zgtj" class=" control-label">意向方资格条件</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="yxf_zgtj" name="yxf_zgtj" value="{{$detail->yxf_zgtj}}" class="form-control yxf_zgtj" placeholder="输入 意向方资格条件">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="yxdj_zlqd" class=" control-label">意向登记要求及资料清单</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="yxdj_zlqd" name="yxdj_zlqd" value="{{$detail->yxdj_zlqd}}" class="form-control yxdj_zlqd" placeholder="输入 意向登记要求及资料清单">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="yxdj_sj" class=" control-label">意向登记的时间</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            
<input style="width: 160px" type="text" id="yxdj_sj" name="yxdj_sj" value="{{$detail->yxdj_sj}}" class="form-control yxdj_sj" placeholder="输入 意向登记的时间">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="yxdj_fs" class=" control-label">意向登记方式、招标文件价格</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="yxdj_fs" name="yxdj_fs" value="{{$detail->yxdj_fs}}" class="form-control yxdj_fs" placeholder="输入 意向登记方式、招标文件价格">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="bzj_jn_time_end" class=" control-label">交纳保证金截止时间</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            
<input style="width: 160px" type="text" id="bzj_jn_time_end" name="bzj_jn_time_end" value="{{$detail->bzj_jn_time_end}}" class="form-control bzj_jn_time_end" placeholder="输入 交纳保证金截止时间">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="bzj" class=" control-label">保证金金额(人民币) (万元)</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="bzj" name="bzj" value="{{$detail->bzj}}" class="form-control bzj" placeholder="输入 保证金金额(人民币) (万元)">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="zbwj_dj" class=" control-label">投标文件递交时间及地点</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="zbwj_dj" name="zbwj_dj" value="{{$detail->zbwj_dj}}" class="form-control zbwj_dj" placeholder="输入 投标文件递交时间及地点">
</div>

        
</div>
</div>
</div>
<div class="col-md-4">
<div class=" ">
<label for="jypt_lxfs" class=" control-label">交易平台联系方式</label>
<div class="">

        
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
<input type="text" id="jypt_lxfs" name="jypt_lxfs" value="{{$detail->jypt_lxfs}}" class="form-control jypt_lxfs" placeholder="输入 交易平台联系方式">
</div>

        
</div>
</div>
</div>
<div class="col-md-12">
<div class=" ">
<label for="notes" class=" control-label">备注</label>
<div class="">

        
<textarea name="notes" class="form-control notes" rows="5" placeholder="输入 备注">{{$detail->notes}}</textarea>
</div>
</div>
</div>
<div class="col-md-12">
<input type="hidden" name="status" value="1" class="status">
</div>
<div class="col-md-12">
<input type="hidden" name="process" value="1" class="process">
</div>
<div class="col-md-12">
<input type="hidden" name="user_id" value="1" class="user_id">
</div>
<div class="col-md-12">
<input type="hidden" name="project_id" value="7b695110-4381-48fb-8265-66f6a051360a" class="project_id">
</div>
<div class="col-md-12">
<input type="hidden" name="id" value="fdba11d3-8daa-4e7e-bd9d-69a66cf9cbe7" class="id">
</div>
<div class="col-md-12">
<input type="hidden" name="sjly" value="业务录入" class="sjly">
</div>
</div>
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
<input type="hidden" name="_token" value="WxIozf9zbV5hxfPDgouiISvPZSwu3Rm2Ig9YQBPi"><div class="col-md-2">
</div>

</div>
<input type="hidden" name="_method" value="PUT" class="_method"><input type="hidden" name="_previous_" value="http://zhaeec.test/admin/projectpurchases" class="_previous_"><!-- /.box-footer -->
</form>         
        </div>
        <div class="tab-pane fade" id="tab2">
          <div class="col-sm-10">
            <table class="table table-bordered ">
              <tbody>
                <tr>
                  <td>委托方名称</td>
                  <td>保证金</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="tab3">
            <table class="table table-bordered">
              <tbody>
                @foreach($detail->files as $file)
                <tr>
                  <td> 
                    @if($file->type == 1)
                      委托方
                    @else
                      意向方
                    @endif

                  </td>
                  <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>



    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="/admin/projects/approval/{{$detail->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="operation" name="operation" value="通过">
          <input type="hidden" id="process" name="process" value="aaa">
          <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="哈哈哈">
          
          <div>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
                  <input type="text" id="reason" name="reason" value="" class="form-control title" placeholder="输入退回理由">
              </div>
          </div>
          <div class="btn-group pull-right">
              <button type="submit" class="btn btn-primary btn-pass">通过</button>
              <button type="submit" class="btn btn-primary btn-back">退回</button>
          </div>
        </form>
      </div>
      <script>
        $(document).ready(function(){
          $('.btn-pass').on('click', function () {
              $("#operation").val("通过");
              $(".form-horizontal").submit();
              return false;
          });
          $('.btn-back').on('click', function () {
              $("#operation").val("退回");
              $(".form-horizontal").submit();
              return false;
          });

        });
      </script>
      <style>

  </div>

</div>