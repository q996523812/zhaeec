@extends('admin.layouts.edit')

@section('listurl','/admin/yxdj/list/edit/{{}}')
@section('printurl','/print/zczl')
@section('filetable_type',2)

@section('content')
  @include('admin.yxf.detail._edit')
@endsection


