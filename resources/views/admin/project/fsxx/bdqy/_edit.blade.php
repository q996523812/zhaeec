
<form method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formBdqy">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$project->id}}">
      <input type="hidden" name="targetCompanyBaseInfo_id" id="targetCompanyBaseInfo_id" value="{{$bdqy->id}}">
      
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class=" control-label">客户类型</td>
          <td>
            <select id="type" name="type" class="form-control type"></select>
          </td>
          <td colspan="2"><a class="btn btn-primary" data-toggle="modal" data-target="#customerModal">导  入</a></td>
        </tr>
        <tr>
          <td class=" control-label">客户名称</td>
          <td colspan="3">
            <input type="text" id="name" name="name" value="{{$bdqy->name}}" class="form-control name readonly" placeholder="输入 客户名称" readonly>
          </td>
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            <input type="text" id="certificate_type" name="certificate_type" value="{{$bdqy->certificate_type}}" class="form-control certificate_type" placeholder="输入 证件类型">
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            <input type="text" id="certificate_code" name="certificate_code" value="{{$bdqy->certificate_code}}" class="form-control certificate_code" placeholder="输入 证件号码">
          </td>
        </tr>
        <tr>
          <td class=" control-label">所在地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <input type="text" id="province" name="province" value="{{$bdqy->province}}" class="form-control" >
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <input type="text" id="city" name="city" value="{{$bdqy->city}}" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="county" >District</label>
                  <input type="text" id="county" name="county" value="{{$bdqy->county}}" class="form-control">
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属集团</td>
          <td colspan="3">
            <input type="text" id="ssjt" name="ssjt" value="{{$bdqy->ssjt}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td>
            <select id="sfgz" name="sfgz" class="form-control"></select>
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$bdqy->found_date}}" class="form-control date found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            <input type="text" id="address" name="address" value="{{$bdqy->address}}" class="form-control address" placeholder="输入 注册地址">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="funding" name="funding" value="{{$bdqy->funding}}" class="form-control money funding" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <input type="text" id="currency" name="currency" value="{{$bdqy->currency}}" class="form-control">
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="boss" name="boss" value="{{$bdqy->boss}}" class="form-control boss" placeholder="输入 法定代表人">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属行业</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="industry1" name="industry1" value="{{$bdqy->industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="industry2" name="industry2" value="{{$bdqy->industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">金融业分类</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry1" name="financial_industry1" value="{{$bdqy->financial_industry1}}" class="form-control">
                </div>
                <div class="col-sm-4">
                  <input type="text" id="financial_industry2" name="financial_industry2" value="{{$bdqy->financial_industry2}}" class="form-control">
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">企业类型</td>
          <td>
            <input type="text" id="companytype" name="companytype" value="{{$bdqy->companytype}}" class="form-control">
          </td>
          <td class=" control-label">经济类型</td>
          <td>
            <input type="text" id="economytype" name="economytype" value="{{$bdqy->economytype}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营规模</td>
          <td colspan="3">
            <input type="text" id="scale" name="scale" value="{{$bdqy->scale}}" class="form-control">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营范围</td>
          <td colspan="3">
            <input type="text" id="scope" name="scope" value="{{$bdqy->scope}}" class="form-control scope" placeholder="输入 经营范围">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            <input type="text" id="credit_cer" name="credit_cer" value="{{$bdqy->credit_cer}}" class="form-control credit_cer" placeholder="输入 主体资格证明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">内部决策情况</td>
          <td>
            <input type="text" id="inner_audit" name="inner_audit" value="{{$bdqy->inner_audit}}" class="form-control">
          </td>
          <td class=" control-label">内部决策情况说明</td>
          <td>
            <input type="text" id="inner_audit_desc" name="inner_audit_desc" value="{{$bdqy->inner_audit_desc}}" class="form-control inner_audit_desc" placeholder="输入 内部决策情况说明">
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">股东数量(个)</td>
          <td>
            <input type="text" id="Shareholder_num" name="Shareholder_num" value="{{$bdqy->Shareholder_num}}" class="form-control number Shareholder_num" placeholder="输入 股东数量">
          </td>
          <td class=" control-label">股份总数</td>
          <td>
            <input type="text" id="stock_num" name="stock_num" value="{{$bdqy->stock_num}}" class="form-control number stock_num" placeholder="输入 股份总数">
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            <input type="text" id="work_unit" name="work_unit" value="{{$bdqy->work_unit}}" class="form-control work_unit" placeholder="输入 工作单位">
          </td>
          <td class=" control-label">职务</td>
          <td>
            <input type="text" id="work_duty" name="work_duty" value="{{$bdqy->work_duty}}" class="form-control work_duty" placeholder="输入 职务">
          </td>
        </tr>
        <tr>
          <td class=" control-label">传真</td>
          <td>
            <input type="text" id="fax" name="fax" value="{{$bdqy->fax}}" class="form-control fax" placeholder="输入 传真">
          </td>
          <td class=" control-label">电话</td>
          <td>
            <input type="text" id="phone" name="phone" value="{{$bdqy->phone}}" class="form-control phone" placeholder="输入 电话">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮箱</td>
          <td colspan="3">
            <input type="text" id="email" name="email" value="{{$bdqy->email}}" class="form-control email" placeholder="输入 邮箱">
          </td>
        </tr>
        <tr>
          <td class=" control-label">邮寄地址</td>
          <td colspan="3">
            <input type="text" id="mailing_address" name="mailing_address" value="{{$bdqy->mailing_address}}" class="form-control mailing_address" placeholder="输入 邮寄地址">
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>


<div class="form-group  ">
  <div class="col-md-8">
        <div class="btn-group pull-right">
            <button type="button" id="btnSaveBdqy" class="btn btn-primary btn-pass">保存</button>
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$bdqy->province}}",
          city: "{{$bdqy->city}}",
          district: "{{$bdqy->area}}"
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
          selectvalue: "{{$bdqy->sfgz}}",
          savetype: 2,
        });
        $('#registered_capital_currency').selecter({
          autoSelect: false,
          type: "currency",
          selectvalue: "{{$bdqy->registered_capital_currency}}"
        });
        $('#companytype').selecter({
          autoSelect: false,
          type: "companytype",
          selectvalue: "{{$bdqy->companytype}}"
        });
        $('#economytype').selecter({
          autoSelect: false,
          type: "economytype",
          selectvalue: "{{$bdqy->economytype}}"
        });
        $('#scale').selecter({
          autoSelect: false,
          type: "scale",
          selectvalue: "{{$bdqy->scale}}"
        });

        //联动下拉框
        $('#type').selectunion({
          type: "customertype",
          selectvalue: "{{$bdqy->type}}",
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
          subselectvalue: "{{$bdqy->certificate_type}}",
          subsavetype: 1,
          
        });
        $('#industry1').selectunion({
          type: "industry1",
          selectvalue: "{{$bdqy->industry1}}",
          savetype: 1,
          subid: 'industry2',
          subtype: "industry2",
          subselectvalue: "{{$bdqy->industry2}}",
          subsavetype: 1,
          
        });

        function readonly(){
          $('#formBdqy input').attr('readonly','true');
          $('#formBdqy select').attr('readonly','true');
        }
        readonly();

      $('#btnSaveBdqy').on('click', function () {
          $("button").attr("disabled","disabled");

          var url = "/admin/bdqy"
          if($("#targetCompanyBaseInfo_id").val()){
            url = url+"/update";
          }
          
          var param = new FormData($('#formBdqy')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              if(str_reponse.success == 'true'){
                alert("保存成功");
                if(!$("#targetCompanyBaseInfo_id").val()){
                  $("#targetCompanyBaseInfo_id").val(str_reponse.message.id);
                }
                $(".warning-message").html("");
              }
              else{
                alert("保存失败");
                $(".warning-message").html(str_reponse.message);
              }
              // $("#btnSaveBdqy").removeAttr("disabled");
              $("button").removeAttr("disabled");
            },
            error : function(XMLHttpRequest,err,e){console.log(XMLHttpRequest);
              alert("保存失败");
              $("button").removeAttr("disabled");
              //error(XMLHttpRequest);

            }
          });
      });
    });
    </script> 
</form>