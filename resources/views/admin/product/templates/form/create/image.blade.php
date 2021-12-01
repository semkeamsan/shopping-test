<div id="images" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Images') }}</h3>
        </div>
        <div class="card-body d-none">
            <h3 class="mb-0">{{ __('Base Image') }}</h3>
            {!! Form::label('feature', __('Image'), ['class' => 'form-control-label d-none']) !!}
            {!! Form::hidden('feature', old('Image', asset('images/default.png')), ['class' => 'custom-file-input']) !!}
            <br>
            <button type="button" class="btn btn-secondary mb-3" id="fimage"
                data-target-input="#feature" data-target-image="#im-image">
                <i class="fal fa-folder-open"></i>
                {{ __('Browse') }}
            </button>
            <div class="col p-3 border" style="width:135px;height: 135px;">
                <div class="avatar rounded" style="width:100px;height: 100px;">
                    <img id="im-image" src="{{ asset('images/default.png') }}">
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            {{-- <h3 class="mb-0">{{ __('Additional Images') }}</h3>
            <br> --}}
            <button type="button" class="btn btn-secondary mb-3" id="fimages"
                data-target="#im-images">
                <i class="fal fa-folder-open"></i>
                {{ __('Browse') }}
            </button>
            <div data-toggle="ui-drag" class="p-2 border" id="im-images"
                style="min-height: 230px; max-height: 100%">
                @include('admin.product.templates.form.oldvalues.image',['images' => old('images',[])])
            </div>
        </div>
    </div>
</div>
