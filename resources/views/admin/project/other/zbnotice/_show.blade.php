<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <thead><th>中标通知书</th></thead>
      <tbody>
        <tr>
          <td class=" control-label">通知书编号</td>
          <td>
            <input type="text" id="tzsbh" name="tzsbh" value="{{$detail->tzsbh}}" class="form-control tzsbh" placeholder="输入 通知书编号">
          </td>
          <td class=" control-label">项目编号</td>
          <td>
            <input type="text" id="xmbh" name="xmbh" value="{{$detail->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号">
          </td>
        </tr>
        <tr>
          <td class=" control-label">标的名称</td>
          <td colspan="3">
            <input type="text" id="title" name="title" value="{{$detail->title}}" class="form-control title" placeholder="输入 标的名称">
          </td>
        </tr>
        <tr>
          <td class=" control-label">中标方</td>
          <td colspan="3">
            <input type="text" id="zbr" name="zbr" value="{{$detail->zbr}}" class="form-control zbr" placeholder="输入 中标方">
          </td>
        </tr>
        <tr>
          <td class=" control-label">中标方手机号码</td>
          <td colspan="3">
            <input type="text" id="zbf_phone" name="zbf_phone" value="{{$detail->zbf_phone}}" class="form-control zbf_phone" placeholder="输入 中标方手机号码">
          </td>
        </tr>
        <tr>
          <td class=" control-label">中标方类型</td>
          <td colspan="3">
              <div>
                <div class="col-sm-3">
                  <label class="sr-only" for="province">Province</label>
                  <select class="form-control" id="zbf_lx_1" name="zbf_lx_1"></select>
                </div>
                <div class="col-sm-3">
                  <label class="sr-only" for="city">City</label>
                  <select class="form-control" id="zbf_lx_2" name="zbf_lx_2"></select>
                </div>
              </div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">挂牌期限</td>
          <td>
            从<input type="text" id="found_date" name="found_date" value="{{$detail->found_date}}" class="form-control found_date" placeholder="输入 成立时间">
            到<input type="text" id="found_date" name="found_date" value="{{$detail->found_date}}" class="form-control found_date" placeholder="输入 成立时间">
          </td>
          <td class=" control-label">租赁期限</td>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" id="found_date" name="found_date" value="{{$detail->found_date}}" class="form-control found_date" placeholder="输入 成立时间">
            </div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易底价(万元)</td>
          <td colspan="3">
            <input type="text" id="jydj" name="jydj" value="{{$detail->jydj}}" class="form-control jydj" placeholder="输入 交易底价">
          </td>
        </tr>
        <tr>
          <td class=" control-label">成交总价(万元)</td>
          <td colspan="3">
            <input type="text" id="cjj_zj" name="cjj_zj" value="{{$detail->cjj_zj}}" class="form-control cjj_zj" placeholder="输入 成交总价">
          </td>
        </tr>
        <tr>
          <td class=" control-label">成交单价(万元)</td>
          <td colspan="3">
            <input type="text" id="cjj_dj" name="cjj_dj" value="{{$detail->cjj_dj}}" class="form-control cjj_dj" placeholder="输入 成交单价">
          </td>
        </tr>
        <!--
        <tr>
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                    <input type="text" id="registered_capital" name="registered_capital" value="{{$detail->registered_capital}}" class="form-control money registered_capital" placeholder="输入 注册资本">
                  </div>
                </div>
                <div class="col-sm-3">
                  <select id="registered_capital_currency" name="registered_capital_currency" class="form-control registered_capital_currency"></select>
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            <input type="text" id="legal_representative" name="legal_representative" value="{{$detail->legal_representative}}" class="form-control legal_representative" placeholder="输入 法定代表人">
          </td>
        </tr>
      -->
        <tr>
          <td class=" control-label">备注</td>
          <td colspan="3">
            <input type="text" id="cjj_bz" name="cjj_bz" value="{{$detail->cjj_bz}}" class="form-control cjj_bz" placeholder="输入 备注">
          </td>
        </tr>
        <tr>
          <td class=" control-label">成交日期</td>
          <td colspan="3">
            <input type="text" id="jysj" name="jysj" value="{{$detail->jysj}}" class="form-control jysj" placeholder="输入 成交日期">
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易方式</td>
          <td colspan="3">
            <select id="jyfs" name="jyfs" class="form-control jyfs"></select>
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易场地</td>
          <td colspan="3">
            <input type="text" id="jycd" name="jycd" value="{{$detail->jycd}}" class="form-control jycd" placeholder="输入 交易场地">
          </td>
        </tr>
        <tr>
          <td class=" control-label">中标方所属区域</td>
          <td colspan="3">
            <input type="text" id="scope" name="scope" value="{{$detail->scope}}" class="form-control scope" placeholder="输入 中标方所属区域">
          </td>
        </tr>

        <tr>
          <td class=" control-label">中标后要求</td>
          <td colspan="3">
            请受让(中标)方凭此通知书,在
            <input type="text" id="zbhyq" name="zbhyq" value="{{$detail->zbhyq}}" class="form-control zbhyq">
            <span class="red">*</span>
            个工作日内与转让(委托)方签订项目交易合同,并办理相关手续。
          </td>
        </tr>
        <tr>
          <td class=" control-label">本通知书份数</td>
          <td colspan="3">
            此中标通知书一式
            <input type="text" id="tzs_fs" name="tzs_fs" value="{{$detail->tzs_fs}}" class="form-control tzs_fs">
            <span class="red">*</span>
            份，
            转让(委托)方
            <input type="text" id="tzs_fs_1" name="tzs_fs_1" value="{{$detail->tzs_fs_1}}" class="form-control tzs_fs_1">
            <span class="red">*</span>
            份，
            受让(中标)方
            <input type="text" id="tzs_fs_2" name="tzs_fs_2" value="{{$detail->tzs_fs_2}}" class="form-control tzs_fs_2">
            <span class="red">*</span>
            份，
            珠海产权交易中心有限责任公司
            <input type="text" id="tzs_fs_3" name="tzs_fs_3" value="{{$detail->tzs_fs_3}}" class="form-control tzs_fs_3">
            <span class="red">*</span>
            份，
            其他
            <input type="text" id="tzs_fs_4" name="tzs_fs_4" value="{{$detail->tzs_fs_4}}" class="form-control tzs_fs_4">
            份。
          </td>
        </tr>

        <tr>
          <td class=" control-label">交易机构(盖章)及签发时间</td>
          <td colspan="3">
            <input type="text" id="issue_time" name="issue_time" value="{{$detail->issue_time}}" class="form-control issue_time">
          </td>
        </tr>
        

      </tbody>
    </table>
  </div>
</div>



</div>

</form>