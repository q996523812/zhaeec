@extends('admin.project.layouts.approval')
@section('listurl','/admin/projects')
@section('printurl','/admin/zczl/print')

@section('content')
  @include('admin.project.zczl._show')
@endsection