@extends('admin.layouts.adminListingPages')

@push('adminTitle')
    Cars
@endpush

@section('adminTable')
    @include('admin.includes.carTable')
@endsection
