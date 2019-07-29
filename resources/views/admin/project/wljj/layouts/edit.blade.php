
@include('admin.project.image._list_style') 
</style>
<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">附件</a></li>
      <li><a href="#tab4" data-toggle="tab">审批</a></li> 
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
          @yield('content')        
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab2">
          @include('admin.project.file._edit') 
        </div>

        <!--提交审批-->
        <div class="tab-pane fade" id="tab4">
          <form action="/admin/{{$projecttype}}/submit" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
            {{csrf_field()}}
            <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
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
          var url = "/admin/"+projecttype + "/jj";
          // var url = "/api/zczl/create";

          var param = getFormToJson();
          $.ajax({
            type : "post",
            url : url,
            data : param,
            success : function(str_reponse){
              console.log(str_reponse);
              alert("保存成功");
              
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