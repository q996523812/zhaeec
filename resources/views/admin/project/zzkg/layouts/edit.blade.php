@include('admin.image._style') 

<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
      <li><a href="#tab2" data-toggle="tab">融资企业情况</a></li> 
      <li><a href="#tab3" data-toggle="tab">财务信息</a></li> 
      <li><a href="#tab4" data-toggle="tab">评估情况</a></li>
      <li><a href="#tab6" data-toggle="tab">监管信息</a></li>
      <li><a href="#tab13" data-toggle="tab">联系方式</a></li>
      <li><a href="#tab7" data-toggle="tab">附件</a></li> 
      <li><a href="#tab8" data-toggle="tab">图片</a></li>
      <li><a href="#tab9" data-toggle="tab">提交审批</a></li>
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
        <!--标的企业情况、融资企业情况-->
        <div class="tab-pane fade" id="tab2">
          @include('admin.project.fsxx.zrf._edit') 
          @include('admin.customer._modal') 
        </div>
        <!--财务信息-->
        <div class="tab-pane fade" id="tab3">
          @include('admin.project.fsxx.sjbg._edit3') 
          @include('admin.project.fsxx.cwbb._edit') 
        </div>
        <!--评估情况-->
        <div class="tab-pane fade" id="tab4">
          @include('admin.project.fsxx.pgqk._edit') 
        </div>
        <!--监管信息-->
        <div class="tab-pane fade" id="tab6">
          @include('admin.project.fsxx.jgxx._edit') 
        </div>
        <!--联系方式-->
        <div class="tab-pane fade" id="tab13">
          @include('admin.project.fsxx.lxfs._edit') 
        </div>
        <!--附件-->
        <div class="tab-pane fade" id="tab7">
          @include('admin.file._edit') 
        </div>
        <!--图片-->
        <div class="tab-pane fade" id="tab8">
          @include('admin.image._edit')
        </div>

        <!--提交审批-->
        <div class="tab-pane fade" id="tab9">
          @include('admin.project.layouts._submit')
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

        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });
        //时间
        $('.time').parent().datetimepicker({
          "format":"YYYY-MM-DD HH:mm:ss",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        $('.number').inputmask({"alias":"decimal","rightAlign":true});


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

      function getCheckbox(checkboxid){
        var r = [];
        $("."+checkboxid).each(function(i){
          if(this.checked){
            r.push(this.value);
          }
        });
        return r.join(",");
      }

      $('#btnSaveData').on('click', function () {
          $("button").attr("disabled","disabled");
          // var projecttype = "@yield('projecttype')";
          var projecttype = $("#projecttype").val();
          var url = "/admin/"+projecttype;
          // var url = "/api/zczl/create";
          if($("#id").val()){
            url = url+"/update";
          }
          // var param = getFormToJson();
          var param = new FormData($('#formdetail')[0]);
          param.set("fbfs",getCheckbox("fbfs"));
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){
              console.log(str_reponse);
              alert("保存成功");
              if(!$("#id").val()){
                console.log("id="+str_reponse.detail_id);
                // $("#id").val(str_reponse.detail_id)
                $(".id").val(str_reponse.detail_id);
                $(".project_id").val(str_reponse.project_id);
                $(".xmbh").val(str_reponse.xmbh);
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              error(XMLHttpRequest);
            }
          });
      });


      function remove(id,url,fromid){
        var param = new FormData($('#'+fromid)[0]);
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
              alert("操作成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess();
            },
            error : function(XMLHttpRequest,err,e){
              // console.log(XMLHttpRequest);
              error(XMLHttpRequest);
            }
        });
      }
      $('#fileslist').on('click','.remove', function () {
        var id = $(this).attr("data");
        $("#fileid").val(id);
        var url = "/admin/files/destroy";
        remove(id,url,'formfiledel');
      });

      $('#imageslist').on('click','.remove', function () {
        var id = $(this).attr("data");
        $("#imageid").val(id);
        var url = "/admin/images/destroy";
        remove(id,url,'formimagedel');
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
          var row = '<tr id="'+file.id+'">'
            +'<td><a href='+file.file_url+'>'+file.name+'<\/a><\/td>'
            +'<td><a href="javascript:void(0);" class="remove" data="'+file.id+'">删除<\/a><\/td>'
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
              alert("操作成功");
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess(str_reponse.file);
            },
            error : function(XMLHttpRequest,err,e){
              error(XMLHttpRequest);
            }
          });
      }

      function show_warning(message){console.log(message);
        var html = "";
        html = "<div class='alert alert-warning alert-dismissable'>";
        html += message;
        html += '<\/div>';
        $(".warning-message").html(html);
      }

      function error(XMLHttpRequest){
        console.log(XMLHttpRequest.responseText);
        console.log(XMLHttpRequest.responseJSON);
        var status = XMLHttpRequest.status;
        var response = XMLHttpRequest.responseJSON;
        var message = "";
        if(status == '422'){
          var errors = response.errors;
          for(var index in errors){
            message += errors[index];
          }
        }
        else{
          message = response.message;
        }
        // else if(status == '500'){
        //   errors = response.message;
        // }
         
        show_warning(message);            
        $("button").removeAttr("disabled");        
      }

    });
</script>
</div>