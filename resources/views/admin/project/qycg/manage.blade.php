@extends('admin.project.layouts.manage')

@section('listurl','/admin/qycg')
@section('printurl','/print/qycg')
@section('filetable_type',1)

@section('content')
  @include('admin.project.qycg._edit')
@endsection


