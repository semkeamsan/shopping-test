<div id="related-products" class="tab-pane fade ">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Related Products') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th width="40px"></th>
                        <th class="border-left-0">{{ __('Products') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($relations as $relation)
                        <tr>
                            <td class="align-middle">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="related-{{ $relation->id }}"
                                        name="related[]" value="{{  $relation->id }}" {{ in_array( $relation->id,old('related',$product->related->pluck('id')->toArray()))?'checked' : null }}>
                                    <label class="custom-control-label"for="related-{{ $relation->id }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#" target="_blank" class="border avatar avatar-xl bg-transparent mr-3">
                                        <img src="{{ $relation->images->count() ? $relation->images->first() : asset('images/default.png') }}">
                                    </a>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $relation->translation()->name }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
