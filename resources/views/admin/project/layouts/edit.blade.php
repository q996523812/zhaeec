<style>
  .table tbody tr td{
      vertical-align: middle;
      border-bottom: 1px solid #e1e1e1;
      border-left: 1px solid #e1e1e1;
      border-right: 1px solid #e1e1e1;
      border-top: 1px solid #e1e1e1;
      border-collapse: collapse;
  }
  .table .control-label{
      color: #333332;
      background-color: #F8F8F8;
  }

</style>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active">
          <a href="#tab1" data-toggle="tab">
              基本信息
          </a>
      </li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
    </ul>

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="@yield('listurl')" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
        <!--基本信息-->
        <div class="tab-pane fade in active" id="tab1">
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
            <div class="box-body">
              <div class="fields-group">
                <div class="row">
                  @yield('content')
                  
                </div>                                                      
              </div>
            </div>
            <div>
              <input type="hidden" name="status" value="1" class="status">
              <input type="hidden" name="process" value="11" class="process">
              <input type="hidden" name="user_id" value="1" class="user_id">
              <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id">
              <input type="hidden" name="id" value="{{$detail->id}}" class="id">
              <input type="hidden" name="sjly" value="业务录入" class="sjly">
            </div>
            <div>
              {{csrf_field()}}
              <!--
              <input type="hidden" name="_token" value="WxIozf9zbV5hxfPDgouiISvPZSwu3Rm2Ig9YQBPi">
              
              <input type="hidden" name="_method" value="PUT" class="_method">
              <input type="hidden" name="_previous_" value="http://zhaeec.test/admin/projectpurchases" class="_previous_">
              -->
            </div>       
          </form>         
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
            <table class="table table-bordered">
              <tbody>
                @foreach($detail->files as $file)
                <tr>
                  <td> 
                    @if($file->type == 1)
                      委托方
                    @else
                      意向方
                    @endif

                  </td>
                  <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>


    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="/admin/projects/approval/{{$detail->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="operation" name="operation" value="通过">
          <input type="hidden" id="process" name="process" value="13">
          <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="哈哈哈">

          <div class="btn-group pull-right">
              <button type="submit" class="btn btn-primary btn-pass">提交</button>
          </div>
        </form>
      </div>

  </div>

</div>