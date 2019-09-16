@extends('admin.layouts.show')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/zbtz/printZbf')

@section('content')
  @include('admin.zbtz._show')
@endsection
