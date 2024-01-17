@extends('admin.layouts.adminListingPages')

@push('adminTitle')
    Users
@endpush

@section('adminTable')
    @include('admin.includes.userTable')
@endsection

