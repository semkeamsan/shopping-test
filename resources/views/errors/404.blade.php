@extends('layouts.app')
@section('content')
    <div class="error">
        <div class="code">
            <h1>404</h1>
        </div>
        <h2> {{ __('Page not found') }}</h2>
        <p>
            {{ __('The page you are looking for might have been removed had its name changed or is temporarily unavailable.') }}
        </p>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endpush
