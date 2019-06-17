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

      $('#btnSaveData').on('click', function () {
          $("button").attr("disabled","disabled");
          // var projecttype = "@yield('projecttype')";
          var projecttype = $("#projecttype").val();
          var url = "/admin/"+projecttype;
          // var url = "/api/zczl/create";
          if($("#id").val()){
            url = url+"/update";
          }
          var param = getFormToJson();
          //console.log(param);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            success : function(str_reponse){
              // var reponse = JSON.parse(str_reponse);
              console.log(str_reponse);
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

      $('#btnSaveFile').on('click', function () {
        var url = "/admin/files/store";
        // var url = "/api/zczl/create";
        saveFileOrImage(url,"formfile");         
      });

      $('#btnSaveImage').on('click', function () {
        var url = "/admin/images/store";
        // var url = "/api/zczl/create";
        saveFileOrImage(url,"formimage");        
      });

      function saveFileOrImage(url,formid){
        console.log($("#id").val());
        if($("#id").val()){
          $("button").attr("disabled","disabled");
          var param = new FormData($('#'+formid)[0]);
          // var param = new FormData(document.getElementById(formid));
          // var param = $('#'+formid).serializeArray()
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
              error(XMLHttpRequest);
            }
          });
        }
        else{
          alert("请先保存基本信息");
        }        
      }
      function error(XMLHttpRequest){
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