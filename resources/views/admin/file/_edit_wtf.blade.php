          <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formfilewtflist">
                {{ csrf_field() }}
                <input type="hidden" id= "fileid" name="fileid">
            <table id="fileslist" class="table table-bordered">
              <thead>
                <tr>
                  <th>要求的材料名称</th>
                  <th>要求材料类型</th>
                  <th>收到的材料类型</th>
                  <th>下载材料</th>
                  <th>操 作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($files_wtf as $file_wtf)
                <tr id="{{$file_wtf->information_lists_id}}">
                  <td>{{$file_wtf->file_name}}</td>
                  <td>{{$file_wtf->information_type}}</td>
                  <td class="information_type">{{replace_information_type($file_wtf->received_information_type)}}</td>
                  <td class="path">
                    @if(!empty($file_wtf->files_id))
                    <a href="{{get_download_url($file_wtf->file_name,$file_wtf->path)}}" download="{{$file_wtf->file_name}}" target="_blank">点击下载</a>
                    @endif
                  </td>
                  <td class="operation">
                    <a class="file_update" data-index="{{$file_wtf->files_id}}" data-name="{{$file_wtf->file_name}}" data-types="{{$file_wtf->received_information_type}}" data-informationid="{{$file_wtf->information_lists_id}}">修改</a>
                    | 
                    <a class="file_delete" href="javascript:void(0);" data-index="{{$file_wtf->files_id}}" data-informationid="{{$file_wtf->information_lists_id}}">删除</a>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            <div>
              <a href="#" class="file_update" style="font-size:25px;display: block;text-align:center;">如果收到的材料没有预先定义，直接添加收到的材料信息
              </a>
            </div>
          </form>

