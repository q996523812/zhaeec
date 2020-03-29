          <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formfileyxflist">
                {{ csrf_field() }}
                <input type="hidden" id= "fileid" name="fileid">
            <table id="fileslist" class="table table-bordered">
              <thead>
                <tr>
                  <th>要求的材料名称</th>
                  <th>要求材料类型</th>
                  <th>适用人</th>
                  <th>下载材料</th>
                </tr>
              </thead>
              <tbody>
                @foreach($files_yxf as $file_yxf)
                <tr id="{{$file_yxf->information_lists_id}}">
                  <td>{{$file_yxf->file_name}}</td>
                  <td>{{$file_yxf->information_type}}</td>
                  <td class="applicable_person">{{$file_yxf->applicable_person}}</td>
                  <td class="path">
                    @if(!empty($file_yxf->files_id))
                    <a href="{{get_download_url($file_yxf->file_name,$file_yxf->path)}}" download="{{$file_yxf->file_name}}" target="_blank">下载模板</a>
                    @endif
                  </td>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </form>