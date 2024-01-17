@extends('admin.layouts.adminFormsPages')

@push('adminTitle')
    Messages
@endpush

@section('action') Show @endsection

@section('adminForm')
    @include('admin.includes.showMessageForm')
@endsection
