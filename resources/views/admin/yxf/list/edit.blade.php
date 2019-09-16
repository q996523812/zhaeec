@extends('admin.layouts.list')

@section('buttons')
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/yxdj/create/{{$project->id}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>新增</a>
    </div>
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/{{$project->type}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection


@section('content')
  @include('admin.yxf.list._edit')
@endsection


