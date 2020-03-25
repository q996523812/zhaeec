          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <table class="table table-bordered">
                <thead>
                  <th>操作时间</th>
                  <th>流程节点</th>
                  <th>操作类型</th>
                  <th>备注</th>
                  <th>操作人</th>
                </thead>
                <tbody>
                  @foreach($detail->project->workProcessRecords as $record)
                  <tr>
                    <td>{{$record->created_at}}</td>
                    <td>{{$record->work_process_node_name}}</td>
                    <td>{{$record->operation}}</td>
                    <td>{{$record->reason}}</td>
                    <td>{{$record->user->name}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>