  <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">

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
    <th colspan="5">物业租赁项目信息公告表</th>
  </thead>  
  <tbody>
    <tr>
      <td rowspan="25" class=" control-label">交易内容</td>
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
      <td class=" control-label">总租金(万元)</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="gpjg" name="gpjg" value="{{$detail->gpjg}}" class="form-control money gpjg" placeholder="输入 总租金">
        </div>
      </td>
      <td class=" control-label">是否含税</td>
      <td>
        <select id="sfhs" name="sfhs" class="form-control sfhs"></select>
      </td>
    </tr>
    <tr>
      <td class=" control-label">月租金/单价（万元）</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="gpjg_dj" name="gpjg_dj" value="{{$detail->gpjg_dj}}" class="form-control money gpjg_dj" placeholder="输入 总租金">
        </div>        
      </td>
      <td class=" control-label">租赁期限（月）</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="zlqx" name="zlqx" value="{{$detail->zlqx}}" class="form-control number zlqx" placeholder="输入 租赁期限（月）">
        </div>          
      </td>
    </tr>    
    <tr>
      <td class=" control-label">租金说明</td>
      <td colspan="3">
        <textarea id="gpjg_sm" name="gpjg_sm" class="form-control gpjg_sm" rows="5" placeholder="输入 租金说明">{{$detail->gpjg_sm}}</textarea>
      </td>
    </tr>
    <tr>
      <td class=" control-label">交易目的</td>
      <td>
        <select id="jymd" name="jymd" class="form-control jymd"></select>
      </td>
      <td class=" control-label">资产类别</td>
      <td>
        <select id="zclb" name="zclb" class="form-control zclb"></select>
      </td>
    </tr>
    <tr>
      <td class=" control-label">信息发布方式</td>
      <td colspan="3">
        <div id="fbfses"></div>
      </td>
    </tr>
    <tr>
      <td class=" control-label">交易资产中是否存在权利受到限制的情形</td>
      <td colspan="3">
        <input type="text" id="zcsfsx" name="zcsfsx" value="{{$detail->zcsfsx}}" class="form-control zcsfsx" placeholder="输入 交易资产中是否存在权利受到限制的情形">
      </td>
    </tr>
    <tr>
      <td class=" control-label">标的资产评估值(人民币)(万元)</td>
      <td colspan="3">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="pgjz" name="pgjz" value="{{$detail->pgjz}}" class="form-control money pgjz" placeholder="输入 标的资产评估值(人民币)万元">
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
      <td class=" control-label">加价幅度(万元)</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="jjfd" name="jjfd" value="{{$detail->jjfd}}" class="form-control money jjfd" placeholder="输入 加价幅度">
        </div>          
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
        <input type="text" id="jysj_bz" name="jysj_bz" value="{{$detail->jysj_bz}}" class="form-control jysj_bz" placeholder="输入 交易时间备注">
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
      <td class=" control-label">报名资料提交及交纳竞标保证金截止时间</td>
      <td colspan="3">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
          <input type="text" id="bzj_jn_time_end" name="bzj_jn_time_end" value="{{$detail->bzj_jn_time_end}}" class="form-control bzj_jn_time_end" placeholder="输入 报名资料提交及交纳竞标保证金截止时间">
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
    <!--
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
-->
            <!-- inline-template 代表通过内联方式引入组件 -->
            <!-- 
            <select-district inline-template>
              <div class="form-row" id="distpicker1">
                <div class="col-sm-3">
                  <select class="form-control" v-model="provinceId">
                    <option value="">选择省</option>
                    <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                  </select>
                </div>
                <div class="col-sm-3">
                  <select class="form-control" v-model="cityId">
                    <option value="">选择市</option>
                    <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                  </select>
                </div>
                <div class="col-sm-3">
                  <select class="form-control" v-model="districtId">
                    <option value="">选择区</option>
                    <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                  </select>
                </div>
              </div>
            </select-district>  
          -->
