@extends('admin.layouts.edit')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
		<a href="/admin/sftz/print/wtf/{{$sftz->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印(委托方)</a>
	</div>
	<div class="btn-group float-right" style="margin-right: 10px">
		<a href="/admin/sftz/print/zbf/{{$sftz->id}}" class="btn btn-sm btn-default btn-print" target="_blank"><i class="fa fa-print"></i> 打印(中标方)</a>
	</div>
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/{{$project->type}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection

@section('content')
  @include('admin.sftz._edit')
@endsection
