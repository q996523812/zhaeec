@include('admin.image._style') 
</style>
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
      <li><a href="#tab4" data-toggle="tab">审批</a></li> 
    </ul>

    <div class="box-tools">
      @yield('buttons')
    </div>
  </div>
  <div class="box-body">
    <div id="myTabContent" class="tab-content">
        <!--基本信息-->
        <div class="tab-pane fade in active" id="tab1">
          @yield('content')        
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
          @include('admin.file._show') 
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab3">
          @include('admin.image._show')
        </div>

        <!--提交审批-->
        <div class="tab-pane fade" id="tab4">
          <form action="/admin/yxdj/confirm" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="approvalForm">
             {{ csrf_field() }}
            <input type="hidden" id="operation" name="operation" value="" class="operation" >
            <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}" class="project_id" >
            @yield('modelid')
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
                      <button type="submit" class="btn btn-primary btn-pass">确认登记</button>
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

  <script>
    $(document).ready(function(){
      $('.btn-pass').on('click', function () {
          $("#operation").val("确认登记");
          $("#approvalForm").submit();
          return false;
      });
      $('.btn-back').on('click', function () {
          $("#operation").val("审批退回");
          $("#approvalForm").submit();
          return false;
      });

    });
  </script>
</div>