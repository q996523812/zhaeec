<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$cjxx->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$cjxx->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
    <input type="hidden" id="charge_type" name="charge_type" class="charge_type">
    <input type="hidden" id="service_type" name="service_type" class="service_type">
    <input type="hidden" id="zbf_charge_rules_id" name="zbf_charge_rules_id" class="zbf_charge_rules_id">
    <input type="hidden" id="wtf_charge_rules_id" name="wtf_charge_rules_id" class="wtf_charge_rules_id">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标人</label>
  <div class="col-sm-8">
    <div class="input-group">
      
      <select id="intentional_parties_id" name="intentional_parties_id" class="form-control intentional_parties_id">
         @foreach($yxfs as $yxf)
         <option value="{{$yxf->id}}" data-tjrid="{{empty($yxf->customer)?'':$yxf->customer->id}}" data-tjrname="{{empty($yxf->customer)?'':$yxf->customer->name}}">{{$yxf->name}}</option>
         @endforeach
      </select>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格(总价)(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="price_total" name="price_total" value="{{$cjxx->price_total}}" class="form-control money price_total" placeholder="输入 总价">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格(单价)(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="price_unit" name="price_unit" value="{{$cjxx->price_unit}}" class="form-control money price_unit" placeholder="输入 单价">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格说明</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <input type="text" id="price_note" name="price_note" value="{{$cjxx->price_note}}" class="form-control price_note" placeholder="输入 成交价格说明">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-sm-2  control-label">成交时间</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="transaction_date" name="transaction_date" value="{{$cjxx->transaction_date}}" class="form-control transaction_date date" placeholder="输入 成交时间">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-sm-2  control-label">交易场地</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-text fa-fw"></i></span>
      <input type="text" id="jycd" name="jycd" value="{{$cjxx->jycd}}" class="form-control jycd" placeholder="输入 交易场地">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中心应收服务费(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="service_charge_receivable" name="service_charge_receivable" value="{{$cjxx->service_charge_receivable}}" class="form-control money service_charge_receivable" placeholder="输入 中心应收服务费" readonly="readoly">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方收费规则</label>
  <div class="col-sm-2">
    <div class="input-group">
      <select id="wtf_charge_type" name="wtf_charge_type" class="form-control">
      </select>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方应缴服务费(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="wtf_service_fee_payable" name="wtf_service_fee_payable" value="{{$cjxx->wtf_service_fee_payable}}" class="form-control money wtf_service_fee_payable" placeholder="输入 委托方应缴服务费">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方收费规则</label>
  <div class="col-sm-2">
    <div class="input-group">
      <select id="zbf_charge_type" name="zbf_charge_type" class="form-control">
      </select>
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方应缴服务费(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_service_fee_payable" name="zbf_service_fee_payable" value="{{$cjxx->zbf_service_fee_payable}}" class="form-control money zbf_service_fee_payable" placeholder="输入 委托方应缴服务费">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目推荐人</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="tjr" name="tjr" value="{{$cjxx->xmtjr->name}}" class="form-control" readonly="true">
      <input type="hidden" id="xm_tjr_id" name="xm_tjr_id" value="{{$cjxx->xmtjr->id}}">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目推荐人分配比例（%）</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="xm_tjr_allot_proportion" name="xm_tjr_allot_proportion" value="{{$cjxx->xm_tjr_allot_proportion}}" class="form-control money xm_tjr_allot_proportion" placeholder="输入 项目推荐人分配比例">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">项目推荐人分配金额(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="xm_tjr_allot_amount" name="xm_tjr_allot_amount" value="{{$cjxx->xm_tjr_allot_amount}}" class="form-control money xm_tjr_allot_amount" readonly="true">
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方推荐人</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_tjr_name" name="zbf_tjr_name" value="{{empty($cjxx->zbf_tjr_id)?'':$cjxx->zbftjr->name}}" class="form-control" readonly="true">
      <input type="hidden" id="zbf_tjr_id" name="zbf_tjr_id" value="{{$cjxx->zbf_tjr_id}}">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方推荐人分配比例（%）</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_tjr_allot_proportion" name="zbf_tjr_allot_proportion" value="{{$cjxx->zbf_tjr_allot_proportion}}" class="form-control money zbf_tjr_allot_proportion" placeholder="输入 中标方推荐人分配比例">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方推荐人分配金额(万元)</label>
  <div class="col-sm-8">
    <div class="input-group col-sm-4">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_tjr_allot_amount" name="zbf_tjr_allot_amount" value="{{$cjxx->zbf_tjr_allot_amount}}" class="form-control money zbf_tjr_allot_amount" readonly="true">
    </div>
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
    	/*
        //行政区划下拉框联动
        $("#distpicker1").distpicker({
          autoSelect: false,
          province: "{{$cjxx->wtf_province}}",
          city: "{{$cjxx->wtf_city}}",
          district: "{{$cjxx->wtf_area}}"
        });
*/
        //日期
        $('.transaction_date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        //下拉框
        $('#wtf_charge_type').selecter({
          autoSelect: false,
          type: "charge_type",
          selectvalue: "{{$cjxx->wtf_charge_type}}",
          savetype: 2
        });
        $('#zbf_charge_type').selecter({
          autoSelect: false,
          type: "charge_type",
          selectvalue: "{{$cjxx->zbf_charge_type}}",
          savetype: 2
        });

        //页面控制
        $("#zbf_charge_type").on('change',function(){
          if(this.value == 1){
            $("#zbf_service_fee_payable").attr("readonly","readonly");
            getCharge("zbf");
            
          }
          else if(this.value == 2){
            $("#zbf_service_fee_payable").removeAttr("readonly");
          }
          else{
            $("#zbf_service_fee_payable").attr("readonly","readonly");
            $("#zbf_service_fee_payable").val(0);
            $("#zbf_service_fee_payable").trigger("change");
          }
          $("#charge_type").val(this.value);
        });
        $("#wtf_charge_type").on('change',function(){
          if(this.value == 1){
            $("#wtf_service_fee_payable").attr("readonly","readonly");
            getCharge("wtf");
          }
          else if(this.value == 2){
            $("#wtf_service_fee_payable").removeAttr("readonly");
          }
          else{
            $("#wtf_service_fee_payable").attr("readonly","readonly");
            $("#wtf_service_fee_payable").val(0);
            $("#wtf_service_fee_payable").trigger("change");
          }
          $("#charge_type").val(this.value);
        });

        $("#price_total").on('blur',function(){
          if($("#wtf_charge_type").val() == 1 ){
            getCharge("wtf");
          }
          if($("#zbf_charge_type").val() == 1 ){
            getCharge("zbf");
          }
        });
        $("#price_unit").on('blur',function(){
          if($("#wtf_charge_type").val() == 1 ){
            getCharge("wtf");
          }
          if($("#zbf_charge_type").val() == 1 ){
            getCharge("zbf");
          }
        });


        //$('#zbf_charge_type').trigger("change");
        //$('#wtf_charge_type').trigger("change");

        /**
         *
         *@param type 类型 wtf、zbf
         */
        function getCharge(type){
          var param = new FormData($('#formdetail')[0]);
          // console.log(param);
          $.ajax({
            type : "post",
            url : "/admin/sfgz/getCharge",
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){
              console.log(str_reponse);
              $("#"+type+"_service_fee_payable").val(str_reponse.charge);
              $("#"+type+"_service_fee_payable").trigger("change");
              $("#"+type+"_charge_rules_id").val(str_reponse.rule_id)
            },
            error : function(XMLHttpRequest,err,e){
              console.log(XMLHttpRequest);
            }
          });
        }

        $("#zbf_service_fee_payable").on('change',function(){
          var zbf = $("#zbf_service_fee_payable").val();
          var wtf = $("#wtf_service_fee_payable").val();
          zbf = parseFloat(zbf);
          wtf = parseFloat(wtf);
          $("#service_charge_receivable").val(zbf+wtf);
        });
        $("#wtf_service_fee_payable").on('change',function(){
          var zbf = $("#zbf_service_fee_payable").val();
          var wtf = $("#wtf_service_fee_payable").val();
          zbf = parseFloat(zbf);
          wtf = parseFloat(wtf);
          $("#service_charge_receivable").val(zbf+wtf);
        });


        $('#intentional_parties_id').on('change',function(){
          $selecter = $(this).find('option:selected');
          $("#zbf_tjr_id").val($selecter.data('tjrid'));
          $("#zbf_tjr_name").val($selecter.data('tjrname'));
        });
        $('#intentional_parties_id').trigger('change');


        $('#zbf_tjr_allot_proportion').on('change',function(){
          var total = $('#service_charge_receivable').val();
          if(total == ''){
            total = 0;
          }
          $('#zbf_tjr_allot_amount').val(total*this.value/100);
        });
        $('#xm_tjr_allot_proportion').on('change',function(){
          var total = $('#service_charge_receivable').val();
          if(total == ''){
            total = 0;
          }
          $('#xm_tjr_allot_amount').val(total*this.value/100);
        });
    });
    </script> 
</form>