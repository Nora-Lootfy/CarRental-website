@extends('admin.layouts.adminListingPages')

@push('adminTitle')
    Messages
@endpush

@section('adminTable')
    @include('admin.includes.messageTable')
@endsection
