@extends('admin.layouts.master')

@section('title', 'Tambah Iuran')
    
@section('content')
<x-form-keuangan action="{{ $route }}"/>
{{-- <h1>{{ $route }}</h1> --}}
@endsection