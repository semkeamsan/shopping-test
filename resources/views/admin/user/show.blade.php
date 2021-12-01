@extends('layouts.admin')
@push('styles')
    <style>
        .form-control[readonly]{
            background: transparent;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0">{{ __('View') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-xl-8">
                                <div class="form-row">
                                    <div class="col-xl-6 mb-3">
                                        {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                                        <span class="text-danger text-xs"> * </span>
                                        {!! Form::text('name', $user->name, ['readonly', 'class' => 'form-control', 'live-input', 'data-target' => '#show-name', 'data-text' => __('Name'), 'required' => true]) !!}
                                        @error('name')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Name')]) }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-row">
                                            <div class="col-xl-4 mb-3">
                                                {!! Form::label('dob', __('Date of Birth'), ['class' => 'form-control-label']) !!}
                                                <span class="text-danger text-xs"> * </span>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fal fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('dob', $user->dob ? $user->dob->format('d-m-Y') : null, ['readonly','class' => 'form-control', 'required' => true]) !!}
                                                    @error('dob')
                                                        <div class="error-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @else
                                                        <div class="invalid-feedback">
                                                            {{ __('validation.required', ['attribute' => __('Date of Birth')]) }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                {!! Form::label('phone', __('Phone'), ['class' => 'form-control-label']) !!}
                                                <span class="text-danger text-xs"> * </span>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fal fa-phone"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('phone', $user->phone, ['readonly','class' => 'form-control', 'required' => true]) !!}
                                                    @error('phone')
                                                        <div class="error-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @else
                                                        <div class="invalid-feedback">
                                                            {{ __('validation.required', ['attribute' => __('Phone')]) }}
                                                        </div>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                {!! Form::label('email', __('Email'), ['class' => 'form-control-label']) !!}
                                                <span class="text-danger text-xs"> * </span>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fal fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::email('email', $user->email, ['readonly','class' => 'form-control', 'required' => true]) !!}
                                                    @error('email')
                                                        <div class="error-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @else
                                                        <div class="invalid-feedback">
                                                            {{ __('validation.required', ['attribute' => __('Email')]) }}
                                                        </div>
                                                    @enderror

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#">
                                            <img src="{{ $user->avatar }}"
                                                class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                                style="height: 140px;width: 140px;">
                                        </a>
                                        <div class="pt-4 text-center">
                                            <h5 class="h3 title">
                                                <span class="d-block mb-1" id="show-name">{{ $user->name }}</span>
                                                <span class="d-block mb-1 text-muted">{{ __(Str::title( $user->gender)) }}</span>
                                                <small class="h4 font-weight-light text-muted"
                                                    id="show-role">{{ $user->role->{app()->getLocale()} }}
                                                </small>

                                            </h5>
                                            <div class="mt-3">

                                                <a href="#" class="btn border btn-icon-only rounded-circle">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="btn border btn-icon-only rounded-circle">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="#" class="btn border btn-icon-only rounded-circle">
                                                    <i class="fab fa-telegram"></i>
                                                </a>
                                                <a href="#" class="btn border btn-icon-only rounded-circle">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn" href="{{ route('admin.user.index') }}">{{ __('Back') }}</a>
                        <div class="float-right">
                            <a class="btn btn-outline-primary"
                                href="{{ route('admin.user.edit', $user) }}">{{ __('Edit') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
