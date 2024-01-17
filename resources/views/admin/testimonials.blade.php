@extends('admin.layouts.adminListingPages')

@push('adminTitle')
    Testimonials
@endpush

@section('adminTable')
    @include('admin.includes.testimonialTable')
@endsection
