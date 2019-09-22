@extends('admin.layouts.confirm')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
	  <a href="/admin/yxdj/list/edit/{{$yxf->project_id}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
	</div>
@endsection

@section('content')
  @include('admin.yxf.detail._show')
@endsection

@section('modelid')
	<input type="hidden" id="id" name="id" value="{{$yxf->id}}" class="id" >
@endsection