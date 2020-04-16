      @if ($projecttype === 'projects')
      @else
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/{{$projecttype}}/copy/{{$detail->id}}" class="btn btn-sm btn-default btn-copy"><i class="fa fa-copy"></i> 复制项目</a>
      </div>
      @endif
      @if(!empty($project))
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/{{$project->type}}/print/{{$detail->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
      </div>
      @endif
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/{{$projecttype}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>