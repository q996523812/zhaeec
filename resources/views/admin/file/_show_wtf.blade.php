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
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </form>