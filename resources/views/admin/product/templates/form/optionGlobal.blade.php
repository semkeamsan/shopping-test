<div class="option d-none mb-3" id="clone-option-{0}" dataid="{{$option->id}}">
    <div class="card mb-0 border shadow-none" id="option" data-index="{0}">
        <div class="card-header" id="heading-option-{0}" data-toggle="collapse" data-target="#collapse-option-{0}"
            aria-expanded="true" aria-controls="collapse-option-{0}">
            <h5 class="mb-0">
                <i class="fa fa-grip-vertical"></i>
                <span id="live-option-name-{0}">{{ $option->translation()->name }}</span>
            </h5>
        </div>
        <div id="collapse-option-{0}" class="collapse show" aria-labelledby="heading-option-{0}">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('option-name-{0}', __('Option Name'), ['class' => 'form-control-label']) !!}
                        <input type="text" name="options[{0}][name]" id="option-name-{0}" class="form-control"
                            data-toggle="live-input" data-target="#live-option-name-{0}"
                            data-text="{{ __('New Option') }}" value="{{ $option->translation()->name }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        {!! Form::label('option-type-{0}', __('Type'), ['class' => 'form-control-label']) !!}
                        <select data-minimum-results-for-search="Infinity"
                        data-toggle="type" class="form-control" name="options[{0}][type]" id="option-type-{0}"
                            data-minimum-results-for-search="Infinity">
                            @foreach (config('types') as $type)
                                <optgroup label="{{ $type['name'] }}">
                                    @foreach ($type['children'] as $item)
                                        <option {{ $option->type != $item['type'] ?: 'selected' }} data-parent="{{ $item['parent'] }}" value="{{ $item['type'] }}">
                                            {{ $item['name'] }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        {!! Form::label('is_required-{0}', __('Required'), ['class' => 'form-control-label invisible']) !!}
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_required-{0}"
                                name="options[{0}][is_required]" value="1" {{ $option->is_required == 0 ?:'checked'  }}>
                            <label class="custom-control-label pr-5" for="is_required-{0}">
                                {{ __('Required') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        {!! Form::label('delete', __('Delete'), ['class' => 'form-control-label invisible']) !!}
                        <button data-toggle="clone-delete" data-target="#clone-option-{0}" type="button"
                            class="btn btn-secondary">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
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
                                    <input type="number" class="form-control"
                                        value="{{ $option->values->count() ? $option->values->first()->price :null }}"
                                        name="options[{0}][values][{1}][price]">
                                </td>
                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control"
                                        name="options[{0}][values][{1}][price_type]">
                                        <option
                                            {{ ($option->values->count() ? $option->values->first()->price_type :null) != 'fixed' ?: 'selected' }}
                                            value="fixed">{{ __('Fixed') }}
                                        </option>
                                        <option
                                            {{ ($option->values->count() ? $option->values->first()->price_type :null) != 'percent' ?: 'selected' }}
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
                        <tbody data-toggle="ui-drag" id="clone-option-values-{0}">
                            <tr class="d-none bg-white border" id="clone-option-value-{0}">
                                <td>
                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        data-name="options[{0}][values][{1}][label]">
                                </td>
                                <td>
                                    <input type="number" class="form-control"
                                        data-name="options[{0}][values][{1}][price]">
                                </td>

                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" data-name="options[{0}][values][{1}][price_type]">
                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                        <option value="percent">{{ __('Percent') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn shadow-none px-3" type="button"
                                        data-toggle="clone-delete" data-target="#clone-option-value-{0}">
                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @if (in_array($option->type, array_column(config('types.1.children'), 'type')))
                            @foreach ($option->values as $value)
                                <tr class=" bg-white border" id="clone-option-value-{0}">
                                    <td>
                                        <i class="fal fa-grip-vertical"
                                            style="padding: 15px 5px 0 0"></i>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            name="options[{0}][values][{{ $value->id }}][label]"
                                            value="{{ $value->translation()->label }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control"
                                            value="{{ $value->price }}"
                                            name="options[{0}][values][{{ $value->id }}][price]">
                                    </td>

                                    <td>
                                        <select data-minimum-results-for-search="Infinity" class="form-control"
                                            name="options[{0}][values][{{ $value->id }}][price_type]">
                                            <option {{ $value->price_type != 'fixed' ?: 'selected' }}
                                                value="fixed">{{ __('Fixed') }}</option>
                                            <option
                                                {{ $value->price_type != 'percent' ?: 'selected' }}
                                                value="percent">{{ __('Percent') }}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn shadow-none px-3" type="button"
                                            data-toggle="clone-delete" data-target="#clone-option-value-{0}">
                                            <i class="fal fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <button data-toggle="clone" data-clone="#clone-option-value-{0}"
                    data-target="#clone-option-values-{0}" data-replace="1" type="button" class="btn btn-secondary">
                    {{ __('Add New Value') }}
                </button>
            </div>
        </div>
    </div>
</div>
