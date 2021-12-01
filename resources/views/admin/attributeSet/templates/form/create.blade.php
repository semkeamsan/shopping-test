{!! Form::open([
    'url' => route('admin.attribute-set.store'),
    'class' => 'needs-validation',
    'novalidate' => true,
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 mb-3">
                @include('admin.attributeSet.templates.form.tab')
            </div>
            <div class="col-xl-9 mb-3">
                <div class="tab-content">
                    <div id="general" class="tab-pane fade show active">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('General') }}</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group form-row">
                                    <label for="name" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Name') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        <div class="input-group">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <img src="{{ asset('images/flags/' . app()->getlocale() . '.svg') }}"
                                                        width="20px">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.attribute-set.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
