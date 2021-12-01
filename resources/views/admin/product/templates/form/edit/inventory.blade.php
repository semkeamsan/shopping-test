<div id="inventory" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Inventory') }}</h3>
        </div>
        <div class="card-body">

            <div class="form-group form-row">
                <label for="sku" class="col-xl-3 col-form-label form-control-label">
                    {{ __('SKU') }}
                </label>
                <div class="col-xl-6">
                    {!! Form::text('sku', $product->sku, ['class' => 'form-control']) !!}
                    @error('sku')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('SKU')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="manage_stock" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Inventory Management') }}
                </label>
                <div class="col-xl-6">
                    <select class="form-control" data-toggle="select" name="manage_stock">
                        <option {{ old('manage_stock', $product->manage_stock) == 0 ? 'selected' : null }} value="0">
                            {{ __('Don\'t Track Inventory') }}</option>
                        <option {{ old('manage_stock', $product->manage_stock) == 1 ? 'selected' : null }} value="1">
                            {{ __('Track Inventory') }}</option>
                    </select>
                    @error('manage_stock')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Inventory Management')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="in_stock" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Stock Availability') }}
                </label>
                <div class="col-xl-6">
                    <select class="form-control" data-toggle="select" name="in_stock">
                        <option {{ old('in_stock', $product->in_stock) == 1 ? 'selected' : null }} value="1">
                            {{ __('In Stock') }}</option>
                        <option {{ old('in_stock', $product->in_stock) == 0 ? 'selected' : null }} value="0">
                            {{ __('Out of Stock') }}</option>
                    </select>
                    @error('in_stock')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Stock Availability')]) }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
