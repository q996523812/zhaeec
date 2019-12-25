@extends('admin.project.zzkg.layouts.show')

@section('listurl','/admin/zzkg')
@section('printurl','/admin/zzkg/print')
@section('filetable_type',3)

@section('content')
  @include('admin.project.zzkg._show')
@endsection


