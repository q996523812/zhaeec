@extends('admin.layouts.approval')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/cjxx/print')
@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.cjxx._show')
@endsection
