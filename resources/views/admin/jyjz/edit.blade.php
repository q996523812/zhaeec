@extends('admin.layouts.edit')

@section('listurl','/admin/projectleases')
@section('printurl','/admin/jyjz/print')

@section('content')
  @include('admin.jyjz._edit')
@endsection

@section('modelid')
  <input type="hidden" id="id" name="id" value="{{$jyjz->id}}" class="id">
@endsection