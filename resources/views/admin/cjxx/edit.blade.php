@extends('admin.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/cjxx/print')
@section('filetable_type',1)

@section('content')
  @include('admin.cjxx._edit')
@endsection


