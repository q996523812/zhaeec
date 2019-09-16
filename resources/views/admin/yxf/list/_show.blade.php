
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
                  '<td><a href=\'\/admin\/yxdj/{{$yxf->id}}\' style=\'float: left;margin-left:10px;\'><i class=\'fa fa-edit\'><\/i>查看<\/a><\/td>'+
                '</tr>';
                @endforeach
                $('#yxflist').html(listhtml);
              };
              getlist();
            });
          </script>