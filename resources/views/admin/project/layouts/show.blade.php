@include('admin.image._style')
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
      <li><a href="#tab6" data-toggle="tab">成交信息</a></li>
      <li><a href="#tab7" data-toggle="tab">通知与公告</a></li>
    </ul>

    <div class="box-tools">
      @include('admin.buttons._group')
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
        <!--意向方-->
        <div class="tab-pane fade" id="tab4">
          @include('admin.yxf.list._show')
        </div>
        <!--操作记录-->
        <div class="tab-pane fade" id="tab5">
          @include('admin.project.history._list')
        </div>
        <!--成交信息-->
        <div class="tab-pane fade" id="tab6">
          @include('admin.cjxx._show')
        </div>
        <!--通知单-->
        <div class="tab-pane fade" id="tab7">
          @include('admin.project.layouts._notice')
        </div>

    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        
      </div>

  </div>

</div>