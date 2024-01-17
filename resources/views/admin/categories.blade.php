@extends('admin.layouts.adminListingPages')

@push('adminTitle')
    Categories
@endpush

@section('adminTable')
    @include('admin.includes.categoryTable')
@endsection
