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
            <div id="customertype"></div>
          </td>
        </tr>
        <tr>
          <td class=" control-label">客户名称</td>
          <td colspan="3">
            {{$yxf->name}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">证件类型</td>
          <td>
            {{$yxf->id_type}}
          </td>
          <td class=" control-label">证件号码</td>
          <td>
            {{$yxf->id_code}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">所在地区</td>
          <td colspan="3">
              <div id="distpicker1">
                <div class="col-sm-3">
                  {{$yxf->province}}
                </div>
                <div class="col-sm-3">
                  {{$yxf->city}}
                </div>
                <div class="col-sm-3">
                  {{$yxf->area}}
                </div>
              </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">是否国资</td>
          <td id="isgz">
          </td>
          <td class=" control-label">成立时间</td>
          <td>
            {{$yxf->found_date}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册地址</td>
          <td colspan="3">
            {{$yxf->registered_address}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">注册资本（万元）</td>
          <td>
            <div>
                <div class="col-sm-6">
                  {{$yxf->registered_capital}}
                </div>
                <div class="col-sm-3">
                  {{$yxf->registered_capital_currency}}
                </div>
            </div>
          </td>
          <td class=" control-label">法定代表人</td>
          <td>
            {{$yxf->legal_representative}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">所属行业</td>
          <td colspan="3">
            <div>
                <div class="col-sm-4">
                  {{$yxf->industry1}}
                </div>
                <div class="col-sm-4">
                  {{$yxf->industry2}}
                </div>
            </div>
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">企业类型</td>
          <td>
            {{$yxf->companytype}}
          </td>
          <td class=" control-label">经济类型</td>
          <td>
            {{$yxf->economytype}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营规模</td>
          <td colspan="3">
            {{$yxf->scale}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">经营范围</td>
          <td colspan="3">
            {{$yxf->scope}}
          </td>
        </tr>
        <tr class="company">
          <td class=" control-label">主体资格证明</td>
          <td colspan="3">
            {{$yxf->credit_cer}}
          </td>
        </tr>
        <tr class="person">
          <td class=" control-label">工作单位</td>
          <td>
            {{$yxf->work_unit}}
          </td>
          <td class=" control-label">职务</td>
          <td>
            {{$yxf->work_duty}}
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>


</div>
<script>
    $(document).ready(function(){
        page_show();
        function page_show(){
          $('#customertype').html(select_datas['customertype']['{{$yxf->customertype}}']);
          if('{{$yxf->sfgz}}'){
            $('#sfgz').html(select_datas['sf']['{{$yxf->sfgz}}']);
          }
          
            if({{$yxf->customertype}} ==1){
              $('.company').hide();
              $('.person').show();
            }
            else{
              $('.company').show();
              $('.person').hide();
            }
        }
    });
</script> 
</form>