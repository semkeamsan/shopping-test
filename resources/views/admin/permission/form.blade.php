@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.permission.create')
                    @include('admin.permission.templates.form.create')
                @else
                    @include('admin.permission.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
@endpush
@push('scripts-src')
    <script src="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
@endpush

@push('scripts')
    <script>
        $(`#icon`).on('input', function() {
            var val = $(this).val();
            if (val) {
                $(this).parent().find(`.input-group-append i`).removeClass().addClass(val);
            } else {
                $(this).parent().find(`.input-group-append i`).removeClass().addClass('fal fa-icons');
            }
        });
    </script>

@endpush
