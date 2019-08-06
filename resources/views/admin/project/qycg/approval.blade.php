@extends('admin.project.layouts.approval')
@section('listurl','/admin/projects')
@section('printurl','/admin/qycg/print')

@section('content')
  @include('admin.project.qycg._show')
@endsection