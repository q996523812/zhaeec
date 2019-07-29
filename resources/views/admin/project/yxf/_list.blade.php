          <div  class="row">
            <div class="col-lg-12 offset-lg-1">
              <div class="box-tools" style="float:right;">
                <div class="btn-group float-right" style="margin-right: 10px">
                  <a href="/admin/yxdj/create/{{$detail->project_id}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>新增</a>
                </div>
              </div>
            </div>
          </div>
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
                    <td>
                      <a href='/admin/yxdj/show/{{$yxf->id}}' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>查看</a>
                      @if($yxf->process == 11)
                        <a href='/admin/yxdj/edit/{{$yxf->id}}' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>编辑</a>
                      @endif
                      @if($yxf->process == 12)
                        <a href='/admin/yxdj/edit/{{$yxf->id}}' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>编辑</a>
                      @endif
                      @if($yxf->process == 19)
                      <a href='/admin/yxdj/showconfirm/{{$yxf->id}}' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>确认登记</a>
                      @endif
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>