<!-- 模态框（Modal） -->
<div class="modal fade" id="fileModalWtf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">资料上传</h4>
            </div>
            <div class="modal-body">
                <div>
          <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formfilewtf">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$id}}" class="id">
            <input type="hidden" name="information_lists_id" class="information_lists_id" value="">
            <input type="hidden" name="file_id" class="file_id" value="">
            <input type="hidden" name="projecttype" value="{{$projecttype}}" class="projecttype">
            <input type="hidden" name="applicable_party" value="1" class="applicable_party">
            <div class="form-group  ">
              <label for="type" class="col-sm-3  control-label">应收材料名称</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                  <input type="text" id="name" name="name" value="" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group  ">
              <label for="type" class="col-sm-3  control-label">收到的材料类型</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <input type="checkbox" class="received_information_type" id="received_information_type_1" name="received_information_type" value="1">是否收到原件
                </div>
                <div class="input-group">
                  <input type="checkbox" class="received_information_type" id="received_information_type_2" name="received_information_type" value="2">是否收到复印件
                </div>
                <div class="input-group">
                  <input type="checkbox" class="received_information_type" id="received_information_type_3" name="received_information_type" value="3">是否收到电子版
                </div>
              </div>
            </div>

            <div class="form-group file_upload">
              <label for="type" class="col-sm-3  control-label">上传文件</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                  <input type="file" id="file" name="file" value="" class="form-control file" >
                </div>
              </div>
            </div>
            <div class="form-group  ">
              <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <button type="button" id="btnSaveFile1" class="btn btn-primary btn-pass">保存</button>
                    </div>
                </div>
            </div>
            
          </form>
                </div>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
      function modelControl(checked){

        if(checked == true){
          $('#formfilewtf .file_upload').show();
        }
        else{
          $('#formfilewtf .file_upload').hide();
        }
      }
      

      $('#formfilewtf #received_information_type_3').on('click',function(){
        modelControl(this.checked);
      });
      $('#formfilewtf #received_information_type_3').on('checked',function(){
        modelControl(this.checked);
      });

      $('#formfilewtflist .file_update').on('click', function () {
          $('#formfilewtf .file_id').val('');
          $('#formfilewtf #name').val('');
          $('#formfilewtf .information_lists_id').val('');
          $('#formfilewtf #received_information_type_1').prop('checked',false);
          $('#formfilewtf #received_information_type_2').prop('checked',false);
          $('#formfilewtf #received_information_type_3').prop('checked',false);
          
          var id = $(this).data('index');
          var information_lists_id = $(this).data('informationid');
          var name = $(this).data('name');
          var types = $(this).data('types');
          if(types != null && types != ''){
            var arr_types = types.split(',');
            for (var i = arr_types.length - 1; i >= 0; i--) {
              $('#formfilewtf #received_information_type_'+arr_types[i]).prop('checked',true);
            }
          }
          $('#formfilewtf .file_id').val(id);
          $('#formfilewtf #name').val(name);
          $('#formfilewtf .information_lists_id').val(information_lists_id);
          $('#fileModalWtf').modal('show');
          $('#formfilewtf #received_information_type_3').trigger('checked');
      });

      function getCheckbox(checkboxid){
        var r = [];
        $("#formfilewtf ."+checkboxid).each(function(i){
          if(this.checked){
            r.push(this.value);
          }
        });
        return r.join(",");
      }
      $('#formfilewtf #btnSaveFile1').on('click', function () {
          var fileInput = $('#formfilewtf #file').get(0).files[0];
          if(!fileInput){
            alert("请选择上传文件！");
            return false;
          }
          var url = "/admin/files/store";
          if($('#formfilewtf .file_id').val() != ''){
            url = "/admin/files/update";
          }
          var param = new FormData($('#formfilewtf')[0]);
          param.set("received_information_type",getCheckbox("received_information_type"));
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
              console.log(str_reponse);
              $("button").removeAttr("disabled");
              $(".warning-message").html("");
              saveSuccess(str_reponse.file);
              $('#fileModalWtf').modal('hide');
            },
            error : function(XMLHttpRequest,err,e){
              alert("保存失败");
              console.log(XMLHttpRequest);
              // error(XMLHttpRequest);
            }
          });
      });

      function get_download_url(file_name,file_dir){
        return '/download?file_name='+encodeURIComponent(file_name)+'&file_dir='+encodeURIComponent(file_dir);
      }
      function saveSuccess(file){
        var received_information_type = file.received_information_type;
        received_information_type = received_information_type.replace('1','原件').replace('2','复印件').replace('3','电子版');
        if(file.information_lists_id =='' || file.information_lists_id == null){
          var row = '<tr id="'+file.id+'">'
                  + '<td>'+file.name+'<\/td>'
                  + '<td><\/td>'
                  + '<td>'+received_information_type+'<\/td>'
                  + '<td><a href="'+get_download_url(file.name,file.path)+'" target="_blank" download="'+file.name+'">点击下载<\/a><\/td>'
                  + '<td class="operation"><a class="file_delete" data-index="'+file.id+'">删除</a><\/td>';
          $('#formfilewtflist #fileslist tbody').append(row);
        }
        else{
          $('#formfilewtflist #'+file.information_lists_id+' .information_type').html(received_information_type);
          $('#formfilewtflist #'+file.information_lists_id+' .path').html('<a href="'+get_download_url(file.name,file.path)+'" target="_blank" download="'+file.name+'">点击下载</a>');
          $('#formfilewtflist #'+file.information_lists_id+' .file_update').data('index',file.id);
          $('#formfilewtflist #'+file.information_lists_id+' .file_update').data('name',file.name);
          $('#formfilewtflist #'+file.information_lists_id+' .file_update').data('types',file.received_information_type);
          $('#formfilewtflist #'+file.information_lists_id+' .file_update').data('informationid',file.information_lists_id);
        }
      }

      function remove(id,url,fromid,lists_id,$obj){
        var param = new FormData($('#'+fromid)[0]);
        var saveSuccess = function($obj){
          if(lists_id =='' || lists_id == null){
            // $("#formfilewtflist #"+id).remove();
            $obj.parent().parent().remove();
          }
          else{
            $("#formfilewtflist #"+lists_id+" .information_type").html("");
            $("#formfilewtflist #"+lists_id+" .path").html("");
            $('#formfilewtflist #'+lists_id+' .operation').html("");
          }
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
              saveSuccess($obj);
            },
            error : function(XMLHttpRequest,err,e){
              // console.log(XMLHttpRequest);
              error(XMLHttpRequest);
            }
        });
      }
      $('#formfilewtflist #fileslist').on('click','.file_delete', function () {
        var id = $(this).data('index');
        $("#formfilewtflist #fileid").val(id);
        var lists_id = $(this).data('informationid');
        var url = "/admin/files/destroy";
        remove(id,url,'formfilewtflist',lists_id,$(this));
      });


    });
</script> 