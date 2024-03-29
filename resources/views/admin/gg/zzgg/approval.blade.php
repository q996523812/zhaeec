@extends('admin.gg.layouts.approval')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
		<a href="/admin/zzgg/print/{{$zzgg->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印</a>
	</div>
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/projects" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection
@section('approvalurl','/admin/projects/approval')


@section('content')
  @include('admin.gg.zzgg._show')
@endsection
