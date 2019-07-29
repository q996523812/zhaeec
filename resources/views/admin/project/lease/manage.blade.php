@extends('admin.project.layouts.manage')

@section('listurl','/admin/projectleases')
@section('printurl','/print/zczl')
@section('filetable_type',1)

@section('content')
  @include('admin.project.lease._project_edit')
@endsection


