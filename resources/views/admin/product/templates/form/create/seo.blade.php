<div id="seo" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('SEO') }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group form-row">
                <label for="slug" class="col-xl-3 col-form-label form-control-label">
                    {{ __('URL') }}
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
                {!! Form::label('meta_title', __('Meta Title'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                <div class="col-xl-6">
                    {!! Form::hidden('meta[translation][locale]', app()->getLocale()) !!}
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
