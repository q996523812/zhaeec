@include('admin.image._style') 
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
      <li class="active"><a href="#tab8" data-toggle="tab">审批</a></li>  
    </ul>

    <div class="box-tools">
      @include('admin.buttons._print')
      @include('admin.buttons._list')
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
          @include('admin.file._show') 
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab3">
          @include('admin.image._show')
        </div>

        <!--审批-->
        <div class="tab-pane fade in active" id="tab8">
          <form action="@yield('approvalurl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="approvalForm">
            <input type="hidden" id="operation" name="operation" value="" class="operation" >
            <input type="hidden" id="isNext" name="isNext" value="" class="isNext" >
            <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id" >
            <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id" >
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
          $("#isNext").val(2);
          $("#approvalForm").submit();
          return false;
      });
      $('.btn-back').on('click', function () {
          $("#operation").val("审批退回");
          $("#isNext").val(1);
          $("#approvalForm").submit();
          return false;
      });

    });
  </script>