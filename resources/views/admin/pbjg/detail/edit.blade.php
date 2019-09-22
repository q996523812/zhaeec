@extends('admin.layouts.noprocess.edit')

@section('buttons')
	<div class="btn-group float-right" style="margin-right: 10px">
	  <a href="/admin/pbjg/list/edit/{{$pbjg->project_id}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
	</div>
@endsection

@section('content')
  @include('admin.pbjg.detail._edit')
@endsection
