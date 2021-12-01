<div id="options" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Options') }}</h3>
        </div>
        <div class="card-body">
            <div class="accordion" id="clone-options">
                <div class="option mb-3 d-none" id="clone-option">
                    <div class="card mb-0 border shadow-none" id="option" data-index="{0}">
                        <div class="card-header" id="heading-option-{0}" data-toggle="collapse"
                            data-target="#collapse-option-{0}" aria-expanded="true" aria-controls="collapse-option-{0}">
                            <h5 class="mb-0">
                                <i class="fa fa-grip-vertical"></i>
                                <span id="live-option-name-{0}">{{ __('New Option') }}</span>
                            </h5>
                        </div>
                        <div id="collapse-option-{0}" class="collapse show" aria-labelledby="heading-option-{0}">
                            <div class="card-body pb-0">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        {!! Form::label('option-name-{0}', __('Option Name'), ['class' => 'form-control-label']) !!}
                                        <input type="text" data-name="options[{0}][name]" id="option-name-{0}"
                                            class="form-control" data-toggle="live-input"
                                            data-target="#live-option-name-{0}" data-text="{{ __('New Option') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        {!! Form::label('option-type-{0}', __('Type'), ['class' => 'form-control-label']) !!}
                                        <select class="form-control" data-name="options[{0}][type]"
                                            id="option-type-{0}" data-toggle="type"
                                            data-minimum-results-for-search="Infinity">
                                            @foreach (config('types') as $type)
                                                <optgroup label="{{ $type['name'] }}">
                                                    @foreach ($type['children'] as $item)
                                                        <option data-parent="{{ $item['parent'] }}"
                                                            value="{{ $item['type'] }}">
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
                                                data-name="options[{0}][is_required]" value="1">
                                            <label class="custom-control-label pr-5" for="is_required-{0}">
                                                {{ __('Required') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        {!! Form::label('delete', __('Delete'), ['class' => 'form-control-label invisible']) !!}
                                        <button data-toggle="clone-delete" data-target="#clone-option" type="button"
                                            class="btn btn-secondary">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-none" id="type-text-date">
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
                                                        data-name="options[{0}][values][0][price]">
                                                </td>
                                                <td>
                                                    <select class="form-control"
                                                        data-name="options[{0}][values][0][price_type]">
                                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                                        <option value="percent">{{ __('Percent') }}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body d-none" id="type-select">
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
                                                    <select class="form-control"
                                                        data-name="options[{0}][values][{1}][price_type]">
                                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                                        <option value="percent">{{ __('Percent') }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none px-3" type="button"
                                                        data-toggle="clone-delete"
                                                        data-target="#clone-option-value-{0}">
                                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <button data-toggle="clone" data-clone="#clone-option-value-{0}" data-replace="1"
                                    data-target="#clone-option-values-{0}" type="button" class="btn btn-secondary">
                                    {{ __('Add New Value') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.product.templates.form.oldvalues.option',['options' => old('options',[])])
            </div>
        </div>
        <div class="card-footer">
            <div class="form-row">
                <div class="col">
                    <button data-toggle="clone" data-clone="#clone-option" data-target="#clone-options" data-replace="0"
                        type="button" class="btn btn-secondary">
                        {{ __('Add New Option') }}
                    </button>
                </div>
                <div class="col">
                    <div class="form-row">
                        <div class="col">
                            <select class="form-control" data-toggle="select" id="option-global"
                                data-placeholder="{{ __('Select Global Option') }}">
                                @foreach ($options as $option)
                                    <option value="{{ $option->id }}">
                                        {{ $option->translation()->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn" type="button" id="add-option-global">
                                {{ __('Add Global Option') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
