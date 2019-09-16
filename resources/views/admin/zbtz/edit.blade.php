@extends('admin.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/zbtz/printZbf')

@section('content')
  @include('admin.zbtz._edit')
@endsection
