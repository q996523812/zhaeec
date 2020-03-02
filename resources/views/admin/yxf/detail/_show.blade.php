<!--
<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$yxf->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$yxf->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class=" control-label">意向方类型</td>
          <td colspan="3">
            <select id="customertype" name="customertype" class="form-control customertype"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">客户名称</td>
          <td colspan="3">
            <input type="text" id="name" name="name" value="{{$yxf->name}}" class="form-control name" placeholder="输入 客户名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            <select id="id_type" name="id_type" class="form-control id_type"></select>
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            <input type="text" id="id_code" name="id_code" value="{{$yxf->id_code}}" class="form-control id_code" placeholder="输入 证件号码">
          </td>
        </tr>
        <tr>
          <td class=" control-label">所在地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <select class="form-control" id="province" name="province"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <select class="form-control" id="city" name="city"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="area" >District</label>
                  <select class="form-control" id="area" name="area"></select>
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td>
            <select id="isgz" name="isgz" class="form-control isgz"></select>
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$yxf->found_date}}" class="form-control found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            <input type="text" id="registered_address" name="registered_address" value="{{$yxf->registered_address}}" class="form-control registered_address" placeholder="输入 注册地址">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="registered_capital" name="registered_capital" value="{{$yxf->registered_capital}}" class="form-control money registered_capital" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <select id="registered_capital_currency" name="registered_capital_currency" class="form-control registered_capital_currency"></select>
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="legal_representative" name="legal_representative" value="{{$yxf->legal_representative}}" class="form-control legal_representative" placeholder="输入 法定代表人">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属行业</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <select id="industry1" name="industry1" class="form-control industry1"></select>
                </div>
                <div class="col-sm-4">
                  <select id="industry2" name="industry2" class="form-control industry2"></select>
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">企业类型</td>
          <td>
            <select id="companytype" name="companytype" class="form-control companytype"></select>
          </td>
          <td class=" control-label">经济类型</td>
          <td>
            <select id="economytype" name="economytype" class="form-control economytype"></select>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营规模</td>
          <td colspan="3">
            <select id="scale" name="scale" class="form-control scale"></select>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营范围</td>
          <td colspan="3">
            <input type="text" id="scope" name="scope" value="{{$yxf->scope}}" class="form-control scope" placeholder="输入 经营范围">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            <input type="text" id="credit_cer" name="credit_cer" value="{{$yxf->credit_cer}}" class="form-control credit_cer" placeholder="输入 主体资格证明">
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            <input type="text" id="work_unit" name="work_unit" value="{{$yxf->work_unit}}" class="form-control work_unit" placeholder="输入 工作单位">
          </td>
          <td class=" control-label">职务</td>
          <td>
            <input type="text" id="work_duty" name="work_duty" value="{{$yxf->work_duty}}" class="form-control work_duty" placeholder="输入 职务">
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>


<div class="form-group  ">
  <div class="col-md-8">
        <div class="btn-group pull-right">
            <button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$yxf->province}}",
          city: "{{$yxf->city}}",
          district: "{{$yxf->area}}"
        });

        //日期
        $('.found_date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.registered_capital').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#isgz').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$yxf->isgz}}",
          savetype: 2,
        });
        $('#registered_capital_currency').selecter({
          autoSelect: false,
          type: "currency",
          selectvalue: "{{$yxf->registered_capital_currency}}"
        });
        $('#companytype').selecter({
          autoSelect: false,
          type: "companytype",
          selectvalue: "{{$yxf->companytype}}"
        });
        $('#economytype').selecter({
          autoSelect: false,
          type: "economytype",
          selectvalue: "{{$yxf->economytype}}"
        });
        $('#scale').selecter({
          autoSelect: false,
          type: "scale",
          selectvalue: "{{$yxf->scale}}"
        });

        //联动下拉框
        $('#customertype').selectunion({
          type: "customertype",
          selectvalue: "{{$yxf->customertype}}",
          savetype: 2,
          selectchange: function(){
            if($('#customertype').find(':selected').data('code')==1){
              $('.company').hide();
              $('.person').show();
            }
            else{
              $('.company').show();
              $('.person').hide();
            }
          },
          subid: 'id_type',
          subtype: "id_type",
          subselectvalue: "{{$yxf->id_type}}",
          subsavetype: 1,
          
        });
        $('#industry1').selectunion({
          type: "industry1",
          selectvalue: "{{$yxf->industry1}}",
          savetype: 1,
          subid: 'industry2',
          subtype: "industry2",
          subselectvalue: "{{$yxf->industry2}}",
          subsavetype: 1,
          
        });

    });
    </script> 
</form>
-->

