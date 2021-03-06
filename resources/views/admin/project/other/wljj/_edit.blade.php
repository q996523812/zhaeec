<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标人</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
      <select id="yxf_id" name="yxf_id" class="form-control yxf_id">
         @foreach($yxfs as $yxf)
         <option value="{{$yxf->id}}">{{$yxf->name}}</option>
         @endforeach
      </select>
    </div>
  </div>
</div>

<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格(总价)(万元)</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="price_total" name="price_total" value="{{$detail->price_total}}" class="form-control money price_total" placeholder="输入 总价">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格(单价)(万元)</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="price_unit" name="price_unit" value="{{$detail->price_unit}}" class="form-control money price_unit" placeholder="输入 单价">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交价格说明</label>
  <div class="col-sm-8">
    <div class="input-group">
      <input type="text" id="price_note" name="price_note" value="{{$detail->price_note}}" class="form-control money price_note" placeholder="输入 成交价格说明">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">成交时间</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="transaction_date" name="transaction_date" value="{{$detail->transaction_date}}" class="form-control transaction_date" placeholder="输入 成交时间">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中心应收服务费</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="service_charge_receivable" name="service_charge_receivable" value="{{$detail->service_charge_receivable}}" class="form-control money service_charge_receivable" placeholder="输入 中心应收服务费">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">委托方应缴服务费</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="wtf_service_fee_payable" name="wtf_service_fee_payable" value="{{$detail->wtf_service_fee_payable}}" class="form-control money wtf_service_fee_payable" placeholder="输入 委托方应缴服务费">
    </div>
  </div>
</div>
<div class="form-group  ">
  <label for="type" class="col-sm-2  control-label">中标方应缴服务费</label>
  <div class="col-sm-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
      <input type="text" id="zbf_service_fee_payable" name="zbf_service_fee_payable" value="{{$detail->zbf_service_fee_payable}}" class="form-control money zbf_service_fee_payable" placeholder="输入 中标方应缴服务费">
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
          province: "{{$detail->wtf_province}}",
          city: "{{$detail->wtf_city}}",
          district: "{{$detail->wtf_area}}"
        });
*/
        //日期
        $('.transaction_date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.price_total').inputmask({"alias":"decimal","rightAlign":true});
        $('.price_unit').inputmask({"alias":"decimal","rightAlign":true});

        //下拉框
        
    });
    </script> 
</form>