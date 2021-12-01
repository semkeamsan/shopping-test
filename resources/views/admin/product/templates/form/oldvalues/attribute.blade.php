@foreach ($attributes as $key => $attr)
    @php
        $attributeValues =  collect();
    @endphp
    <tr data-toggle="old" class="bg-white border" id="clone-attribute">
        <td>
            <i class="fal fa-grip-vertical p-2"></i>
        </td>
        <td>
            <select class="form-control" id="attribute" name="attributes[{{ $key }}][attribute_id]"
                data-placeholder="{{ __('Please Select') }}" data-target="#attribute-value-{{ $key }}">
                @foreach ($attributeSet as $set)
                    @if ($set->attributes->count())
                        <optgroup label="{{ $set->translation()->name }}">
                            @foreach ($set->attributes as $attribute)
                                @php
                                    if (@$attr['attribute_id'] == $attribute->id) {
                                        $attributeValues =   $attribute->values;
                                    }

                                    $values = collect();
                                    foreach ($attribute->values as $value) {
                                        $value->name = $value->translation()->name;
                                        $values->add($value);
                                    }
                                @endphp
                                <option {{ @$attr['attribute_id'] != $attribute->id ?: 'selected' }} value="{{ $attribute->id }}" data-items='{!! $values !!}'>
                                    {{ $attribute->translation()->name }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endif

                @endforeach
            </select>
        </td>
        <td>
            <select multiple class="form-control" id="attribute-value-{{ $key }}" name="attributes[{{ $key }}][values][]">
                @foreach ($attributeValues as $value)
                        <option {{ collect(@$attr['values']??[])->search($value->id) === false ?: 'selected' }} value="{{ $value->id }}">
                            {{ $value->translation()->name }}
                        </option>
                @endforeach
            </select>
        </td>
        <td>
            <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-attribute">
                <i class="fal fa-trash" aria-hidden="true"></i>
            </button>
        </td>
    </tr>
@endforeach
