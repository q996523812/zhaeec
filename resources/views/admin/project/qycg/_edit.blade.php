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
          <td class=" control-label">项目编号</td>
          <td colspan="3">
            <input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" readonly="true">
          </td>
        </tr>
        <tr>
          <td class=" control-label">是否实质性进场</td>
          <td>
            <select id="sfjc" name="sfjc" class="form-control sfjc"></select>
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
          <td class=" control-label">挂牌公告期</td>
          <td>
            <input type="text" id="pubDays" name="pubDays" value="{{$detail->pubDays}}" class="form-control pubDays" placeholder="输入 挂牌公告期">
          </td>
          <td><select id="date_type" name="date_type" class="form-control date_type"></select></td>
          <td></td>
          
        </tr>
        <!--
        <tr>
          <td class=" control-label">挂牌开始日期</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="gp_date_start" name="gp_date_start" value="{{$detail->gp_date_start}}" class="form-control date gp_date_start" placeholder="输入 挂牌开始日期">
            </div>
          </td>
          <td class=" control-label">挂牌结束日期</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="gp_date_end" name="gp_date_end" value="{{$detail->gp_date_end}}" class="form-control date gp_date_end" placeholder="输入 挂牌结束日期">
            </div>
          </td>
        </tr>
      -->
        <tr>
          <td class=" control-label" rowspan="3">交易情况说明</td>
          <td>
            <input type="checkbox" name="yxfsl_0" value="1" @if($detail->yxfsl_0 == 1) checked="checked" @endif/> 意向登记期满，如没有征集到符合条件的意向受让方
          </td>
          <td colspan="2">
            <input type="text" id="yxfsl_0_desc" name="yxfsl_0_desc" value="{{$detail->yxfsl_0_desc}}" class="form-control yxfsl_0_desc">
          </td>
          <td></td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="yxfsl_1" value="1" @if($detail->yxfsl_1 == 1) checked="checked" @endif /> 意向登记期满，如只征集到1个符合条件的意向方
          </td>
          <td colspan="2">
            <input type="text" id="yxfsl_1_desc" name="yxfsl_1_desc" value="{{$detail->yxfsl_1_desc}}" class="form-control yxfsl_1_desc">
          </td>
          <td></td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="yxfsl_2" value="1" @if($detail->yxfsl_2 == 1) checked="checked" @endif /> 意向登记期满，征集到不少于3个符合条件的意向方
          </td>
          <td colspan="2"><select id="jyfs" name="jyfs" class="form-control jyfs"></select></td>
        </tr>

        <tr>
          <td class=" control-label">预算价格(元)</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="gpjg" name="gpjg" value="{{$detail->gpjg}}" class="form-control money gpjg" placeholder="输入 预算价格">
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
          <td class=" control-label">工期（天）</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="gq" name="gq" value="{{$detail->gq}}" class="form-control gq" placeholder="输入 工期">
            </div>  
          </td>
        </tr>
        <tr class="wljj">
          <td class=" control-label">报价模式</td>
          <td>
            <select id="bjms" name="bjms" class="form-control bjms"></select>
          </td>
          <td class=" control-label">报价幅度</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="jjfd" name="jjfd" value="{{$detail->jjfd}}" class="form-control money jjfd" placeholder="输入 报价幅度">
            </div>          
          </td>
        </tr>
        <tr class="wljj">
          <td class=" control-label">报价幅度说明</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="quotationRangeDesc" name="quotationRangeDesc" value="{{$detail->quotationRangeDesc}}" class="form-control money quotationRangeDesc" placeholder="输入 报价幅度说明">
            </div>          
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易（开标、谈判）时间</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="jy_date" name="jy_date" value="{{$detail->jy_date}}" class="form-control time jy_date" placeholder="输入 交易（开标、谈判）时间">
            </div>        
          </td>
        </tr>
        <tr class="ztb">
          <td class=" control-label">招标代理机构联系方式</td>
          <td colspan="3">
            <input type="text" id="zbdl_lxfs" name="zbdl_lxfs" value="{{$detail->zbdl_lxfs}}" class="form-control zbdl_lxfs" placeholder="输入 招标代理机构联系方式">
          </td>
        </tr>
        <tr>
          <td class=" control-label">投标文件递交起止时间</td>
          <td colspan="3">
            <div class="input-group" style="float:left;">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="zbwj_dj_time_start" name="zbwj_dj_time_start" value="{{$detail->zbwj_dj_time_start}}" class="form-control time zbwj_dj_time_start" placeholder="输入 投标文件递交时间起">
            </div>
            <div style="float:left;">&nbsp;&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="zbwj_dj_time_end" name="zbwj_dj_time_end" value="{{$detail->zbwj_dj_time_end}}" class="form-control time zbwj_dj_time_end" placeholder="输入 投标文件递交时间止">
            </div>
          </td>
        </tr>
        <tr class="ztb">
          <td class=" control-label">投标文件递交地点</td>
          <td colspan="3">
            <input type="text" id="zbwj_dj_address" name="zbwj_dj_address" value="{{$detail->zbwj_dj_address}}" class="form-control zbwj_dj_address" placeholder="输入 投标文件递交地点">
          </td>
        </tr>
        <tr class="ztb">
          <td class=" control-label">招标文件价格（元）</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
              <input type="text" id="zbwjjg" name="zbwjjg" value="{{$detail->zbwjjg}}" class="form-control money zbwjjg" placeholder="输入 招标文件价格">
            </div>          
          </td>
        </tr>
        <tr class="ztb">
          <td class=" control-label">招标文件说明</td>
          <td colspan="3">
            <textarea id="zbwjjgbz" name="zbwjjgbz" class="form-control zbwjjgbz" rows="5" placeholder="输入 招标文件说明">{{$detail->zbwjjgbz}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向方资格条件</td>
          <td colspan="3">
            <input type="text" id="yxf_zgtj" name="yxf_zgtj" value="{{$detail->yxf_zgtj}}" class="form-control yxf_zgtj" placeholder="输入 意向方资格条件">
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记方式（要求）及资料清单</td>
          <td colspan="3">
            <textarea id="yxdj_zlqd" name="yxdj_zlqd" class="form-control yxdj_zlqd" rows="5" placeholder="输入 意向登记方式（要求）及资料清单">{{$detail->yxdj_zlqd}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">意向登记的时间</td>
          <td colspan="3">
            <div class="input-group" style="float:left;">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="yxdj_sj_start" name="yxdj_sj_start" value="{{$detail->yxdj_sj_start}}" class="form-control time yxdj_sj_start" placeholder="输入 意向登记的时间起">
            </div>
            <div style="float:left;">&nbsp;&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="yxdj_sj_end" name="yxdj_sj_end" value="{{$detail->yxdj_sj_end}}" class="form-control time yxdj_sj_end" placeholder="输入 意向登记的时间止">
            </div>
          </td>
        </tr>
        <!--
        <tr>
          <td class=" control-label">意向登记方式</td>
          <td colspan="3">
            <input type="text" id="yxdj_fs" name="yxdj_fs" value="{{$detail->yxdj_fs}}" class="form-control yxdj_fs" placeholder="输入 意向登记方式">
          </td>
        </tr>
-->
        <tr>
          <td class=" control-label">交纳保证金截止时间</td>
          <td colspan="3">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="bzj_jn_time_end" name="bzj_jn_time_end" value="{{$detail->bzj_jn_time_end}}" class="form-control time bzj_jn_time_end" placeholder="输入 交纳保证金截止时间">
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
            <input type="text" id="bail_account_name" name="bail_account_name" value="{{$detail->bail_account_name}}" class="form-control bail_account_name" placeholder="输入 账户名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">开户行</td>
          <td colspan="2">
            <input type="text" id="bail_account_bank" name="bail_account_bank" value="{{$detail->bail_account_bank}}" class="form-control bail_account_bank" placeholder="输入 开户行">
          </td>
        </tr>
        <tr>
          <td class=" control-label">账号</td>
          <td colspan="2">
            <input type="text" id="bail_account_code" name="bail_account_code" value="{{$detail->bail_account_code}}" class="form-control bail_account_code" placeholder="输入 账号">
          </td>
        </tr>
<!--
        <tr>
          <td class=" control-label">项目经办人及联系方式</td>
          <td colspan="3">
            <input type="text" id="jypt_lxfs" name="jypt_lxfs" value="{{$detail->jypt_lxfs}}" class="form-control jypt_lxfs" placeholder="输入 项目经办人及联系方式">
          </td>
        </tr>
      -->
        <tr>
          <td class=" control-label">备注</td>
          <td colspan="3">
            <textarea id="notes" name="notes" class="form-control notes" rows="5" placeholder="输入 备注">{{$detail->notes}}</textarea>
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
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        $('.time').parent().datetimepicker({
          "format":"YYYY-MM-DD HH:mm:ss",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        $('.number').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#sfjc').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->sfjc}}",
          savetype:2
        });
        $('#sfhs').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->sfhs}}",
          savetype:2
        });
        $('#wtf_qyxz').selecter({
          autoSelect: false,
          type: "qyxz",
          selectvalue: "{{$detail->wtf_qyxz}}",
          savetype:2
        });    
        
        $('#wtf_jt').selecter({
          autoSelect: false,
          type: "ssjt",
          selectvalue: "{{$detail->wtf_jt}}",
          savetype:2
        }); 

        $('#jyfs').selecter({
          autoSelect: false,
          type: "jyfs",
          selectvalue: "{{$detail->jyfs}}",
          savetype:2
        });
        $('#bjms').selecter({
          autoSelect: false,
          type: "bjms_f",
          selectvalue: "{{$detail->bjms}}",
          savetype:2
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
          selectvalue: "{{$detail->xmpz}}",
          savetype:2
        });
        $('#date_type').selecter({
          autoSelect: false,
          type: "date_type",
          selectvalue: "{{$detail->date_type}}",
          savetype:2
        });

        $('#jyfs').on('change',function(){
          if(this.value == "1"){
            $('.wljj').show();
            $('.ztb').hide();
          }
          else{
            $('.wljj').hide();
            $('.ztb').show();
          }
        });
        $('#jyfs').change();
    });
    </script>  
</form>   