@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Testimonials
@endpush

@section('action') Add @endsection

@section('adminForm')
    @include('admin.includes.addTestimonialForm')
@endsection
