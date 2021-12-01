<div id="price" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Price') }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group form-row">
                <label for="price" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Price') }}
                    <span class="text-danger text-xs"> * </span>
                </label>
                <div class="col-xl-6">
                    {!! Form::number('price', null, ['class' => 'form-control', 'required' => true]) !!}
                    @error('price')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Price')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="special_price" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Special Price') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::number('special_price', null, ['class' => 'form-control']) !!}
                    @error('special_price')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Special Price')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="special_price_type" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Special Price Type') }}
                </label>
                <div class="col-xl-6">
                    <select class="form-control" data-toggle="select" name="special_price_type">
                        <option {{ old('special_price_type')!= 'fixed' ?: 'selected' }} value="fixed">{{ __('Fixed') }}</option>
                        <option {{ old('special_price_type')!= 'percent' ?: 'selected' }} value="percent">{{ __('Percent') }}</option>
                    </select>
                    @error('special_price_type')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Special Price Type')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="special_price_start" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Special Price Start') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::text('special_price_start', null, ['class' => 'form-control datepicker']) !!}
                    @error('special_price_start')
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
                <label for="special_price_end" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Special Price End') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::text('special_price_end', null, ['class' => 'form-control datepicker']) !!}
                    @error('special_price_end')
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
