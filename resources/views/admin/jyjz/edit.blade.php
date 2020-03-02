@extends('admin.layouts.edit')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
		<a href="/admin/jyjz/print/{{$jyjz->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
	</div>
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/{{$project->type}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection

@section('content')
  @include('admin.jyjz._edit')
@endsection
