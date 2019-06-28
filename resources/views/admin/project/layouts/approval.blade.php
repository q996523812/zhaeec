<style>
.img{
  height:200px;
  margin-top:20px;
}
.img .thumbnail{
  height:100%;
}
.img .thumbnail img {
  display:block;
  position:absolute;
  height:100%;
  top:0px;
  right:0px;
  left:0px;  
}
.btn-pass{
  margin-right:10px;
}
</style>
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
      <li><a href="#tab4" data-toggle="tab">意向方</a></li>
      <li><a href="#tab5" data-toggle="tab">操作记录</a></li>  
    </ul>

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="@yield('printurl')/{{$detail->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
      </div>
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="@yield('listurl')" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
        <!--基本信息-->
        <div class="tab-pane fade in active" id="tab1">
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
            <div class="box-body">
              <div class="fields-group">
                <div class="row">
                  @yield('content')
                </div>                                               
              </div>
            </div>         
          </form>         
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <table class="table table-bordered">
                <tbody>
                  @foreach($detail->files as $file)
                  <tr>
                    <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab3">
          <div class="row clearfix">
            <div class="col-md-12 column">
              <div class="row" id="imageslist">               
                @foreach($detail->images as $image)
                <div class="col-md-3 img" id="{{$image->id}}">                  
                  <div class="thumbnail">                    
                    <img alt="300x200" src="{{$image->path}}"/>
                  </div>
                </div> 
                @endforeach 
              </div>  
            </div>      
          </div>

        </div>

        <!--意向方-->
        <div class="tab-pane fade" id="tab4">
          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <table class="table table-bordered">
                <thead>
                  <th>名称</th>
                  <th>保证金</th>
                  <th>是否缴纳保证金</th>
                  <th>是否确认报名</th>
                </thead>
                <tbody>
                  
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--操作记录-->
        <div class="tab-pane fade" id="tab5">
          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <table class="table table-bordered">
                <thead>
                  <th>操作时间</th>
                  <th>流程节点</th>
                  <th>操作类型</th>
                  <th>备注</th>
                  <th>操作人</th>
                </thead>
                <tbody>
                  @foreach($detail->project->workProcessRecords as $record)
                  <tr>
                    <td>{{$record->created_at}}</td>
                    <td>{{$record->work_process_node_name}}</td>
                    <td>{{$record->operation}}</td>
                    <td>{{$record->reason}}</td>
                    <td>{{$record->user_id}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="/admin/projects/approval/{{$detail->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="operation" name="operation" value="通过">
          <input type="hidden" id="process" name="process" value="{{$detail->process}}">
          <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="">
          
          <div>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
                  <input type="text" id="reason" name="reason" value="" class="form-control title" placeholder="输入退回理由">
              </div>
          </div>
          <div class="btn-group pull-right">
              <button type="submit" class="btn btn-primary btn-pass">通过</button>
              <button type="submit" class="btn btn-primary btn-back">退回</button>
          </div>
        </form>
      </div>
      <script>
        $(document).ready(function(){
          $('.btn-pass').on('click', function () {
              $("#operation").val("通过");
              $(".form-horizontal").submit();
              return false;
          });
          $('.btn-back').on('click', function () {
              $("#operation").val("退回");
              $(".form-horizontal").submit();
              return false;
          });

        });
      </script>
  </div>
</div>