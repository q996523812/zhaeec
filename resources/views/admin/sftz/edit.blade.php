@extends('admin.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/sftz/printZbf')

@section('content')
  @include('admin.sftz._edit')
@endsection
