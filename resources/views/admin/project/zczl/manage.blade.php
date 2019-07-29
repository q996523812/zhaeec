@extends('admin.project.layouts.manage')

@section('listurl','/admin/zczl')
@section('printurl','/print/zczl')
@section('filetable_type',1)

@section('content')
  @include('admin.project.zczl._edit')
@endsection