<form method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
          {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$yxf->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$yxf->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class=" control-label">意向方类型</td>
          <td colspan="3">
            <select id="type" name="type" class="form-control type"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">客户名称</td>
          <td colspan="2">
            <input type="text" id="name" name="name" value="{{$yxf->name}}" class="form-control name" placeholder="输入 客户名称" >
          </td>
          <td><a class="btn btn-primary" data-toggle="modal" data-target="#customerModal">导  入</a></td>
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            <input type="text" id="certificate_type" name="certificate_type" value="{{$yxf->certificate_type}}" class="form-control certificate_type" placeholder="输入 证件类型">
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            <input type="text" id="certificate_code" name="certificate_code" value="{{$yxf->certificate_code}}" class="form-control certificate_code" placeholder="输入 证件号码">
          </td>
        </tr>
        <tr>
          <td class=" control-label">所在地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <input type="text" id="province" name="province" value="{{$yxf->province}}" class="form-control" >
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <input type="text" id="city" name="city" value="{{$yxf->city}}" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="county" >District</label>
                  <input type="text" id="county" name="county" value="{{$yxf->county}}" class="form-control">
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属集团</td>
          <td colspan="3">
            <input type="text" id="ssjt" name="ssjt" value="{{$yxf->ssjt}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td>
            <input type="text" id="sfgz" name="sfgz" value="{{$yxf->sfgz}}" class="form-control">
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$yxf->found_date}}" class="form-control date found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            <input type="text" id="address" name="address" value="{{$yxf->address}}" class="form-control address" placeholder="输入 注册地址">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="funding" name="funding" value="{{$yxf->funding}}" class="form-control money funding" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <input type="text" id="currency" name="currency" value="{{$yxf->currency}}" class="form-control">
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="boss" name="boss" value="{{$yxf->boss}}" class="form-control boss" placeholder="输入 法定代表人">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属行业</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="industry1" name="industry1" value="{{$yxf->industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="industry2" name="industry2" value="{{$yxf->industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">金融业分类</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry1" name="financial_industry1" value="{{$yxf->financial_industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry2" name="financial_industry2" value="{{$yxf->financial_industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">企业类型</td>
          <td>
            <input type="text" id="companytype" name="companytype" value="{{$yxf->companytype}}" class="form-control">
          </td>
          <td class=" control-label">经济类型</td>
          <td>
            <input type="text" id="economytype" name="economytype" value="{{$yxf->economytype}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营规模</td>
          <td colspan="3">
            <input type="text" id="scale" name="scale" value="{{$yxf->scale}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营范围</td>
          <td colspan="3">
            <input type="text" id="scope" name="scope" value="{{$yxf->scope}}" class="form-control scope" placeholder="输入 经营范围">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            <input type="text" id="credit_cer" name="credit_cer" value="{{$yxf->credit_cer}}" class="form-control credit_cer" placeholder="输入 主体资格证明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">内部决策情况</td>
          <td>
            <input type="text" id="inner_audit" name="inner_audit" value="{{$yxf->inner_audit}}" class="form-control">
          </td>
          <td class=" control-label">内部决策情况说明</td>
          <td>
            <input type="text" id="inner_audit_desc" name="inner_audit_desc" value="{{$yxf->inner_audit_desc}}" class="form-control inner_audit_desc" placeholder="输入 内部决策情况说明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">股东数量(个)</td>
          <td>
            <input type="text" id="Shareholder_num" name="Shareholder_num" value="{{$yxf->Shareholder_num}}" class="form-control number Shareholder_num" placeholder="输入 股东数量">
          </td>
          <td class=" control-label">股份总数</td>
          <td>
            <input type="text" id="stock_num" name="stock_num" value="{{$yxf->stock_num}}" class="form-control number stock_num" placeholder="输入 股份总数">
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            <input type="text" id="work_unit" name="work_unit" value="{{$yxf->work_unit}}" class="form-control work_unit" placeholder="输入 工作单位">
          </td>
          <td class=" control-label">职务</td>
          <td>
            <input type="text" id="work_duty" name="work_duty" value="{{$yxf->work_duty}}" class="form-control work_duty" placeholder="输入 职务">
          </td>
        </tr>
        <tr>
          <td class=" control-label">传真</td>
          <td>
            <input type="text" id="fax" name="fax" value="{{$yxf->fax}}" class="form-control fax" placeholder="输入 传真">
          </td>
          <td class=" control-label">电话</td>
          <td>
            <input type="text" id="phone" name="phone" value="{{$yxf->phone}}" class="form-control phone" placeholder="输入 电话">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮箱</td>
          <td colspan="3">
            <input type="text" id="email" name="email" value="{{$yxf->email}}" class="form-control email" placeholder="输入 邮箱">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮寄地址</td>
          <td colspan="3">
            <input type="text" id="mailing_address" name="mailing_address" value="{{$yxf->mailing_address}}" class="form-control mailing_address" placeholder="输入 邮寄地址">
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>


</div>
<script>
    $(function () {

        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$yxf->province}}",
          city: "{{$yxf->city}}",
          district: "{{$yxf->area}}"
        });

        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        $('.number').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        $('#sfgz').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$yxf->sfgz}}",
          savetype: 2,
        });
        $('#registered_capital_currency').selecter({
          autoSelect: false,
          type: "currency",
          selectvalue: "{{$yxf->registered_capital_currency}}"
        });
        $('#companytype').selecter({
          autoSelect: false,
          type: "companytype",
          selectvalue: "{{$yxf->companytype}}"
        });
        $('#economytype').selecter({
          autoSelect: false,
          type: "economytype",
          selectvalue: "{{$yxf->economytype}}"
        });
        $('#scale').selecter({
          autoSelect: false,
          type: "scale",
          selectvalue: "{{$yxf->scale}}"
        });

        //联动下拉框
        $('#type').selectunion({
          type: "customertype",
          selectvalue: "{{$yxf->type}}",
          savetype: 2,
          selectchange: function(){
            if($('#type').find(':selected').data('code')==1){
              $('.company').hide();
              $('.person').show();
            }
            else{
              $('.company').show();
              $('.person').hide();
            }
          },
          subid: 'certificate_type',
          subtype: "id_type",
          subselectvalue: "{{$yxf->certificate_type}}",
          subsavetype: 1,
          
        });
        $('#industry1').selectunion({
          type: "industry1",
          selectvalue: "{{$yxf->industry1}}",
          savetype: 1,
          subid: 'industry2',
          subtype: "industry2",
          subselectvalue: "{{$yxf->industry2}}",
          subsavetype: 1,
          
        });

        $('#formdetail input').attr('readonly','true');
        $('#formdetail select').attr('readonly','true');
        $('#formdetail textarea').attr('readonly','true');
    });
    </script> 
</form>