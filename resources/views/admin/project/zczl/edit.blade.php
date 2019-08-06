@extends('admin.project.layouts.edit')

@section('listurl','/admin/zczl')
@section('printurl','/admin/zczl/print')
@section('filetable_type',1)

@section('content')
  @include('admin.project.zczl._edit')
@endsection


