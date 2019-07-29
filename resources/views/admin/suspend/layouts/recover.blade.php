@include('admin.project.image._list_style') 
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
      <li><a href="#tab4" data-toggle="tab">操作</a></li> 
    </ul>

    <div class="box-tools">

      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="@yield('printurl')/{{$project->detail_id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
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
          @yield('content')        
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
          <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formfiledel">
                {{ csrf_field() }}
                <input type="hidden" id= "fileid" name="fileid">
            <table id="fileslist" class="table table-bordered">
              <tbody>
                @foreach($suspend->files as $file)
                <tr id="{{$file->id}}">
                  <td><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>          
          </form>         
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab3">
        <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formimagedel">
                {{ csrf_field() }}
                <input type="hidden" id= "imageid" name="imageid">
          <div class="row clearfix">
            <div class="col-md-12 column">
              <div class="row" id="imageslist">               
                @foreach($suspend->images as $image)
                <div class="col-md-3 img" id="{{$image->id}}">                  
                  <div class="thumbnail">                    
                    <img alt="300x200" src="{{$image->path}}"/>
                  </div>
                </div> 
                @endforeach 
              </div>  
            </div>      
          </div>
          </form>

        </div>

        <!--提交审批-->
        <div class="tab-pane fade" id="tab4">
          <form action="/admin/suspends/submit/{{$project->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
            {{csrf_field()}}
            <input type="hidden" id="id" name="id" value="{{$suspend->id}}" class="id">

            <div class="btn-group pull-center">
                <button type="submit" class="btn btn-primary btn-pass">恢复挂牌</button>
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