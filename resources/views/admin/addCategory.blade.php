@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Categories
@endpush

@section('action') Add @endsection

@section('adminForm')
    @include('admin.includes.addCategoryForm')
@endsection
