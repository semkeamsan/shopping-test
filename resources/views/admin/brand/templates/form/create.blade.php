{!! Form::open([
    'url' => route('admin.brand.store'),
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
                @include('admin.brand.templates.form.tab')
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
                    <div id="images" class="tab-pane fade">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('Images') }}</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="mb-0">{{ __('Base Image') }}</h3>
                                {!! Form::label('logo', __('Image'), ['class' => 'form-control-label d-none']) !!}
                                {!! Form::hidden('logo', old('logo', asset('images/default.png')), ['class' => 'custom-file-input']) !!}
                                <br>
                                <button type="button" class="btn btn-secondary mb-3" id="fimage"
                                    data-target-input="#logo" data-target-image="#im-image">
                                    <i class="fal fa-folder-open"></i>
                                    {{ __('Browse') }}
                                </button>
                                <div class="col p-3 border" style="width:135px;height: 135px;">
                                    <div class="avatar rounded bg-transparent" style="width:100px;height: 100px;">
                                        <img id="im-image" src="{{ old('logo', asset('images/default.png')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="seo" class="tab-pane fade">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('SEO') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <label for="slug" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Slug') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
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
                                </div>
                                <div class="form-group form-row">
                                    {!! Form::hidden('meta[translation][locale]', app()->getLocale()) !!}
                                    {!! Form::label('meta_title', __('Meta Title'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                                    <div class="col-xl-6">
                                        {!! Form::text('meta[translation][title]', null, ['class' => 'form-control']) !!}
                                        @error('meta[translation][title]')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Meta Title')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    {!! Form::label('meta_description', __('Meta Description'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                                    <div class="col-xl-6">
                                        {!! Form::textarea('meta[translation][description]', null, ['class' => 'form-control']) !!}
                                        @error('meta[translation][description]')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Meta Description')]) }}
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
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.brand.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
