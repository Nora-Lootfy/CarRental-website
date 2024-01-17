@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Cars
@endpush

@section('action') Edit @endsection

@section('adminForm')
    @include('admin.includes.editCarForm')
@endsection
