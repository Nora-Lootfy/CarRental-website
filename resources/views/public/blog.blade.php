@extends('public.layouts.innerPages')

@push('title') Blog @endpush

@section('innerPageDetails')
    <a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>Blog</strong>
@endsection

@section('content')

    @include('public.includes.blogPostsSection')

@endsection
