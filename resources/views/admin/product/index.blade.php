@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="form-row">
                            <div class="col-auto col-xl-6 mb-3">
                                <a class="btn btn-outline-primary {{ config('page.permissions')->contains('create-store') ?: 'd-none' }}"
                                    href="{{ route('admin.product.create') }}">
                                    {{ __('Add') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        @include('admin.product.templates.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
@endpush

@push('scripts-src')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/datatables.net/locales/' . app()->getLocale() . '.js') }}"></script>
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif

@endpush
