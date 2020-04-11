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
        <th colspan="4">预披露项目信息公告表</th>
      </thead>  
      <tbody>

        <tr>
          <td class=" control-label" style="width:25%;">项目编号</td>
          <td colspan="3">
            <input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" readonly="true">
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目名称<font color="red">*</font></td>
          <td colspan="3">
            <input type="text" id="title" name="title" value="{{$detail->title}}" class="form-control title" placeholder="输入 项目名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">债权金额（万元）<font color="red">*</font></td>
          <td colspan="3">
            <input type="text" id="bidPrice" name="bidPrice" value="{{$detail->bidPrice}}" class="form-control money bidPrice" placeholder="输入 债权金额">
          </td>
        </tr>
        <tr>
          <td class=" control-label">转让底价（万元）</td>
          <td colspan="3">
            <input type="text" id="gpjg" name="gpjg" value="{{$detail->gpjg}}" class="form-control money gpjg" placeholder="输入 转让底价">
          </td>
        </tr>
        <tr>
          <td class=" control-label">拟转让比例（总）<font color="red">*</font></td>
          <td colspan="3">
            <input type="text" id="sellPercent" name="sellPercent" value="{{$detail->sellPercent}}" class="form-control number title" placeholder="输入 拟转让比例">
          </td>
        </tr>
        <tr>
          <td class=" control-label">拟转让股份数（总）</td>
          <td colspan="3">
            <input type="text" id="proExt1" name="proExt1" value="{{$detail->proExt1}}" class="form-control number" placeholder="输入 拟转让股份数">
          </td>
        </tr>
        <tr>
          <td class=" control-label">是否强制预披露<font color="red">*</font></td>
          <td colspan="3">
            <div class="col-md-3">
              <select id="sfqzypl" name="sfqzypl" class="form-control "></select>
            </div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">是否导致转让标的企业的实际控制权发生转移<font color="red">*</font></td>
          <td colspan="3">
            <div class="col-md-3">
              <select id="ifControlTrans" name="ifControlTrans" class="form-control"></select>
            </div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">合作机构信息</td>
          <td colspan="3">
            <textarea id="spare4" name="spare4" class="form-control spare4" rows="5" placeholder="输入 合作机构信息">{{$detail->bdgk}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">项目概述</td>
          <td colspan="3">
            <textarea id="proDesc" name="proDesc" class="form-control proDesc" rows="5" placeholder="输入 项目概述">{{$detail->bdgk}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">挂牌公告期<font color="red">*</font></td>
          <td colspan="2">
            <input type="text" id="pubDays" name="pubDays" value="{{$detail->pubDays}}" class="form-control number pubDays" placeholder="输入 挂牌公告期">
          </td>
          <td>(工作日)</td>
        </tr>
        <tr>
          <td class=" control-label">企业管理层是否参与受让</td>
          <td colspan="3">
            <div class="col-md-3"><select id="holderIn" name="holderIn" class="form-control"></select></div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">标的企业原股东是否放弃优先受让权</td>
          <td colspan="3">
            <div class="col-md-3"><select id="allowEndPrio" name="allowEndPrio" class="form-control"></select></div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">披露方式</td>
          <td colspan="3">
            <input type="text" id="announceWay" name="announceWay" value="{{$detail->announceWay}}" class="form-control announceWay" placeholder="输入 披露方式">
          </td>
        </tr>
        <tr>
          <td class=" control-label">披露媒体</td>
          <td colspan="3">
            <input type="text" id="announceMedia" name="announceMedia" value="{{$detail->announceMedia}}" class="form-control announceMedia" placeholder="输入 披露媒体">
          </td>
        </tr>
        <tr>
          <td class=" control-label">是否允许联合受让</td>
          <td colspan="3">
            <div class="col-md-3"><select id="unitTransferee" name="unitTransferee" class="form-control"></select></div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">是否允许网上报名</td>
          <td colspan="3">
            <div class="col-md-3"><select id="pub0" name="pub0" class="form-control"></select></div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">受让资格条件</td>
          <td colspan="3">
            <input type="text" id="buyConditions" name="buyConditions" value="{{$detail->buyConditions}}" class="form-control buyConditions" placeholder="输入 受让资格条件">
          </td>
        </tr>
        <tr>
          <td class=" control-label">价款支付方式</td>
          <td colspan="3">
            <input type="text" id="pubPayMode" name="pubPayMode" value="{{$detail->pubPayMode}}" class="form-control pubPayMode" placeholder="输入 价款支付方式">
          </td>
        </tr>
        <tr>
          <td class=" control-label">价款支付要求</td>
          <td colspan="3">
            <input type="text" id="payPeriodInfo" name="payPeriodInfo" value="{{$detail->payPeriodInfo}}" class="form-control payPeriodInfo" placeholder="输入 价款支付要求">
          </td>
        </tr>
        <tr>
          <td class=" control-label">重大事项及其他披露内容</td>
          <td colspan="3">
            <textarea id="important" name="important" class="form-control important" rows="5" placeholder="输入 重大事项及其他披露内容">{{$detail->important}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">与转让相关的其他条件</td>
          <td colspan="3">
            <textarea id="sellConditions" name="sellConditions" class="form-control sellConditions" rows="5" placeholder="输入 与转让相关的其他条件">{{$detail->sellConditions}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">保证内容</td>
          <td colspan="3">
            <textarea id="valueDesc" name="valueDesc" class="form-control valueDesc" rows="5" placeholder="输入 保证内容">{{$detail->valueDesc}}</textarea>
          </td>
        </tr>
        <tr>
          <td class=" control-label">处置方法</td>
          <td colspan="3">
            <textarea id="pubBailMemo" name="pubBailMemo" class="form-control pubBailMemo" rows="5" placeholder="输入 处置方法">{{$detail->pubBailMemo}}</textarea>
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

<div class="box-footer">
</div>

    <script>
    $(function () {
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
        $('#sfqzypl').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->sfqzypl}}",
          savetype:2
        });
        $('#holderIn').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->holderIn}}",
          savetype:2
        });
        $('#allowEndPrio').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->allowEndPrio}}",
          savetype:2
        });
        $('#unitTransferee').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->unitTransferee}}",
          savetype:2
        });
        $('#pub0').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->pub0}}",
          savetype:2
        });
        $('#ifControlTrans').selecter({
          autoSelect: false,
          type: "sf",
          selectvalue: "{{$detail->ifControlTrans}}",
          savetype:2
        });
        
    });
    </script>
</form>