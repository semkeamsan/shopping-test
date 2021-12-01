{!! Form::open([
    'url' => route('admin.permission.store'),
    'class' => 'needs-validation',
    'novalidate' => true,
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
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
                            <option value="{{ $role->id }}">
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
        <div class="form-row">
            <div class="col-6">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs"> * </span>

                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/flags/' . app()->getlocale() . '.svg') }}" width="20px">
                                </span>
                            </div>
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
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('icon', __('Icon'), ['class' => 'form-control-label']) !!}
                        <div class="input-group">
                            {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fal fa-icons"></i>
                                </span>
                            </div>
                        </div>
                        @error('icon')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                {{ __('validation.required', ['attribute' => __('Icon')]) }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                {!! Form::label('slug', __('Slug'), ['class' => 'form-control-label']) !!}
                <span class="text-danger text-xs"> * </span>
                <div class="form-row border rounded py-2">
                    <div class="col-xl-4">
                        {!! Form::text('slug', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>
                    <div class="col">
                        {!! Form::text('routes', 'index,create-store,edit-update,show,destroy', ['class' => 'form-control', 'data-toggle' => 'tags']) !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.permission.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
