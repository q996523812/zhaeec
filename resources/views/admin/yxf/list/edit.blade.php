@extends('admin.layouts.list')

@section('buttons')
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/yxdj/create/{{$project->id}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>新增</a>
    </div>
@endsection


@section('content')
  @include('admin.yxf.list._edit')
@endsection


