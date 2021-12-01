@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            {!! Form::open(['url' => route('admin.account.biography'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Biography') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-xl-8">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                                        <span class="text-danger text-xs">*</span>
                                        {!! Form::text('name', auth()->user()->name, ['class' => 'form-control','live-input','data-target' => '#show-name', 'data-text' => __('Name'), 'required' => true]) !!}
                                    </div>

                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    {!! Form::label('gender', __('Gender'), ['class' => 'form-control-label']) !!}
                                    <span class="text-danger text-xs">*</span>
                                    <div class="form-group m-0 form-control d-flex" id="gender" data-type="gender">
                                        <div class="custom-control custom-radio custom-control-inline col-xl-6">
                                            <input {{ auth()->user()->gender == 'male' ? 'checked' : null }}
                                                data-toggle="radio" type="radio" id="male" name="gender" value="male"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="male">{{ __('Male') }}</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline col-xl-6">
                                            <input {{ auth()->user()->gender == 'female' ? 'checked' : null }}
                                                data-toggle="radio" type="radio" id="female" name="gender" value="female"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="female">{{ __('Female') }}</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    {!! Form::label('dob', __('Date of Birth'), ['class' => 'form-control-label']) !!}
                                    <span class="text-danger text-xs"> * </span>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fal fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            @php
                                                $dob = auth()->user()->dob
                                                    ? auth()
                                                        ->user()
                                                        ->dob->format('d-m-Y')
                                                    : null;
                                            @endphp
                                            {!! Form::text('dob', $dob, ['class' => 'form-control datepicker', 'required' => true]) !!}
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
                                </div>
                                <div class="col-md-4 ">
                                    {!! Form::label('phone', __('Phone'), ['class' => 'form-control-label']) !!}
                                    <span class="text-danger text-xs">*</span>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fal fa-phone"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('phone', auth()->user()->phone, ['class' => 'form-control', 'required' => true]) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        {!! Form::label('about', __('About me'), ['class' => 'form-control-label']) !!}
                                        {!! Form::textarea('about', auth()->user()->about, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            {!! Form::label('avatar', __('Avatar'), ['class' => 'd-none']) !!}
                            {!! Form::hidden('avatar', old('avatar', auth()->user()->avatar), ['class' => 'custom-file-input']) !!}
                            <div class="card">
                                <div class="card-body">
                                    <a href="#" id="image" data-target-input="#avatar" data-target-image="#im-avatar">
                                        <img src="{{ old('avatar', auth()->user()->avatar) }}" id="im-avatar"
                                            class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                            style="height: 140px;width: 140px;">
                                    </a>
                                    <div class="pt-4 text-center">
                                        <h5 class="h3 title">
                                            <span class="d-block mb-1" id="show-name">{{ auth()->user()->name }}</span>
                                            <small class="h4 font-weight-light text-muted"
                                                id="show-role">{{ auth()->user()->role->{app()->getLocale()} }}</small>
                                        </h5>
                                        <div class="mt-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('facebook', auth()->user()->facebook, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-telegram"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('telegram', auth()->user()->telegram, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-twitter"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('twitter', auth()->user()->twitter, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::text('linkedin', auth()->user()->linkedin, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Save Change'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
    <div class="row">
        <div class="col-xl-4">
            {!! Form::open(['url' => route('admin.account.email'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header  d-none">
                    <h4 class="m-0">{{ __('Email') }}</h4>
                </div>
                <div class="card-body">
                    {{-- <div class="form-group mb-3">
                        {!! Form::label('password', __('Password'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs">*</span>
                        {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                        @error('password')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                {{ __('validation.required', ['attribute' => __('Password')]) }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group mb-3">
                        {!! Form::label('email', __('Email'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs">*</span>
                        {!! Form::email('email', old('email', auth()->user()->email), ['class' => 'form-control', 'required' => true]) !!}

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
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Change Email'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xl-4">
            {!! Form::open(['url' => route('admin.account.password'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header  d-none">
                    <h4 class="m-0">{{ __('Password') }}</h4>

                </div>
                <div class="card-body">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    {{-- <div class="form-group mb-3">
                        {!! Form::label('old_password', __('Old password'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs">*</span>
                        <input class="form-control" type="password" name="old_password" id="old_password" required
                            value="{{ old('old_password') }}">
                        @error('old_password')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                {{ __('validation.required', ['attribute' => __('Old password')]) }}
                            </div>
                        @enderror
                    </div> --}}

                    <div class="form-group mb-3">
                        {!! Form::label('new_password', __('New password'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs">*</span>
                        <input class="form-control" type="password" name="new_password" id="new_password" required
                            value="{{ old('new_password') }}">
                        @error('new_password')

                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                {{ __('validation.required', ['attribute' => __('New password')]) }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Change Password'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection
@push('scripts-src')
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    @filemanagerAssets
@endpush
@push('scripts')
    <script>
        var _token = $('meta[name="csrf-token"]').attr("content");
        $(`#image`).filemanager({
            url: `filemanager`,
            _token: _token,
            multiple: false,
        });
    </script>
@endpush
