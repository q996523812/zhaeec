@extends('admin.layouts.approval')

@section('listurl','/admin/zczl')
@section('printurl','/print/zczl')
@section('approvalurl','/admin/yxdj/approval')

@section('content')
  @include('admin.yxf.detail._show')
@endsection

