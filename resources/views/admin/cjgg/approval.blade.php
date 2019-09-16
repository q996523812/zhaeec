@extends('admin.layouts.approval')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/cjgg/print')
@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.cjgg._show')
@endsection
