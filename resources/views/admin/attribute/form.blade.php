@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.attribute.create')
                    @include('admin.attribute.templates.form.create')
                @else
                    @include('admin.attribute.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
@endpush
@push('scripts-src')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
@endpush

@push('scripts')
    <script>
         new Clone($(`[data-toggle="clone"]`));
    </script>
@endpush
