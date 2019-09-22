@extends('admin.layouts.show')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
		<a href="/admin/zbtz/print/{{$zbtz->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
	</div>
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/projects" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection

@section('content')
  @include('admin.zbtz._show')
@endsection
