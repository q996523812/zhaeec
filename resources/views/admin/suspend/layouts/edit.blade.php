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
.img .thumbnail a {
  display:block;
  position:absolute;
  top:0px;
  right:15px;
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
      <li><a href="#tab4" data-toggle="tab">审批</a></li> 
    </ul>

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/{{$projecttype}}/copy/{{$project->detail_id}}" class="btn btn-sm btn-default btn-copy"><i class="fa fa-copy"></i> 复制项目</a>
      </div>
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
                  <td><a href="javascript:void(0);" class="btnDelFile" data="{{$file->id}}">删除</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          
          </form>
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formfile">
            <div class="fields-group">
              <div class="row">
                <div class="container table-responsive col-md-12 align-items-center"> 
                  <div class="col-md-8">
                    <input type="hidden" name="project_id" value="{{$project->id}}" class="project_id form-control">
                    {{csrf_field()}}
                  </div>           
                  <div class="col-md-8">
                    <div class=" ">
                      <label for="name" class=" control-label">附件名称</label>
                      <div class="">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                          <input type="text" id="name" name="name" value="" class="form-control name" placeholder="输入 附件名称">
                        </div>        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class=" ">
                      <label for="file" class=" control-label">选择文件</label>
                      <div class="">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                          <input type="file" id="file" name="file" value="" class="form-control file" >
                        </div>        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="btn-group pull-right">
                      <button type="button" id="btnSaveFile" class="btn btn-primary btn-pass">保存</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
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
                    <a href="#close" class="remove label label-danger" data="{{$image->id}}">
                      <i class="glyphicon glyphicon-remove"></i>删除
                    </a>
                  </div>
                </div> 
                @endforeach 
              </div>  
            </div>      
          </div>
          </form>
          <div>
            <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formimage">
              <div class="fields-group">
                <div class="row">
                  <div class="container table-responsive col-md-12 align-items-center"> 
                    <div class="col-md-8">
                      <input type="hidden" name="project_id" value="{{$project->project_id}}" class="project_id form-control">
                      {{csrf_field()}}
                    </div>           
                    
                    <div class="col-md-8">
                      <div class=" ">
                        <label for="image" class=" control-label">选择图片</label>
                        <div class="">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                            <input type="file" id="image" name="image" value="" class="form-control image" >
                          </div>        
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="btn-group pull-right">
                        <button type="button" id="btnSaveImage" class="btn btn-primary btn-pass">保存</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </form>            
          </div>

        </div>

        <!--提交审批-->
        <div class="tab-pane fade" id="tab4">
          <form action="/admin/{{$projecttype}}/submit/{{$project->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
            {{csrf_field()}}
            <input type="hidden" id="operation" name="operation" value="通过">
            <input type="hidden" id="process" name="process" value="13">
            <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="">

            <div class="btn-group pull-center">
                <button type="submit" class="btn btn-primary btn-pass">提交</button>
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

@yield('script')
<script>
    $(document).ready(function(){
      function getFormToJson(){
        var data = {};
        $("#formdetail input").each(function(i){
          var code = $(this).attr("name");
          var value = this.value;
          data[code] = value;
        });
        $("#formdetail textarea").each(function(i){
          var code = $(this).attr("name");
          var value = this.value;
          data[code] = value;
        });
        $("#formdetail select").each(function(i){
          var code = $(this).attr("name");
          var value = this.value;
          data[code] = value;
        });
        return data;
      }
      function show_warning(message){
        var html = "";
        html = "<div class='alert alert-warning alert-dismissable'>";
        html += message;
        html += '<\/div>';
        $(".warning-message").html(html);
      }

      $('#btnSaveData').on('click', function () {
          $("button").attr("disabled","disabled");
          // var projecttype = "@yield('projecttype')";
          var projecttype = $("#projecttype").val();
          var url = "/admin/suspends";
          // var url = "/api/zczl/create";
          if($("#id").val()){
            url = url+"/update";
          }
          var param = getFormToJson();
          $.ajax({
            type : "post",
            url : url,
            data : param,
            success : function(str_reponse){
              alert("保存成功");
              if(!$("#id").val()){
                $(".id").val(str_reponse.detail_id);
                $(".project_id").val(str_reponse.project_id);
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              error(XMLHttpRequest);
            }
          });
      });

      $('.btnDelFile').on('click', function () {
        var id = $(this).attr("data");
        var _token = $("#formfiledel [name='_token']").val();       
        var url = "/admin/files/destroy";
        // var param = {"id":id,"fileid":id,"_token":_token};
        
        $("#fileid").val(id);
        var param = new FormData($('#formfiledel')[0]);
        // param.id = id;
        console.log(param.fileid);
        var saveSuccess = function(){
          $("#"+id).remove();
        }
        // saveFileOrImage(url,param,function(file){

        // });
        $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(str_reponse){
              console.log(111);
              console.log(str_reponse);
              alert("保存成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess();
            },
            error : function(XMLHttpRequest,err,e){
              console.log(222);
              console.log(XMLHttpRequest);
              error(XMLHttpRequest);
            }
        });
      });
      $('.remove').on('click', function () {
        var id = $(this).attr("data");
        var _token = $("#formimagedel [name='_token']").val();       
        var url = "/admin/images/destroy";
        // var param = {"id":id,"fileid":id,"_token":_token};       
        $("#imageid").val(id);
        var param = new FormData($('#formimagedel')[0]);
        console.log(param);
        var saveSuccess = function(){
          $("#"+id).remove();
        }
        $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(str_reponse){
              console.log(111);
              console.log(str_reponse);
              alert("保存成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess();
            },
            error : function(XMLHttpRequest,err,e){
              console.log(222);
              console.log(XMLHttpRequest);
              error(XMLHttpRequest);
            }
        });       
      });
      $('#btnSaveFile').on('click', function () {
        if(!$("#id").val()){
          alert("请先保存基本信息");
          return false;
        }
        var url = "/admin/files/store";
        // var url = "/api/zczl/create";
        var param = new FormData($('#formfile')[0]);
        saveFileOrImage(url,param,function(file){
          var row = "<tr>"
            +'<td><a href='+file.path+'>'+file.name+'<\/a><\/td>'
            +'<td><a href="javascript:void(0);" class="btnDelFile" data="'+file.id+'">删除<\/a><\/td>'
          +'<\/tr>';
          $("#fileslist tbody").append(row);
        });         
      });

      $('#btnSaveImage').on('click', function () {
        if(!$("#id").val()){
          alert("请先保存基本信息");
          return false;
        }
        var url = "/admin/images/store";
        // var url = "/api/zczl/create";
        var param = new FormData($('#formimage')[0]);
        // var param = new FormData(document.getElementById(formid));
        // var param = $('#'+formid).serializeArray()
        saveFileOrImage(url,param,function(image){
          var row = ""
                  +'<div class="col-md-3 img" id="'+image.id+'">'
                  +'  <div class="thumbnail">'
                  +'    <img alt="300x200" src="'+image.path+'"/>'
                  +'      <a href="#close" class="remove label label-danger" data="'+image.id+'">'
                  +'        <i class="glyphicon glyphicon-remove"><\/i>删除'
                  +'      <\/a>'                  
                  +'  <\/div>'
                  +'<\/div>';
          $("#imageslist").append(row);
        });        
      });

      function saveFileOrImage(url,param,saveSuccess){
          $("button").attr("disabled","disabled");
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(str_reponse){
              console.log(str_reponse);
              alert("操作成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess(str_reponse.file);
            },
            error : function(XMLHttpRequest,err,e){
              console.log(XMLHttpRequest);
              error(XMLHttpRequest);
            }
          });      
      }
      function error(XMLHttpRequest){
        var status = XMLHttpRequest.status;
        var response = XMLHttpRequest.responseJSON;
        var errors = "";
        if(status == '500'){
          errors = response.message;
        }
        else if(status == '422'){
          errors = response.errors;
        }
        show_warning(errors);            
        $("button").removeAttr("disabled");        
      }

    });
</script>
</div>