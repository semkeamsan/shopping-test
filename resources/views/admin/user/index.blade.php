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
                                    href="{{ route('admin.user.create') }}">
                                    {{ __('Add') }}
                                </a>
                                <a href="#" class="btn btn-outline-primary" data-toggle="collapse" data-target="#filter">
                                    {{ __('Filter') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header collapse pb-0 {{ array_intersect_key(array_flip(['role', 'gender']), request()->all()) ? 'show' : null }}"
                        id="filter">
                        {!! Form::open(['url' => route('admin.user.index'), 'method' => 'get']) !!}
                        <div class="form-row">
                            <div class="col-xl-6">
                            </div>
                            <div class="col-xl-6">
                                <div class="form-row">
                                    <div class="col-xl-6 mb-3">
                                        <select class="form-control" data-toggle="select"
                                            data-allow-clear="true" name="role"

                                            data-placeholder="{{ __('Role') }}">
                                            @foreach ($roles as $role)
                                                <option {{ $role->slug != request('role') ?: 'selected=selected' }}
                                                    value="{{ $role->slug }}">
                                                    {{ $role->translation()->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <select class="form-control" data-toggle="select"
                                            data-allow-clear="true" name="gender"

                                            data-placeholder="{{ __('Gender') }}">
                                            @foreach ($genders as $gender)
                                                <option {{ $gender != request('gender') ?: 'selected=selected' }}
                                                    value="{{ $gender }}">
                                                    {{ __(Str::title($gender)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <div class="float-right">
                                            {!! Form::submit(__('Filter'), ['class' => 'btn btn-primary']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="table-responsive py-4">
                        @include('admin.user.templates.table')
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
