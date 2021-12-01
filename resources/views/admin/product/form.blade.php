@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.product.create')
                    @include('admin.product.templates.form.create')
                @else
                    @include('admin.product.templates.form.edit')
                @endif
                @foreach ($options as $option)
                    @include('admin.product.templates.form.optionGlobal')
                @endforeach

            </div>
        </div>
    </div>
@endsection
@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/quill/dist/quill.snow.css') }}" type="text/css">
    @if (app()->getLocale() != 'en')
        <link rel="stylesheet" href="{{ asset('vendor/quill/dist/locales/' . app()->getLocale() . '.css') }}"
            type="text/css">
    @endif
    <style>
        .w-100px {
            width: 100px !important;
        }

        .h-100px {
            height: 100px !important;
        }

        .list-group-item {
            border-left: 0;
            border-right: 0;
        }

    </style>
@endpush
@push('scripts-src')
    <script src="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/dist/quill-image-resize.js') }}"></script>
    <script src="{{ asset('vendor/quill/dist/quill-image-drop.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
    @filemanagerAssets

@endpush

@push('scripts')
    <script>
        var options = {
            onadd: ($clone) => {

                $clone.find(`#download`).filemanager({
                    url: `{{ env('FILEMANAGER_URL') }}`,
                    _token: _token,
                    multiple: false,
                });

                select2($clone.find(`select:not(.select2-hidden-accessible)`));
                $clone.find(`#attribute`).change(function() {
                    var id = $(this).val();
                    var items = $(this).find(`option[value=${id}]`).data('items');
                    var target = $(this).data('target');
                    $(target).val(null).trigger('change').html('');
                    $.each(items, (i, d) => {
                        $(target).append(
                            `<option value=${d.id}>${d.name}</option>`);
                    });
                });

                var $selectValues = $clone.find(`#type-select`).find(`tbody tr:not(:first)`).clone();

                $clone.find(`[data-toggle="type"]`).change(function() {
                    var id = $(this).val();
                    var parent = $(this).find(`option[value=${id}]`).data('parent');
                    $clone.find(`#type-text-date`).addClass('d-none');


                    if (parent == 'text' || parent == 'date') {
                        $clone.find(`#type-select`).addClass('d-none');

                        $clone.find(`#type-select`).addClass('d-none').find(`tbody tr:not(:first)`)
                            .remove();
                        $clone.find(`#type-text-date`).removeClass('d-none');
                    } else {

                        if ($clone.find(`#type-select`).hasClass('d-none')) {
                            $clone.find(`#type-select`).find(`tbody tr:not(:first)`).remove();
                            $clone.find(`#type-select`).find(`tbody`).append($selectValues);
                        }
                        $clone.find(`#type-select`).removeClass('d-none');
                    }
                });
                $clone.find(`#type-select`).find(`select`).select2('destroy');
                new Clone($clone.find(`[data-toggle="clone"]`), {
                    onadd: ($clone) => {
                        select2($clone.find(`select`));
                    }
                });
            }
        }
        new Clone($(`[data-toggle="clone"]`), options);

        var _token = $('meta[name="csrf-token"]').attr("content");
        $(`#fimage`).filemanager({
            url: `{{ env('FILEMANAGER_URL') }}`,
            _token: _token,
            multiple: false,
        });

        $(`#fimages`).filemanager({
            url: `{{ env('FILEMANAGER_URL') }}`,
            _token: _token,
            multiple: true,
            input_name: 'images[]',
            template: function(data) {
                var $t = $(`
                        <div class="avatar rounded position-relative mr-1 w-100px h-100px border bg-white">
                            <i id="del" class="d-none fa-times fal font-weight-bolder position-absolute right-1 top-1" style="-webkit-text-stroke: 1px var(--danger);cursor: pointer;"></i>
                            <input type="hidden" class="form-control" name="${this.input_name}" value="${data.path}">
                            <img src="${data.path}">
                        </div>
                    `);
                $t.mouseover(() => {
                    $t.find('#del').removeClass('d-none');
                }).mouseleave(() => {
                    $t.find('#del').addClass('d-none');
                });
                $t.find('#del').click(() => {
                    $t.remove();
                });
                var target = $(`#fimages`).data('target');
                $(target).append($t);
            }
        });

        $(`#add-option-global`).click((e) => {
            e.preventDefault();
            var id = $(`#option-global`).val();
            if (id) {
                var html = $(`[dataid=${id}]`).prop('outerHTML');
                html = html.replaceAll('{0}', datetime());
                var $html = $(html);
                $html.removeAttr('dataid');
                $html.removeClass('d-none');
                options.onadd($html);
                var select = $html.find(`#type-select`)
                    .find(`tbody tr:not(:first)`)
                    .find(`select:not(.select2-hidden-accessible)`);
                select2(select);
                $(`#clone-options`).append($html);
            }
        });
        options.onadd($(`[data-toggle="old"]`));
        var select = $(`[data-toggle="old"]`).find(`#type-select`)
            .find(`tbody tr:not(:first)`)
            .find(`select:not(.select2-hidden-accessible)`);
        select2(select);


    </script>
@endpush
