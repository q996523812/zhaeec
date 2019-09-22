
@extends('admin.layouts.list.haveprocess.edit')

@section('buttons')
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/pbjg/create/{{$pbjg->id}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>新增</a>
    </div>
@endsection


@section('content')
  @include('admin.pbjg.list._edit')
@endsection