<!--
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
-->
    <!--房产信息-->
    <tr>
      <td rowspan="8" class=" control-label">房产信息</td>
      <td class=" control-label">地区</td>
      <!--
      <td>
        <input type="text" id="fc_province" name="fc_province" value="{{$detail->fc_province}}" class="form-control fc_province" placeholder="输入 省">
      </td>
      <td>  
        <input type="text" id="fc_city" name="fc_city" value="{{$detail->fc_city}}" class="form-control fc_city" placeholder="输入 市">
      </td>
      <td>
        <input type="text" id="fc_area" name="fc_area" value="{{$detail->fc_area}}" class="form-control fc_area" placeholder="输入 区">
      </td>
    -->
      <td colspan="3">
          <div id="distpicker2">
            <div class="col-sm-3">
              <label class="sr-only" for="fc_province">Province</label>
              <select class="form-control" id="fc_province" name="fc_province"></select>
            </div>
            <div class="col-sm-3">
              <label class="sr-only" for="fc_city">City</label>
              <select class="form-control" id="fc_city" name="fc_city"></select>
            </div>
            <div class="col-sm-3">
              <label class="sr-only" for="fc_area" >District</label>
              <select class="form-control" id="fc_area" name="fc_area"></select>
            </div>
          </div> 
      </td>
    </tr>
    <tr>
      <td class=" control-label">详细地址</td>
      <td colspan="3">
        <input type="text" id="fc_street" name="fc_street" value="{{$detail->fc_street}}" class="form-control fc_street" placeholder="输入 详细地址">
      </td>
    </tr>
    <tr>
      <td class=" control-label">功能</td>
      <td colspan="3">
        <input type="text" id="fc_gn" name="fc_gn" value="{{$detail->fc_gn}}" class="form-control fc_gn" placeholder="输入 功能">
      </td>
    </tr>
    <tr>
      <td class=" control-label">面积</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="fc_mj" name="fc_mj" value="{{$detail->fc_mj}}" class="form-control number fc_mj" placeholder="输入 面积">
        </div>         
      </td>
      <td class=" control-label">房产证号</td>
      <td>
        <input type="text" id="fc_zjh" name="fc_zjh" value="{{$detail->fc_zjh}}" class="form-control fc_zjh" placeholder="输入 房产证号">
      </td>
    </tr>
    <tr>
      <td class=" control-label">建筑结构</td>
      <td>
        <input type="text" id="fc_zjjg" name="fc_zjjg" value="{{$detail->fc_zjjg}}" class="form-control fc_zjjg" placeholder="输入 建筑结构">
      </td>
      <td class=" control-label">已使用年限</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
          <input type="text" id="fc_ysynx" name="fc_ysynx" value="{{$detail->fc_ysynx}}" class="form-control number fc_ysynx" placeholder="输入 已使用年限">
        </div>          
      </td>
    </tr>
    <tr>
      <td class=" control-label">规划用途</td>
      <td>
        <input type="text" id="fc_ghyt" name="fc_ghyt" value="{{$detail->fc_ghyt}}" class="form-control fc_ghyt" placeholder="输入 规划用途">
      </td>
      <td class=" control-label">当前用途</td>
      <td>
        <input type="text" id="fc_dqyt" name="fc_dqyt" value="{{$detail->fc_dqyt}}" class="form-control fc_dqyt" placeholder="输入 当前用途">
      </td>
    </tr>
    <tr>
      <td class=" control-label">是否有原租户</td>
      <td>
        <input type="text" id="fc_sfyyzh" name="fc_sfyyzh" value="{{$detail->fc_sfyyzh}}" class="form-control fc_sfyyzh" placeholder="输入 是否有原租户">
      </td>
      <td class=" control-label">原租户是否享有优先权</td>
      <td>
        <input type="text" id="fc_yzh_yxq" name="fc_yzh_yxq" value="{{$detail->fc_yzh_yxq}}" class="form-control fc_yzh_yxq" placeholder="输入 原租户是否享有优先权">
      </td>
    </tr>
    <tr>
      <td class=" control-label">建成时间</td>
      <td colspan="3">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
          <input type="text" id="fc_jcsj" name="fc_jcsj" value="{{$detail->fc_jcsj}}" class="form-control fc_jcsj" placeholder="输入 建成时间">
        </div>        
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
    <script>
    $(function () {
        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$detail->wtf_province}}",
          city: "{{$detail->wtf_city}}",
          district: "{{$detail->wtf_area}}"
        });
        $('#distpicker2').distpicker({
          autoSelect: false,
          province: "{{$detail->fc_province}}",
          city: "{{$detail->fc_city}}",
          district: "{{$detail->fc_area}}"
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
        $('.fc_jcsj').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.gpjg_zj').inputmask({"alias":"decimal","rightAlign":true});
        $('.gpjg_dj').inputmask({"alias":"decimal","rightAlign":true});
        $('.zlqx').inputmask({"alias":"decimal","rightAlign":true});
        $('.pgjz').inputmask({"alias":"decimal","rightAlign":true});
        $('.jjfd').inputmask({"alias":"decimal","rightAlign":true});
        $('.bzj').inputmask({"alias":"decimal","rightAlign":true});
        $('.fc_mj').inputmask({"alias":"decimal","rightAlign":true});

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
        $('#jymd').selecter({
          autoSelect: false,
          type: "jymd",
          selectvalue: "{{$detail->jymd}}"
        });
        $('#zclb').selecter({
          autoSelect: false,
          type: "zclb",
          selectvalue: "{{$detail->zclb}}"
        });

        //多选框
        $('#fbfses').checkbox({
          autoSelect: false,
          type: "fbfs",
          defaultvalue: "{{$detail->fbfs}}"
        });
    });
    </script>         
  </form>  