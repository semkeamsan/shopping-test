<div id="additional" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Additional') }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group form-row">
                <label for="short_description" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Short Description') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::textarea('short_description', old('short_description',$product->translation()->short_description), ['class' => 'form-control']) !!}
                    @error('short_description')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Short Description')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="new_from" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Product New From') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::text('new_from', old('new_from',$product->new_from), ['class' => 'form-control datepicker']) !!}
                    @error('new_from')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Special Price Start')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="new_to" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Product New To') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::text('new_to', old('new_to',$product->new_to), ['class' => 'form-control datepicker']) !!}
                    @error('new_to')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Special Price End')]) }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
    </div>
</div>
