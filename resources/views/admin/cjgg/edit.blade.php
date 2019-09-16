@extends('admin.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/cjgg/print')
@section('filetable_type',1)

@section('content')
  @include('admin.cjgg._edit')
@endsection
