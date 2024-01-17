@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Cars
@endpush

@section('action') Add @endsection

@section('adminForm')
    @include('admin.includes.addCarForm')
@endsection
