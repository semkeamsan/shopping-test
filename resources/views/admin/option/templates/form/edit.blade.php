{!! Form::open([
    'url' => route('admin.option.update', $option),
    'class' => 'needs-validation',
    'novalidate' => true,
    'method' => 'put',
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 mb-3">
                @include('admin.option.templates.form.tab')
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
                                            {!! Form::text('name', $option->translation()->name, ['class' => 'form-control', 'required' => true]) !!}
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
                                    <label for="type" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Type') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        <select class="form-control" data-toggle="select"
                                            name="type"  required>
                                            @foreach (config('types') as $type)
                                                <optgroup label="{{ $type['name'] }}">
                                                    @foreach ($type['children'] as $item)
                                                        <option {{ $option->type != $item['type'] ?: 'selected' }}
                                                            data-parent="{{ $item['parent'] }}"
                                                            value="{{ $item['type'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Type')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="required" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Required') }}
                                    </label>
                                    <div class="col-xl-6">
                                        <div class="input-group">
                                            <div class="custom-control custom-checkbox">
                                                <input {{ $option->is_required == 0 ?: 'checked' }} type="checkbox"
                                                    class="custom-control-input" id="is_required" name="is_required"
                                                    autocomplete="off" value="1">
                                                <label class="custom-control-label pr-5" for="is_required">
                                                    {{ __('This option is required') }}
                                                </label>
                                            </div>

                                            @error('is_required')
                                                <div class="error-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @else
                                                <div class="invalid-feedback">
                                                    {{ __('validation.required', ['attribute' => __('Required')]) }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="values" class="tab-pane fade">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('Values') }}</h3>
                            </div>

                            <div class="card-body {{ in_array($option->type, array_column(config('types.1.children'), 'type')) ? 'd-none' : null }}"
                                id="type-text-date">
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="border-right-0">{{ __('Price') }}</th>
                                            <th class="border-left-0" width="200px"></th>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border">
                                                <td>
                                                    <input type="hidden" class="form-control"
                                                        name="values[{{ $option->values->first()->id }}][id]"
                                                        value="{{ $option->values->first()->id }}">
                                                    <input type="number" class="form-control"
                                                        value="{{ $option->values->first()->price }}"
                                                        name="values[{{ $option->values->first()->id }}][price]">
                                                </td>
                                                <td>
                                                    <select class="form-control" data-toggle="select"
                                                        name="values[{{ $option->values->first()->id }}][price_type]">
                                                        <option
                                                            {{ $option->values->first()->price_type != 'fixed' ?: 'selected' }}
                                                            value="fixed">{{ __('Fixed') }}
                                                        </option>
                                                        <option
                                                            {{ $option->values->first()->price_type != 'percent' ?: 'selected' }}
                                                            value="percent">{{ __('Percent') }}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body {{ in_array($option->type, array_column(config('types.1.children'), 'type')) ?: 'd-none' }}"
                                id="type-select">
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="border-right-0" width="40px"></th>
                                            <th class="border-right-0 border-left-0">{{ __('Label') }}</th>
                                            <th class="border-right-0 border-left-0">{{ __('Price') }}</th>
                                            <th class="border-right-0 border-left-0">{{ __('Price Type') }}</th>
                                            <th class="border-left-0" width="40px"></th>
                                        </thead>
                                        <tbody data-toggle="ui-drag" id="clone-values">
                                            <tr class="d-none bg-white border" id="clone-value">
                                                <td>
                                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        data-name="values[{0}][label]">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                        data-name="values[{0}][price]">
                                                </td>

                                                <td>
                                                    <select class="form-control" data-name="values[{0}][price_type]">
                                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                                        <option value="percent">{{ __('Percent') }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none px-3" type="button"
                                                        data-toggle="clone-delete" data-target="#clone-value">
                                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @if (in_array($option->type, array_column(config('types.1.children'), 'type')))
                                            @foreach ($option->values as $value)
                                                <tr class=" bg-white border" id="clone-value">
                                                    <td>
                                                        <i class="fal fa-grip-vertical"
                                                            style="padding: 15px 5px 0 0"></i>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" class="form-control"
                                                            name="values[{{ $value->id }}][id]"
                                                            value="{{ $value->id }}">
                                                        <input type="text" class="form-control"
                                                            name="values[{{ $value->id }}][label]"
                                                            value="{{ $value->translation()->label }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            value="{{ $value->price }}"
                                                            name="values[{{ $value->id }}][price]">
                                                    </td>

                                                    <td>
                                                        <select class="form-control" data-toggle="select"
                                                            name="values[{{ $value->id }}][price_type]">
                                                            <option {{ $value->price_type != 'fixed' ?: 'selected' }}
                                                                value="fixed">{{ __('Fixed') }}</option>
                                                            <option
                                                                {{ $value->price_type != 'percent' ?: 'selected' }}
                                                                value="percent">{{ __('Percent') }}</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn shadow-none px-3" type="button"
                                                            data-toggle="clone-delete" data-target="#clone-value">
                                                            <i class="fal fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                                <button data-toggle="clone" data-clone="#clone-value"
                                    data-target="#clone-values" type="button" class="btn btn-secondary">
                                    {{ __('Add New Value') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.option.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
