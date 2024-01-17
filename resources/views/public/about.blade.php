@extends('public.layouts.innerPages')

@push('title') About @endpush

@section('innerPageDetails')
    <a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>About</strong>
@endsection

@section('content')

    @include('public.includes.aboutCompanySection')
    @include('public.includes.teamListSection')
    @include('public.includes.historySection')

@endsection
