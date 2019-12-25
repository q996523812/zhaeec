@include('admin.image._style') 
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border" style="height:50px;">

    <div class="box-tools" style="height:50px;">
      @include('admin.buttons._group')
    </div>

  </div>

  <div class="box-body">
    <div>
      <ul id="myTab" class="nav nav-tabs ">
        <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
        <li><a href="#tab2" data-toggle="tab">标的企业情况</a></li> 
        <li><a href="#tab3" data-toggle="tab">财务信息</a></li> 
        <li><a href="#tab4" data-toggle="tab">评估情况</a></li>
        <li><a href="#tab5" data-toggle="tab">转让方</a></li>
        <li><a href="#tab6" data-toggle="tab">监管信息</a></li>
        <li><a href="#tab7" data-toggle="tab">附件</a></li> 
        <li><a href="#tab8" data-toggle="tab">图片</a></li> 
        <li><a href="#tab9" data-toggle="tab">意向方</a></li> 
        <li><a href="#tab10" data-toggle="tab">操作记录</a></li> 
        <li><a href="#tab11" data-toggle="tab">通知单</a></li> 
        <li><a href="#tab12" data-toggle="tab">公告</a></li> 
      </ul>

    </div>
    <div id="myTabContent" class="tab-content">
        <!--基本信息-->
        <div class="tab-pane fade in active" id="tab1">
          @yield('content')        
        </div>
        <!--标的企业情况-->
        <div class="tab-pane fade" id="tab2">
          @include('admin.project.fsxx.bdqy._show') 
        </div>
        <!--财务信息-->
        <div class="tab-pane fade" id="tab3">
          @include('admin.project.fsxx.sjbg._show') 
          @include('admin.project.fsxx.cwbb._show') 
        </div>
        <!--评估情况-->
        <div class="tab-pane fade" id="tab4">
          @include('admin.project.fsxx.pgqk._show') 
        </div>
        <!--转让方-->
        <div class="tab-pane fade" id="tab5">
          @include('admin.project.fsxx.zrf._show') 
        </div>
        <!--监管信息-->
        <div class="tab-pane fade" id="tab6">
          @include('admin.project.fsxx.jgxx._show') 
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab7">
          @include('admin.file._show') 
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab8">
          @include('admin.image._show')
        </div>
        <!--意向方-->
        <div class="tab-pane fade" id="tab9">
          @include('admin.yxf.list._show')
        </div>
        <!--操作记录-->
        <div class="tab-pane fade" id="tab10">
          @include('admin.project.history._list')
        </div>
        <!--通知单-->
        <div class="tab-pane fade" id="tab11">
          
        </div>
        <!--公告-->
        <div class="tab-pane fade" id="tab12">
          
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
    $(function () {
      function noEdit(){
        $("input").attr("disabled","disabled");
        $("select").attr("disabled","disabled");
        $("textarea").attr("disabled","disabled");
      }
      noEdit();
    });
</script>