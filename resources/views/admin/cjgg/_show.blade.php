<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    
    <input type="hidden" id="project_id" name="project_id" value="{{$cjgg->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$cjgg->id}}" class="id">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table" >
    <table class="table table-bordered" style="width:60%;margin: auto;">
      <tbody>
        <tr>
          <td class=" control-label">项目编号</td>
          <td>
            {{$cjgg->xmbh}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">标的名称</td>
          <td>
            {{$cjgg->title}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">委托方</td>
          <td>
            {{$cjgg->wtf}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">中标方</td>
          <td>
            {{$cjgg->zbf}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">成交价格(万元)</td>
          <td>
              {{$cjgg->price}}
          </td>
        </tr>
        <tr>
          <td class=" control-label">交易方式</td>
          <td>
            {{$cjgg->jyfs}}
          </td>
        </tr>
        <tr class="zczl">
          <td class=" control-label">交易日期</td>
          <td>
            {{$cjgg->jy_date}}
          </td>
        </tr>
        <tr class="zczl">
          <td class=" control-label">交易场地</td>
          <td>
            {{$cjgg->jycd}}
          </td>
        </tr>
        <tr class="zczl">
          <td class=" control-label">公示内容</td>
          <td>
            {{$cjgg->gsnr}}
          </td>
        </tr>
        <tr class="zczl">
          <td class=" control-label">发布日期</td>
          <td>
            {{$cjgg->fb_date}}
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>


</div>

</form>