@extends('admin.project.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/print/zczl')
@section('filetable_type',1)

@section('content')
  @include('admin.project.lease._project_edit')
@endsection


