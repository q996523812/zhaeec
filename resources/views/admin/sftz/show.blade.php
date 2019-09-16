@extends('admin.layouts.show')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/sftz/printZbf')

@section('content')
  @include('admin.sftz._show')
@endsection
