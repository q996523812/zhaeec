<form action="#" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
          <input type="hidden" name="status" value="1" class="status form-control">
          <input type="hidden" name="process" value="11" class="process form-control">
          <input type="hidden" name="user_id" value="1" class="user_id form-control">
          <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
          <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id form-control">
          <input type="hidden" name="sjly" value="业务录入" class="sjly form-control">
          <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
        </div>      

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
            <input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" readonly="true">
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
        <tr>
          <td class=" control-label">其它需要披露的事项</td>
          <td colspan="3">
            <textarea id="other" name="other" class="form-control other" rows="5" placeholder="输入 其它需要披露的事项">{{$detail->other}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">挂牌开始日期</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="gp_date_start" name="gp_date_start" value="{{$detail->gp_date_start}}" class="form-control gp_date_start" placeholder="输入 挂牌开始日期">
            </div>
          </td>
          <td class=" control-label">挂牌结束日期</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="gp_date_end" name="gp_date_end" value="{{$detail->gp_date_end}}" class="form-control gp_date_end" placeholder="输入 挂牌结束日期">
            </div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">预算价格(元)</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="gpjg_zj" name="gpjg_zj" value="{{$detail->gpjg_zj}}" class="form-control money gpjg_zj" placeholder="输入 预算价格">
            </div>
          </td>
          <td class=" control-label">是否含税</td>
          <td>
            <select id="sfhs" name="sfhs" class="form-control sfhs"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">预算价格说明</td>
          <td colspan="3">
            <textarea id="gpjg_sm" name="gpjg_sm" class="form-control gpjg_sm" rows="5" placeholder="输入 预算价格说明">{{$detail->gpjg_sm}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目(标的)意向</td>
          <td colspan="3">
            <select id="bdyx" name="bdyx" class="form-control bdyx"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目配置类型</td>
          <td colspan="3">
            <select id="xmpz" name="xmpz" class="form-control xmpz"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">工期</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="gq" name="gq" value="{{$detail->gq}}" class="form-control gq" placeholder="输入 工期">
            </div>  
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易方式</td>
          <td colspan="3">
            <select id="jyfs" name="jyfs" class="form-control jyfs"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">报价模式</td>
          <td>
            <select id="bjms" name="bjms" class="form-control bjms"></select>
          </td>
          <td class=" control-label">加价幅度(元)</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="jjfd" name="jjfd" value="{{$detail->jjfd}}" class="form-control money jjfd" placeholder="输入 加价幅度">
            </div>          
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易（开标、谈判）时间</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="jy_date" name="jy_date" value="{{$detail->jy_date}}" class="form-control jy_date" placeholder="输入 交易（开标、谈判）时间">
            </div>        
          </td>
        </tr>
        <tr>
          <td class=" control-label">招标代理机构联系方式</td>
          <td colspan="3">
            <input type="text" id="zbdl_lxfs" name="zbdl_lxfs" value="{{$detail->zbdl_lxfs}}" class="form-control zbdl_lxfs" placeholder="输入 招标代理机构联系方式">
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向方资格条件</td>
          <td colspan="3">
            <input type="text" id="yxf_zgtj" name="yxf_zgtj" value="{{$detail->yxf_zgtj}}" class="form-control yxf_zgtj" placeholder="输入 意向方资格条件">
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记要求及资料清单</td>
          <td colspan="3">
            <textarea id="yxdj_zlqd" name="yxdj_zlqd" class="form-control yxdj_zlqd" rows="5" placeholder="输入 意向登记要求及资料清单">{{$detail->yxdj_zlqd}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记的时间</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="yxdj_sj" name="yxdj_sj" value="{{$detail->yxdj_sj}}" class="form-control yxdj_sj" placeholder="输入 意向登记的时间">
            </div>        
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记方式、招标文件价格</td>
          <td colspan="3">
            <input type="text" id="yxdj_fs" name="yxdj_fs" value="{{$detail->yxdj_fs}}" class="form-control yxdj_fs" placeholder="输入 意向登记方式、招标文件价格">
          </td>
        </tr>
        <tr>
          <td class=" control-label">交纳保证金截止时间</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="bzj_jn_time_end" name="bzj_jn_time_end" value="{{$detail->bzj_jn_time_end}}" class="form-control bzj_jn_time_end" placeholder="输入 交纳保证金截止时间">
            </div>        
          </td>
        </tr>
        <tr>
          <td class=" control-label">竞标保证金金额(人民币) (万元)</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="bzj" name="bzj" value="{{$detail->bzj}}" class="form-control money bzj" placeholder="输入 竞标保证金金额">
            </div>          
          </td>
        </tr>
        <tr>
          <td rowspan="3" class=" control-label">缴纳保证金账户</td>
          <td class="control-label">账户名称</td>
          <td colspan="2">
            <input type="text" id="bzj_zhm" name="bzj_zhm" value="{{$detail->bzj_zhm}}" class="form-control bzj_zhm" placeholder="输入 账户名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">开户行</td>
          <td colspan="2">
            <input type="text" id="bzj_bank" name="bzj_bank" value="{{$detail->bzj_bank}}" class="form-control bzj_bank" placeholder="输入 开户行">
          </td>
        </tr>
        <tr>
          <td class=" control-label">账号</td>
          <td colspan="2">
            <input type="text" id="bzj_zh" name="bzj_zh" value="{{$detail->bzj_zh}}" class="form-control bzj_zh" placeholder="输入 账号">
          </td>
        </tr>
        <tr>
          <td class=" control-label">投标文件递交起止时间及地点</td>
          <td colspan="3">
            <input type="text" id="zbwj_dj" name="zbwj_dj" value="{{$detail->zbwj_dj}}" class="form-control zbwj_dj" placeholder="输入 投标文件递交时间及地点">
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目经办人及联系方式</td>
          <td colspan="3">
            <input type="text" id="jypt_lxfs" name="jypt_lxfs" value="{{$detail->jypt_lxfs}}" class="form-control jypt_lxfs" placeholder="输入 项目经办人及联系方式">
          </td>
        </tr>
        <tr>
          <td class=" control-label">备注</td>
          <td colspan="3">
            <textarea id="notes" name="notes" class="form-control notes" rows="5" placeholder="输入 备注">{{$detail->notes}}</textarea>
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
          <td class=" control-label">所属集团</td>
          <td colspan="3">
            <select id="wtf_jt" name="wtf_jt" class="form-control wtf_jt"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">企业性质</td>
          <td colspan="3">
            <select id="wtf_qyxz" name="wtf_qyxz" class="form-control wtf_qyxz"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="wtf_province">Province</label>
                  <select class="form-control" id="wtf_province" name="wtf_province"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="wtf_city">City</label>
                  <select class="form-control" id="wtf_city" name="wtf_city"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="wtf_area" >District</label>
                  <select class="form-control" id="wtf_area" name="wtf_area"></select>
                </div>
              </div>
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
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      <button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
    </div>
  </div>
</div> 
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

    <script>
    $(function () {
        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$detail->wtf_province}}",
          city: "{{$detail->wtf_city}}",
          district: "{{$detail->wtf_area}}"
        });

        //日期
        $('.gp_date_start').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        $('.gp_date_end').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        $('.bzj_jn_time_end').parent().datetimepicker({
          "format":"YYYY-MM-DD HH:mm:ss",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        $('.jy_date').parent().datetimepicker({
          "format":"YYYY-MM-DD HH:mm:ss",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        $('.yxdj_sj').parent().datetimepicker({
          "format":"YYYY-MM-DD HH:mm:ss",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.gpjg_zj').inputmask({"alias":"decimal","rightAlign":true});
        $('.jjfd').inputmask({"alias":"decimal","rightAlign":true});
        $('.bzj').inputmask({"alias":"decimal","rightAlign":true});
        $('.gq').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#sfhs').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->sfhs}}"
        });
        $('#wtf_qyxz').selecter({
          autoSelect: false,
          type: "qyxz",
          selectvalue: "{{$detail->wtf_qyxz}}"
        });    
        
        $('#wtf_jt').selecter({
          autoSelect: false,
          type: "ssjt",
          selectvalue: "{{$detail->wtf_jt}}"
        }); 

        $('#jyfs').selecter({
          autoSelect: false,
          type: "jyfs",
          selectvalue: "{{$detail->jyfs}}"
        });
        $('#bjms').selecter({
          autoSelect: false,
          type: "bjms",
          selectvalue: "{{$detail->bjms}}"
        });
        $('#bdyx').selecter({
          autoSelect: false,
          type: "bdyx",
          selectvalue: "{{$detail->bdyx}}",
          savetype:2
        });
        $('#xmpz').selecter({
          autoSelect: false,
          type: "xmpz",
          selectvalue: "{{$detail->xmpz}}"
        });

    });
    </script>  
</form>   