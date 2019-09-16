@extends('admin.layouts.show')

@section('listurl','/admin/zczl')
@section('printurl','/print/zczl')
@section('filetable_type',2)

@section('content')
  @include('admin.yxf.detail._show')
@endsection


