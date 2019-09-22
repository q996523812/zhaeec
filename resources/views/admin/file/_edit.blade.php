          <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formfiledel">
                {{ csrf_field() }}
                <input type="hidden" id= "fileid" name="fileid">
            <table id="fileslist" class="table table-bordered">
              <tbody>
                @foreach($files as $file)
                <tr id="{{$file->id}}">
                  <td><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></td>
                  <td><a href="javascript:void(0);" class="remove" data="{{$file->id}}">删除</a></td>
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
                    <input type="hidden" name="id" value="{{$id}}" class="id">
                    <input type="hidden" name="projecttype" value="{{$projecttype}}" class="projecttype">
                    {{csrf_field()}}
                  </div> 
                  <!--          
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
                -->
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