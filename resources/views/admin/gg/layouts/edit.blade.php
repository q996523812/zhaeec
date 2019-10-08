
@include('admin.image._style') 

<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active"><a href="#tab1" data-toggle="tab">基本信息</a></li>
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

        <!--提交审批-->
        <div class="tab-pane fade" id="tab4">
          <form action="/admin/{{$projecttype}}/submit" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
            {{csrf_field()}}
            <input type="hidden" id="id" name="id" value="{{$id}}" class="id">
            <input type="hidden" id="process" name="process" value="13">
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
            url = url+"/modify";
          }
          else{
            url = url+"/insert";
          }
          // var param = getFormToJson();
          var param = new FormData($('#formdetail')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){console.log(str_reponse);
              alert("保存成功");
              if($("#id").val() == ""){
                console.log(str_reponse.message.id);
                // $("#id").val(str_reponse.detail_id)
                $(".id").val(str_reponse.message.id);
                $(".project_id").val(str_reponse.message.project_id);
                console.log( $(".id").val());
              }
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
            },
            error : function(XMLHttpRequest,err,e){
              error(XMLHttpRequest);
            }
          });
      });



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