@extends('public.layouts.innerPages')

@push('title') Testimonials @endpush

@section('innerPageDetails')
    <a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>Testimonials</strong>
@endsection

@section('content')

    @include('public.includes.testimonialsSection')

@endsection



