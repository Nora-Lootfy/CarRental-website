@extends('public.layouts.innerPages')

@push('title') Listings @endpush

@section('innerPageDetails')
    <a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>Listings</strong>
@endsection

@section('content')

    @include('public.includes.carsListSection')
    @include('public.includes.testimonialsSection')

@endsection
