@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Users
@endpush

@section('action') Add @endsection

@section('adminForm')
    @include('admin.includes.addUserForm')
@endsection
