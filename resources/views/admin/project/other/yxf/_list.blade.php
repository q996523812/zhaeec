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
                <tbody id="yxflist">
                  
                </tbody>
              </table>
            </div>
          </div>
          <script>
            $(function () {
              function getlist(){
                var listhtml ="";
                @foreach($yxfs as $yxf)
                listhtml +='<tr>'+
                  '<td>{{$yxf->name}}<\/td>'+
                  '<td>'+select_datas['customertype']['{{$yxf->customertype}}']+'<\/td>'+
                  '<td>{{$yxf->process_name}}<\/td>'+
                  '<td>'+
                      getBtns('{{$yxf->id}}','{{$yxf->process}}')+
                  '<\/td>'+
                '</tr>';
                @endforeach
                $('#yxflist').html(listhtml);
              }
              function getBtns(id,process){
                var btns = [];
                btns.push('<a href=\'\/admin\/yxdj\/'+id+'\' style=\'float: left;margin-left:10px;\'><i class=\'fa fa-edit\'><\/i>查看<\/a>');
                if(process === 11){
                  btns.push('<a href=\'\/admin\/yxdj\/edit/'+id+'\' style=\'float: left;margin-left:10px;\'><i class=\'fa fa-edit\'><\/i>编辑<\/a>');
                }
                else if(process === 12){
                  btns.push('<a href=\'\/admin\/yxdj\/edit/'+id+'\' style=\'float: left;margin-left:10px;\'><i class=\'fa fa-edit\'><\/i>编辑<\/a>');
                }
                else if(process === 19){
                  btns.push('<a href=\'\/admin\/yxdj\/showconfirm/'+id+'\' style=\'float: left;margin-left:10px;\'><i class=\'fa fa-edit\'><\/i>确认登记<\/a>');
                }
                return btns.join('');
              }
              getlist();
            });
          </script>