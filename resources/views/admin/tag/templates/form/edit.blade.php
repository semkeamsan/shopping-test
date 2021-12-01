{!! Form::open([
    'url' => route('admin.tag.update',$tag),
    'class' => 'needs-validation',
    'novalidate' => true,
    'method' => 'put'
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Edit') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 mb-3">
                @include('admin.tag.templates.form.tab')
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
                                            {!! Form::text('name', $tag->translation()->name, ['class' => 'form-control', 'required' => true]) !!}
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
                                        {!! Form::text('slug', $tag->slug, ['class' => 'form-control', 'required' => true]) !!}
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
                                    {!! Form::hidden('meta[id]', $tag->meta ? $tag->meta->id : null) !!}
                                    {!! Form::hidden('meta[translation][locale]', app()->getLocale()) !!}
                                    {!! Form::label('meta_title', __('Meta Title'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                                    <div class="col-xl-6">
                                        {!! Form::text('meta[translation][title]', $tag->meta ? $tag->meta->translation()->title : null, ['class' => 'form-control']) !!}
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
                                        {!! Form::textarea('meta[translation][description]', $tag->meta ? $tag->meta->translation()->description : null, ['class' => 'form-control']) !!}
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
        <a class="btn" href="{{ route('admin.tag.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
