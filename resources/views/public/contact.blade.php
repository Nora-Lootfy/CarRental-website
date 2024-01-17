@extends('public.layouts.innerPages')

@push('title') Contact @endpush

@section('innerPageDetails')
    <a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>Contact</strong>
@endsection

@section('content')

    @include('public.includes.contactSection')

@endsection




