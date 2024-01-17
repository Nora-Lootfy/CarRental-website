@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Categories
@endpush

@section('action') Edit @endsection

@section('adminForm')
@include('admin.includes.editCategoryForm')
@endsection
