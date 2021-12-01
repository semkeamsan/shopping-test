@extends('layouts.app')
@section('content')
    <div class="error">
        <div class="code">
            <h1>500</h1>
        </div>
        <h2> {{ __('Server Error') }}</h2>

    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endpush
