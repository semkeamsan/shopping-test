@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.user.create')
                    @include('admin.user.templates.form.create')
                @else
                    @include('admin.user.templates.form.edit')
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
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/bootstrap-datepicker/dist/locales/' . app()->getLocale() . '.js') }}">
        </script>
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
    @filemanagerAssets
@endpush
@push('scripts')

    <script>
        var _token = $('meta[name="csrf-token"]').attr("content");
        $(`[data-toggle="select"]`).change(function() {
            var id = $(this).val();
            $('#show-role').text($(this).find(`[value="${id}"]`).text());
        });
        $('#name').on('input', function() {
            if ($(this).val()) {
                $('#show-name').text($(this).val());
            } else {
                $('#show-name').text("{{ __('Name') }}");
            }
        });
        $(`#image`).filemanager({
            url: `filemanager`,
            _token: _token,
            multiple: false,
        });
    </script>

@endpush
