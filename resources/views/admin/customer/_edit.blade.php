<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id" value="{{$customer->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="id">
    
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class=" control-label">客户类型</td>
          <td colspan="3">
            <select id="type" name="type" class="form-control type"></select>
          </td>
        </tr>
        
        <tr>
          <td class=" control-label">客户名称</td>
          <td colspan="3">
            <input type="text" id="name" name="name" value="{{$customer->name}}" class="form-control name" placeholder="输入 客户名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            <select id="certificate_type" name="certificate_type" class="form-control certificate_type"></select>
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            <input type="text" id="certificate_code" name="certificate_code" value="{{$customer->certificate_code}}" class="form-control certificate_code" placeholder="输入 证件号码">
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
                  <label class="sr-only" for="county" >District</label>
                  <select class="form-control" id="county" name="county"></select>
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属集团</td>
          <td colspan="3">
            <select class="form-control" id="ssjt" name="ssjt"></select>
          </td>
        </tr>
        
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td>
            <select id="sfgz" name="sfgz" class="form-control sfgz"></select>
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$customer->found_date}}" class="form-control date found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            <input type="text" id="address" name="address" value="{{$customer->address}}" class="form-control address" placeholder="输入 注册地址">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="funding" name="funding" value="{{$customer->funding}}" class="form-control money funding" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <select id="currency" name="currency" class="form-control"></select>
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="boss" name="boss" value="{{$customer->boss}}" class="form-control boss" placeholder="输入 法定代表人">
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
          <td class=" control-label">金融业分类</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <select id="financial_industry1" name="financial_industry1" class="form-control financial_industry1"></select>
                </div>
                <div class="col-sm-4">
                  <select id="financial_industry2" name="financial_industry2" class="form-control financial_industry2"></select>
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
            <input type="text" id="scope" name="scope" value="{{$customer->scope}}" class="form-control scope" placeholder="输入 经营范围">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            <input type="text" id="qualification" name="qualification" value="{{$customer->qualification}}" class="form-control qualification" placeholder="输入 主体资格证明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">内部决策情况</td>
          <td>
            <select id="inner_audit" name="inner_audit" class="form-control inner_audit"></select>
          </td>
          <td class=" control-label">内部决策情况说明</td>
          <td>
            <input type="text" id="inner_audit_desc" name="inner_audit_desc" value="{{$customer->inner_audit_desc}}" class="form-control inner_audit_desc" placeholder="输入 内部决策情况说明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">股东数量(个)</td>
          <td>
            <input type="text" id="Shareholder_num" name="Shareholder_num" value="{{$customer->Shareholder_num}}" class="form-control number Shareholder_num" placeholder="输入 股东数量">
          </td>
          <td class=" control-label">股份总数</td>
          <td>
            <input type="text" id="stock_num" name="stock_num" value="{{$customer->stock_num}}" class="form-control number stock_num" placeholder="输入 股份总数">
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            <input type="text" id="work_unit" name="work_unit" value="{{$customer->work_unit}}" class="form-control work_unit" placeholder="输入 工作单位">
          </td>
          <td class=" control-label">职务</td>
          <td>
            <input type="text" id="work_duty" name="work_duty" value="{{$customer->work_duty}}" class="form-control work_duty" placeholder="输入 职务">
          </td>
        </tr>
        <tr>
          <td class=" control-label">传真</td>
          <td>
            <input type="text" id="fax" name="fax" value="{{$customer->fax}}" class="form-control fax" placeholder="输入 传真">
          </td>
          <td class=" control-label">电话</td>
          <td>
            <input type="text" id="phone" name="phone" value="{{$customer->phone}}" class="form-control phone" placeholder="输入 电话">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮箱</td>
          <td colspan="3">
            <input type="text" id="email" name="email" value="{{$customer->email}}" class="form-control email" placeholder="输入 邮箱">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮寄地址</td>
          <td colspan="3">
            <input type="text" id="mailing_address" name="mailing_address" value="{{$customer->mailing_address}}" class="form-control mailing_address" placeholder="输入 邮寄地址">
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
          province: "{{$customer->province}}",
          city: "{{$customer->city}}",
          district: "{{$customer->county}}"
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
          selectvalue: "{{$customer->sfgz}}",
          savetype: 2
        });
        $('#currency').selecter({
          autoSelect: false,
          type: "currency",
          selectvalue: "{{$customer->currency}}"
        });
        $('#companytype').selecter({
          autoSelect: false,
          type: "companytype",
          selectvalue: "{{$customer->companytype}}"
        });
        $('#economytype').selecter({
          autoSelect: false,
          type: "economytype",
          selectvalue: "{{$customer->economytype}}"
        });
        $('#scale').selecter({
          autoSelect: false,
          type: "scale",
          selectvalue: "{{$customer->scale}}"
        });
        $('#ssjt').selecter({
          autoSelect: false,
          type: "ssjt",
          selectvalue: "{{$customer->ssjt}}"
        });

        $('#inner_audit').selecter({
          autoSelect: false,
          type: "innerAudit",
          selectvalue: "{{$customer->inner_audit}}"
        });

        //联动下拉框
        $('#type').selectunion({
          type: "customertype",
          selectvalue: "{{$customer->type}}",
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
          subselectvalue: "{{$customer->certificate_type}}",
          subsavetype: 1
          
        });
        
        $('#industry1').selectunion({
          type: "industry1",
          selectvalue: "{{$customer->industry1}}",
          savetype: 1,
          subid: 'industry2',
          subtype: "industry2",
          subselectvalue: "{{$customer->industry2}}",
          subsavetype: 1
          
        });
        $('#financial_industry1').selectunion({
          type: "finance_industry1",
          selectvalue: "{{$customer->financial_industry1}}",
          savetype: 1,
          subid: 'financial_industry2',
          subtype: "finance_industry2",
          subselectvalue: "{{$customer->financial_industry2}}",
          subsavetype: 1
          
        });

    });
    </script> 
</form>