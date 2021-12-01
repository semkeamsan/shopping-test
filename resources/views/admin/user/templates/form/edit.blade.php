{!! Form::open([
    'url' => route('admin.user.update', $user),
    'class' => 'needs-validation',
    'novalidate' => true,
    'method' => 'put',
]) !!}
<div class="card">

    <div class="card-header">
        <h3 class="mb-0">{{ __('Edit') }}</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-xl-8">
                <div class="form-row">
                    <div class="col-xl-6 mb-3">
                        {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs"> * </span>
                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'live-input','data-target' => '#show-name', 'data-text' => __('Name'), 'required' => true]) !!}
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
                                {!! Form::label('gender', __('Gender'), ['class' => 'form-control-label']) !!}
                                <span class="text-danger text-xs"> * </span>
                                <div class="form-control h-auto">
                                    <div class="col-6 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="male" value="male" name="gender"
                                            {{ old('gender', $user->gender) == 'male' ? 'checked' : null }}
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="male">{{ __('Male') }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="female" value="female" name="gender"
                                            {{ old('gender', $user->gender) == 'female' ? 'checked' : null }}
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="female">{{ __('Female') }}</label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="error-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @else
                                    <div class="invalid-feedback">
                                        {{ __('validation.required', ['attribute' => __('Gender')]) }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-4 mb-3">
                                {!! Form::label('dob', __('Date of Birth'), ['class' => 'form-control-label']) !!}
                                <span class="text-danger text-xs"> * </span>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fal fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    {!! Form::text('dob', $user->dob ? $user->dob->format('d-m-Y') : null, ['class' => 'form-control datepicker', 'required' => true]) !!}
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
                                    {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'required' => true]) !!}
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
                        </div>
                    </div>
                    <div class="col-xl-6 mb-3">
                        {!! Form::label('email', __('Email'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs"> * </span>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fal fa-envelope"></i>
                                </span>
                            </div>
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'required' => true]) !!}
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
                    <div class="col-xl-6 mb-3">
                        {!! Form::label('password', __('Password'), ['class' => 'form-control-label']) !!}


                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fal fa-lock"></i>
                                </span>
                            </div>
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @error('password')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    {{ __('validation.required', ['attribute' => __('Password')]) }}
                                </div>
                            @enderror

                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('role_id', __('Role'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs"> * </span>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fal fa-user-shield"></i>
                                </span>
                            </div>
                            <select class="form-control" data-toggle="select"  name="role_id"
                                 required>
                                @foreach ($roles as $role)
                                    <option {{ $role->id != old('role_id', $user->role_id) ?: 'selected=selected' }}
                                        value="{{ $role->id }}">
                                        {{ $role->translation()->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    {{ __('validation.required', ['attribute' => __('Role')]) }}
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                {!! Form::label('avatar', __('Avatar'), ['class' => 'form-control-label']) !!}
                {!! Form::hidden('avatar', old('avatar', $user->avatar), ['class' => 'custom-file-input']) !!}

                <div class="card">
                    <div class="card-body">
                        <a href="#" id="image" data-target-input="#avatar" data-target-image="#im-avatar">
                            <img src="{{ old('avatar', $user->avatar) }}" id="im-avatar"
                                class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                style="height: 140px;width: 140px;">
                        </a>
                        <div class="pt-4 text-center">
                            <h5 class="h3 title">
                                <span class="d-block mb-1" id="show-name">{{ $user->name }}</span>
                                <small class="h4 font-weight-light text-muted"
                                    id="show-role">{{ $user->role->{app()->getLocale()} }}</small>
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
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
