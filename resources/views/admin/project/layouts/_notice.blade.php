<form action="#" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
<div class="box-body">
<div class="fields-group">

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">
    <table class="table table-bordered">
      <thead>
        <th colspan="5"></th>
      </thead>  
      <tbody>

        <tr>
          <td>名称</td>
          <td>打印</td>
          <td>下载</td>
        </tr>
        <tr>
          <td><a href="/admin/cjgg/show/{{$detail->project->transactionAnnouncement->id}}">成交公告</a></td>
          <td><a href="/admin/cjgg/print/{{$detail->project->transactionAnnouncement->id}}">打印</a></td>
          <td>
            @foreach($detail->project->transactionAnnouncement->files as $file)
            <div><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></div>
            @endforeach
          </td>
        </tr>
        <tr>
          <td><a href="/admin/cjgg/show/{{$detail->project->winNotice->id}}">中标通知</a></td>
          <td>
            <a href="/admin/cjgg/print/{{$detail->project->winNotice->id}}" target="_blank">打印</a>
          </td>
          <td>
            @foreach($detail->project->winNotice->files as $file)
            <div><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></div>
            @endforeach
          </td>
        </tr>
        <tr>
          <td><a href="/admin/sftz/show/{{$detail->project->paymentNotice->id}}">收费通知</a></td>
          <td>
            <a href="/admin/sftz/print/wtf/{{$detail->project->paymentNotice->id}}" target="_blank">委托方</a>
            <a href="/admin/sftz/print/zbf/{{$detail->project->paymentNotice->id}}" target="_blank" style='margin-left:10px;'>中标方</a>
          </td>
          <td>
            @foreach($detail->project->paymentNotice->files as $file)
            <div><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></div>
            @endforeach
          </td>
        </tr>
        @empty($detail->project->transactionConfirmation)
        <tr>
          <td><a href="/admin/jyjz/show/{{$detail->project->transactionConfirmation->id}}">交易鉴证</a></td>
          <td>
            <a href="/admin/jyjz/print/{{$detail->project->transactionConfirmation->id}}">打印</a>
          </td>
          <td>
            @foreach($detail->project->transactionConfirmation->files as $file)
            <div><a href="{{$file->path}}" download="{{$file->name}}" target="_blank">{{$file->name}}</a></div>
            @endforeach
          </td>
        </tr>
        @endempty
      </tbody>
    </table>
  </div>
</div>

                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

</form>