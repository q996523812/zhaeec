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
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active">
          <a href="#tab1" data-toggle="tab">
              基本信息
          </a>
      </li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li> 
      <li><a href="#tab3" data-toggle="tab">图片</a></li> 
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
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
            <div class="box-body">
              <div class="fields-group">
                <div class="row">
                  @yield('content')
                  
                </div>   
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group pull-right">
                      <button type="button" id="btnSaveData" class="btn btn-primary btn-pass">保存</button>
                    </div>
                  </div>
                </div>                                                    
              </div>
            </div>
            <div>
              <input type="hidden" name="status" value="1" class="status form-control">
              <input type="hidden" name="process" value="11" class="process form-control">
              <input type="hidden" name="user_id" value="1" class="user_id form-control">
              <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
              <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id form-control">
              <input type="hidden" name="sjly" value="业务录入" class="sjly form-control">
              <input type="hidden" id="savetype" name="savetype" value="{{$savetype}}" class="savetype form-control">
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
                  
                  <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                  <td><a href="javascript:void(0);" onclick="delFile({{$file->id}})">删除</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formfile">
            <div class="fields-group">
              <div class="row">
                <div class="container table-responsive col-md-12 align-items-center"> 
                  <div class="col-md-8">
                    <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
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
                      <label for="path" class=" control-label">选择文件</label>
                      <div class="">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                          <input type="file" id="path" name="path" value="" class="form-control path" >
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
          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <div  class="row">
                @foreach($detail->images as $image)
                  <div class="col-md-4">
                    <img src="{{$image->path}}" class="col-md-4">
                  </div>
                @endforeach
              <div  class="row">
            </div>
          </div>

          <div>
            <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formimage">
              <div class="fields-group">
                <div class="row">
                  <div class="container table-responsive col-md-12 align-items-center"> 
                    <div class="col-md-8">
                      <input type="hidden" name="project_id" value="{{$detail->project_id}}" class="project_id form-control">
                      {{csrf_field()}}
                    </div>           
                    <div class="col-md-8">
                      <div class=" ">
                        <label for="name" class=" control-label">附件名称</label>
                        <div class="">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                            <input type="text" id="image" name="image" value="" class="form-control image" placeholder="输入 附件名称">
                          </div>        
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class=" ">
                        <label for="path" class=" control-label">选择文件</label>
                        <div class="">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                            <input type="file" id="path" name="path" value="" class="form-control path" >
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
        return data;
      }
      function show_warning(message){
        var html = "";
        html = "<div class='alert alert-warning alert-dismissable'>";
        html += message;
        html += '<\/div>';
        $(".warning-message").html(html);
      }

      var isSaved = false;

      $('#btnSaveData').on('click', function () {
          $("button").attr("disabled","disabled");
          var url = "/admin/projectleases";
          // var url = "/api/zczl/create";
          if($("#savetype").val()=="edit"){
            url = "/admin/projectleases/update";
          }
          var param = getFormToJson();
          //console.log(param);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            success : function(str_reponse){
              // var reponse = JSON.parse(str_reponse);
              console.log(111);
              console.log(str_reponse);
              alert("保存成功");
              $(".id").val(str_reponse.detail_id);
              $(".project_id").val(str_reponse.project_id);
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              isSaved = true;
            },
            error : function(XMLHttpRequest,err,e){
              console.log(XMLHttpRequest);
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

              // var response = JSON.parse(XMLHttpRequest.responseText);
              // console.log(response);
              // show_warning(JSON.stringify(response.errors));             
              $("button").removeAttr("disabled");
            }
          });
      });

      $('#btnSaveFile').on('click', function () {
        if($("#id").val()){
          $("button").attr("disabled","disabled");
          var url = "/admin/projectleases";
          // var url = "/api/zczl/create";
          var param = new FormData($('#formfile')[0]);
          console.log(param);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(str_reponse){
              // var reponse = JSON.parse(str_reponse);
              console.log(111);
              console.log(str_reponse);
              alert("保存成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              var response = JSON.parse(XMLHttpRequest.responseText);
              show_warning(JSON.stringify(response.errors));             
              $("button").removeAttr("disabled");
            }
          });
        }
        else{
          alert("请先保存基本信息");
        }
      });

      $('#btnSaveImage').on('click', function () {
        console.log($("#id").val());
        if($("#id").val()){
          $("button").attr("disabled","disabled");
          var url = "/admin/images/store";
          // var url = "/api/zczl/create";
          // var param = new FormData($('#formimage')[0]);
          var param = new FormData(document.getElementById("formimage"));
          // var param = $('#formimage').serializeArray()
          console.log(param);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(str_reponse){
              // var reponse = JSON.parse(str_reponse);
              console.log(111);
              console.log(str_reponse);
              alert("保存成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              console.log(222);
              console.log(XMLHttpRequest);
              var response = JSON.parse(XMLHttpRequest.responseText);
              show_warning(JSON.stringify(response.errors));             
              $("button").removeAttr("disabled");
            }
          });
        }
        else{
          alert("请先保存基本信息");
        }
      });

    });
  </script>
</div>