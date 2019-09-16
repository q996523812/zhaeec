@extends('admin.layouts.approval')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/zbtz/printZbf')
@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.zbtz._show')
@endsection
