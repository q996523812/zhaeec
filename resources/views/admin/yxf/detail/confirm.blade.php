@extends('admin.layouts.confirm')

@section('listurl','/admin/zczl')
@section('printurl','/print/zczl')

@section('content')
  @include('admin.yxf.detail._show')
@endsection
