@if(old('options'))
@foreach ($options as $key => $option)
<div data-toggle="old" class="option mb-3" id="clone-option-{{ $key }}">
    <div class="card mb-0 border shadow-none" id="option" data-index="{{$key}}">
        <div class="card-header" id="heading-option-{{ $key }}" data-toggle="collapse" data-target="#collapse-option-{{$key}}" aria-expanded="true" aria-controls="collapse-option-{{ $key }}">
            <h5 class="mb-0">
                <i class="fa fa-grip-vertical"></i>
                <span id="live-option-name-{{ $key }}">{{ @$option['name'] }}</span>
            </h5>
        </div>
        <div id="collapse-option-{{ $key }}" class="collapse show" aria-labelledby="heading-option-{{$key}}">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::hidden('options['.$key.'][id]',$key, ['class' => 'form-control-label']) !!}
                        {!! Form::label('option-name-'.$key, __('Option Name'), ['class' => 'form-control-label']) !!}
                        <input type="text" name="options[{{$key}}][name]" id="option-name-{{ $key }}" class="form-control" data-toggle="live-input" data-target="#live-option-name-{{ $key }}" data-text="{{ __('New Option') }}" value="{{ @$option['name'] }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        {!! Form::label('option-type-'.$key, __('Type'), ['class' => 'form-control-label']) !!}
                        <select data-minimum-results-for-search="Infinity" data-toggle="type" class="form-control" name="options[{{$key}}][type]" id="option-type-{{ $key }}" data-minimum-results-for-search="Infinity">
                            @foreach (config('types') as $type)
                            <optgroup label="{{ $type['name'] }}">
                                @foreach ($type['children'] as $item)
                                <option {{ @$option['type'] !=$item['type'] ?: 'selected' }} data-parent="{{ $item['parent'] }}" value="{{ $item['type'] }}">
                                    {{ $item['name'] }}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        {!! Form::label('is_required-'.$key, __('Required'), ['class' => 'form-control-label
                        invisible']) !!}
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_required-{{ $key }}" name="options[{{$key}}][is_required]" value="1" {{ @$option['is_required']==0
                                ?:'checked' }}>
                            <label class="custom-control-label pr-5" for="is_required-{{ $key }}">
                                {{ __('Required') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        {!! Form::label('delete', __('Delete'), ['class' => 'form-control-label invisible']) !!}
                        <button data-toggle="clone-delete" data-target="#clone-option-{{ $key }}" type="button" class="btn btn-secondary">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body {{ in_array(@$option['type'], array_column(array_merge(config('types.0.children'),config('types.2.children')), 'type')) ?  null : 'd-none'  }}" id="type-text-date">
                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <th class="border-right-0">{{ __('Price') }}</th>
                            <th class="border-left-0" width="200px"></th>
                        </thead>
                        <tbody>
                            <tr class="bg-white border">
                                <td>
                                    <input type="hidden" class="form-control" value="{{ request('options.'.$key. '.values.0.id') }}" name="options[{{$key}}][values][0][id]">
                                    <input type="number" class="form-control" value="{{ request('options.'.$key. '.values.0.price') }}" name="options[{{$key}}][values][0][price]">
                                </td>
                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" name="options[{{$key}}][values][0][price_type]">
                                        <option {{request('options.'.$key. '.values.0.price_type' ) !='fixed'
                                            ?: 'selected' }} value="fixed">{{ __('Fixed') }}
                                        </option>
                                        <option {{request('options.'.$key. '.values.0.price_type' ) !='percent'
                                            ?: 'selected' }} value="percent">{{ __('Percent') }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body {{ in_array(@$option['type'], array_column(config('types.1.children'), 'type')) ?: 'd-none' }}" id="type-select">
                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <th class="border-right-0" width="40px"></th>
                            <th class="border-right-0 border-left-0">{{ __('Label') }}</th>
                            <th class="border-right-0 border-left-0">{{ __('Price') }}</th>
                            <th class="border-right-0 border-left-0">{{ __('Price Type') }}</th>
                            <th class="border-left-0" width="40px"></th>
                        </thead>
                        <tbody data-toggle="ui-drag" id="clone-option-values-{{ $key }}">
                            <tr class="d-none bg-white border" id="clone-option-value-{{ $key }}">
                                <td>
                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                </td>
                                <td>
                                    <input type="text" class="form-control" data-name="options[{{$key}}][values][{1}][label]">
                                </td>
                                <td>
                                    <input type="number" class="form-control" data-name="options[{{$key}}][values][{1}][price]">
                                </td>

                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" data-name="options[{{$key}}][values][{1}][price_type]">
                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                        <option value="percent">{{ __('Percent') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-option-value-{{ $key }}">
                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @if (in_array(@$option['type'], array_column(config('types.1.children'), 'type')))
                            @foreach (@$option['values'] ?? [] as $i => $value)
                            <tr class=" bg-white border" id="clone-option-value-{{ $key }}">
                                <td>
                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" value="{{ @$value['id']}}" name="options[{{$key}}][values][{{ $i }}][id]">
                                    <input type="text" class="form-control" name="options[{{$key}}][values][{{ $i }}][label]" value="{{ @$value['label'] }}">
                                </td>
                                <td>
                                    <input type="number" class="form-control" value="{{@$value['price'] }}" name="options[{{$key}}][values][{{ $i }}][price]">
                                </td>

                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" name="options[{{$key}}][values][{{ $i }}][price_type]">
                                        <option {{ @$value['price_type'] !='fixed' ?: 'selected' }} value="fixed">
                                            {{__('Fixed') }}
                                        </option>
                                        <option {{ @$value['price_type'] !='percent' ?: 'selected' }} value="percent">
                                            {{__('Percent') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-option-value-{{ $key }}">
                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <button data-toggle="clone" data-clone="#clone-option-value-{{ $key }}" data-target="#clone-option-values-{{ $key }}" data-replace="1" type="button" class="btn btn-secondary">
                    {{ __('Add New Value') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
@foreach ($options as $key => $option)
<div data-toggle="old" class="option mb-3" id="clone-option-{{ $option->id }}">
    <div class="card mb-0 border shadow-none" id="option" data-index="{{$option->id}}">
        <div class="card-header" id="heading-option-{{ $option->id }}" data-toggle="collapse" data-target="#collapse-option-{{$option->id}}" aria-expanded="true" aria-controls="collapse-option-{{ $option->id }}">
            <h5 class="mb-0">
                <i class="fa fa-grip-vertical"></i>
                <span id="live-option-name-{{ $option->id }}">{{ $option->translation()->name }}</span>
            </h5>
        </div>
        <div id="collapse-option-{{ $option->id }}" class="collapse show" aria-labelledby="heading-option-{{$option->id}}">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::hidden('options['.$option->id.'][id]',$option->id, ['class' => 'form-control-label'])!!}
                        {!! Form::label('option-name-'.$option->id, __('Option Name'), ['class' =>'form-control-label']) !!}
                        <input type="text" name="options[{{$option->id}}][name]" id="option-name-{{ $option->id }}" class="form-control" data-toggle="live-input" data-target="#live-option-name-{{ $option->id }}" data-text="{{ __('New Option') }}" value="{{ $option->translation()->name }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        {!! Form::label('option-type-'.$option->id, __('Type'), ['class' => 'form-control-label']) !!}
                        <select data-minimum-results-for-search="Infinity" data-toggle="type" class="form-control" name="options[{{$option->id}}][type]" id="option-type-{{ $option->id }}" data-minimum-results-for-search="Infinity">
                            @foreach (config('types') as $type)
                            <optgroup label="{{ $type['name'] }}">
                                @foreach ($type['children'] as $item)
                                <option {{ $option->type != $item['type'] ?: 'selected' }} data-parent="{{
                                    $item['parent'] }}" value="{{ $item['type'] }}">
                                    {{ $item['name'] }}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        {!! Form::label('is_required-'.$option->id, __('Required'), ['class' => 'form-control-label
                        invisible']) !!}
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_required-{{ $option->id }}" name="options[{{$option->id}}][is_required]" value="1" {{ $option->is_required == 0
                            ?:'checked' }}>
                            <label class="custom-control-label pr-5" for="is_required-{{ $option->id }}">
                                {{ __('Required') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        {!! Form::label('delete', __('Delete'), ['class' => 'form-control-label invisible']) !!}
                        <button data-toggle="clone-delete" data-target="#clone-option-{{ $option->id }}" type="button" class="btn btn-secondary">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body {{ in_array($option->type, array_column(config('types.1.children'), 'type')) ? 'd-none' : null }}" id="type-text-date">
                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <th class="border-right-0">{{ __('Price') }}</th>
                            <th class="border-left-0" width="200px"></th>
                        </thead>
                        <tbody>
                            @if (!in_array($option->type, array_column(config('types.1.children'),'type')))
                            <tr class="bg-white border">
                                <td>
                                    <input type="hidden" class="form-control" value="{{ $option->values->count() ? $option->values->first()->id :null }}" name="options[{{$option->id}}][values][0][id]">
                                    <input type="number" class="form-control" value="{{ $option->values->count() ? $option->values->first()->price :null }}" name="options[{{$option->id}}][values][0][price]">
                                </td>
                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" name="options[{{$option->id}}][values][0][price_type]">
                                        <option {{( $option->values->count() ? $option->values->first()->price_type:null) != 'fixed' ?: 'selected' }} value="fixed">
                                            {{ __('Fixed') }}
                                        </option>
                                        <option {{( $option->values->count() ? $option->values->first()->price_type:null) != 'percent' ?: 'selected' }} value="percent">
                                            {{ __('Percent') }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            @else
                            <tr class="bg-white border">
                                <td>
                                    <input type="number" class="form-control" name="options[{{$option->id}}][values][0][price]">
                                </td>
                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" name="options[{{$option->id}}][values][0][price_type]">
                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                        <option value="percent">{{ __('Percent') }}</option>
                                    </select>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body {{ in_array($option->type, array_column(config('types.1.children'), 'type')) ?: 'd-none' }}" id="type-select">
                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <th class="border-right-0" width="40px"></th>
                            <th class="border-right-0 border-left-0">{{ __('Label') }}</th>
                            <th class="border-right-0 border-left-0">{{ __('Price') }}</th>
                            <th class="border-right-0 border-left-0">{{ __('Price Type') }}</th>
                            <th class="border-left-0" width="40px"></th>
                        </thead>
                        <tbody data-toggle="ui-drag" id="clone-option-values-{{ $option->id }}">
                            <tr class="d-none bg-white border" id="clone-option-value-{{ $option->id }}">
                                <td>
                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                </td>
                                <td>
                                    <input type="text" class="form-control" data-name="options[{{$option->id}}][values][{1}][label]">
                                </td>
                                <td>
                                    <input type="number" class="form-control" data-name="options[{{$option->id}}][values][{1}][price]">
                                </td>

                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" data-name="options[{{$option->id}}][values][{1}][price_type]">
                                        <option selected value="fixed">{{ __('Fixed') }}</option>
                                        <option value="percent">{{ __('Percent') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-option-value-{{ $option->id }}">
                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @if (in_array($option->type, array_column(config('types.1.children'), 'type')))
                            @foreach ($option->values as $value)
                            <tr class=" bg-white border" id="clone-option-value-{{ $option->id }}">
                                <td>
                                    <i class="fal fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" value="{{ $value->id}}" name="options[{{$option->id}}][values][{{ $value->id }}][id]">

                                    <input type="text" class="form-control" name="options[{{$option->id}}][values][{{ $value->id }}][label]" value="{{ $value->translation()->label }}">
                                </td>
                                <td>
                                    <input type="number" class="form-control" value="{{ $value->price }}" name="options[{{$option->id}}][values][{{ $value->id }}][price]">
                                </td>

                                <td>
                                    <select data-minimum-results-for-search="Infinity" class="form-control" name="options[{{$option->id}}][values][{{ $value->id }}][price_type]">
                                        <option {{ $value->price_type != 'fixed' ?: 'selected' }} value="fixed">{{ __('Fixed') }}</option>
                                        <option {{ $value->price_type != 'percent' ?: 'selected' }} value="percent">{{ __('Percent') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-option-value-{{ $option->id }}">
                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <button data-toggle="clone" data-clone="#clone-option-value-{{ $option->id }}" data-target="#clone-option-values-{{ $option->id }}" data-replace="1" type="button" class="btn btn-secondary">
                    {{ __('Add New Value') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
