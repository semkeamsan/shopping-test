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
                <div class="col-xl-9">
                    <div class="input-group">
                        {!! Form::text('name', $product->translation()->name, ['class' => 'form-control', 'required' => true]) !!}
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
            <div class="form-group form-row">
                <label for="description" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Description') }}
                    <span class="text-danger text-xs"> * </span>
                </label>

                <div class="col-xl-9">
                    <div id="container-description">
                        <div data-toggle="quill" data-quill-placeholder=""
                            data-target="#description">{!! old('description',$product->translation()->description ) !!}</div>
                        {!! Form::label('description', null, ['class' => 'd-none']) !!}
                        {!! Form::textarea('description', $product->translation()->description, ['class' => 'form-control d-none', 'required' => true]) !!}
                        @error('description')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                {{ __('validation.required', ['attribute' => __('Description')]) }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label for="brand_id" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Brand') }}
                </label>
                <div class="col-xl-6">
                    <select class="form-control" data-toggle="select" name="brand_id">
                        @foreach ($brands as $brand)
                            <option {{ old('brand_id',$product->brand_id) != $brand->id ?: 'selected' }}
                                value="{{ $brand->id }}">
                                {{ $brand->translation()->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Brand')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="categories" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Categories') }}
                </label>
                <div class="col-xl-6">
                    <select multiple class="form-control" data-toggle="select"
                        name="categories[]">
                        @foreach ($categories as $category)
                            <option
                                {{ !in_array($category->id,old('categories', $product->categories->pluck('id')->toArray())) ?: 'selected' }}
                                value="{{ $category->id }}">
                                {{ $category->translation()->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('categories')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Categories')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="tax_class_id" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Tax Class') }}
                </label>
                <div class="col-xl-6">
                    <select class="form-control" data-toggle="select" name="tax_class_id">
                        @foreach ($tax_class as $tax)
                            <option {{old('tax_class_id', $product->tax_class_id) != $tax->id ?: 'selected' }}
                                value="{{ $tax->id }}">
                                {{ $tax->translation()->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tax_class_id')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Tax Class')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="tags" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Tags') }}
                </label>
                <div class="col-xl-6">
                    <select multiple class="form-control" data-toggle="select" name="tags[]">
                        @foreach ($tags as $tag)
                            <option {{ !in_array($tag->id, old('tags',$product->tags->pluck('id')->toArray())) ?: 'selected' }}
                                value="{{ $tag->id }}">
                                {{ $tag->translation()->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Tags')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="virtual" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Virtual') }}
                </label>
                <div class="col-xl-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="virtual"
                            name="virtual" value="1" {{ old('virtual',$product->virtual)!= 1 ?: 'checked' }}>
                        <label class="custom-control-label"
                            for="virtual">{{ __('The product won\'t be shipped') }}</label>
                    </div>

                    @error('virtual')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Virtual')]) }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="is_active" class="col-xl-3 col-form-label form-control-label">
                    {{ __('Status') }}
                </label>
                <div class="col-xl-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="is_active"
                            name="is_active" value="1" {{ old('is_active',$product->is_active) != 1 ?: 'checked' }}>
                        <label class="custom-control-label"
                            for="is_active">{{ __('Enable the product') }}</label>
                    </div>

                    @error('is_active')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('Status')]) }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
