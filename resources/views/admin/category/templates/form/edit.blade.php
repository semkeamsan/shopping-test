{!! Form::open([
    'url' => route('admin.category.update',''),
    'class' => 'needs-validation',
    'novalidate' => true,
    'method' => 'put',
]) !!}
<div class="card shadow-none m-0">
    <div class="card-body p-0">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                {!! Form::label('slug', __('Slug'), ['class' => 'form-control-label']) !!}
                <span class="text-danger text-xs"> * </span>
                {!! Form::text('slug', null, ['class' => 'form-control', 'required' => true]) !!}
                @error('slug')
                    <div class="error-feedback d-block">
                        {{ $message }}
                    </div>
                @else
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('Slug')]) }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
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
    </div>
    <div class="card-footer">
        <a class="btn d-none" href="{{ route('admin.brand.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
        </div>
    </div>
</div>

{!! Form::close() !!}
