<div id="attributes" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Attributes') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <th class="border-right-0" width="40px"></th>
                        <th class="border-right-0 border-left-0" width="250px">
                            {{ __('Attribute') }}
                        </th>
                        <th class="border-right-0 border-left-0">{{ __('Value') }}</th>
                        <th class="border-left-0" width="40px"></th>
                    </thead>
                    <tbody data-toggle="ui-drag" id="clone-attributes">

                        <tr class="bg-white d-none border" id="clone-attribute">
                            <td>
                                <i class="fal fa-grip-vertical p-2"></i>
                            </td>
                            <td>
                                <select class="form-control" id="attribute"
                                    data-name="attributes[{0}][attribute_id]"
                                    data-placeholder="{{ __('Please Select') }}"
                                    data-target="#attribute-value-{0}">
                                    @foreach ($attributeSet as $set)
                                        @if ($set->attributes->count())
                                            <optgroup label="{{ $set->translation()->name }}">
                                                @foreach ($set->attributes as $attribute)
                                                    @php
                                                        $values = collect();
                                                        foreach ($attribute->values as $key => $value) {
                                                            $value->name = $value->translation()->name;
                                                            $values->add($value);
                                                        }
                                                    @endphp
                                                    <option value="{{ $attribute->id }}"
                                                        data-items='{!! $values !!}'>
                                                        {{ $attribute->translation()->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endif

                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select multiple class="form-control" id="attribute-value-{0}"
                                    data-name="attributes[{0}][values][]">
                                </select>
                            </td>
                            <td>
                                <button class="btn shadow-none px-3" type="button"
                                    data-toggle="clone-delete" data-target="#clone-attribute">
                                    <i class="fal fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @if (old('attributes'))
                            @include('admin.product.templates.form.oldvalues.attribute',['attributes' => old('attributes',[])])
                        @endif


                    </tbody>
                </table>
            </div>
            <button data-toggle="clone" data-clone="#clone-attribute"
                data-target="#clone-attributes" type="button" class="btn btn-secondary">
                {{ __('Add New Value') }}
            </button>
        </div>

    </div>
</div>
