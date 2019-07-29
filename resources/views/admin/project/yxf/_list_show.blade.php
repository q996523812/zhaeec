
          <div  class="row">
            <div class="col-lg-12 offset-lg-1">
              <table class="table table-bordered">
                <thead>
                  <th>名称</th>
                  <th>类型</th>
                  <th>状态</th>
                  <th>操作</th>
                </thead>
                <tbody>
                  @foreach($yxfs as $yxf)
                  <tr>
                    <td>{{$yxf->name}}</td>
                    <td>{{$yxf->type}}</td>
                    <td>{{$yxf->process_name}}</td>
                    <td><a href='/admin/yxdj/show/{{$yxf->id}}' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>查看</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>