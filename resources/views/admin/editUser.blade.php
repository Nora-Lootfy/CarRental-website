@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Users
@endpush

@section('action') Edit @endsection

@section('adminForm')
    @include('admin.includes.editUserForm')
@endsection
