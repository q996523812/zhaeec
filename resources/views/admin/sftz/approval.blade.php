@extends('admin.layouts.approval')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/sftz/printZbf')
@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.sftz._show')
@endsection
