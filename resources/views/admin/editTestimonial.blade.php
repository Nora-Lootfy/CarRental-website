@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Testimonials
@endpush

@section('action') Edit @endsection

@section('adminForm')
    @include('admin.includes.editTestimonialForm')
@endsection
