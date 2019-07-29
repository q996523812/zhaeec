@include('admin.project.image._list_style') 
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
      <li><a href="#tab4" data-toggle="tab">意向方</a></li>
      <li><a href="#tab5" data-toggle="tab">操作记录</a></li>
      <li><a href="#tab6" data-toggle="tab">通知单</a></li>
      <li><a href="#tab7" data-toggle="tab">公告</a></li> 
      <li class="active"><a href="#tab8" data-toggle="tab">审批</a></li>  
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
        <div class="tab-pane fade" id="tab1">
          @yield('content')        
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
          @include('admin.project.file._show') 
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab3">
          @include('admin.project.image._show')
        </div>
        <!--意向方-->
        <div class="tab-pane fade" id="tab4">
          @include('admin.project.yxf._list')
        </div>
        <!--操作记录-->
        <div class="tab-pane fade" id="tab5">
          @include('admin.project.history._list')
        </div>
        <!--通知单-->
        <div class="tab-pane fade" id="tab6">
          
        </div>
        <!--公告-->
        <div class="tab-pane fade" id="tab7">
          
        </div>

        <!--审批-->
        <div class="tab-pane fade in active" id="tab8">
          <form action="/admin/projects/approval/{{$detail->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
            <input type="hidden" id="operation" name="operation" value="" class="operation" >
            <div class="box-body">
              <div class="fields-group">
                <div class="row">
                  <div class="col-md-8">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>                    
                          <input type="text" id="reason" name="reason" value="" class="form-control title" placeholder="输入退回理由">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-primary btn-pass">通过</button>
                      <button type="submit" class="btn btn-primary btn-back">退回</button>
                    </div>
                  </div>
                </div>                                               
              </div>
            </div>         
          </form>         
        </div>


    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       
      </div>

  </div>
</div>
  <script>
    $(document).ready(function(){
      $('.btn-pass').on('click', function () {
          $("#operation").val("审批通过");
          $(".form-horizontal").submit();
          return false;
      });
      $('.btn-back').on('click', function () {
          $("#operation").val("审批退回");
          $(".form-horizontal").submit();
          return false;
      });

    });
  </script>