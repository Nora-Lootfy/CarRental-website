@extends('public.layouts.innerPages')

@push('title') {{$car->title}} @endpush

@section('innerPageDetails')
    <strong class="text-black">Posted on {{date('M d,Y', strtotime($car->created_at))}}</strong>
@endsection

@section('content')
    @include('public.includes.singleCarSection')
@endsection
