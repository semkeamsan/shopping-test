@extends('layouts.app')
@section('content')
    <div class="error">
        <div class="code">
            <h1>403</h1>
        </div>
        <h2>{{ __('Access Forbidden') }}</h2>
        <p>
            {{ __('Sorry, your access is refused due to security reasons of our server and also our sensitive data. Please go back to the previous page to continue browsing.') }}
        </p>
    </div>
@endsection
@push('styles')
   <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endpush
