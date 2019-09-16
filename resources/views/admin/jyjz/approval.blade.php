@extends('admin.layouts.approval')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/jyjz/print')
@section('approvalurl','/admin/projects/approval')

@section('content')
  @include('admin.jyjz._show')
@endsection
