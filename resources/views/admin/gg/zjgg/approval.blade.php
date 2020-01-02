@extends('admin.layouts.approval')

@section('buttons')
    <div class="btn-group float-right" style="margin-right: 10px">
      <a href="/admin/projects" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
    </div>
@endsection

@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.gg.zjgg._show')
@endsection
