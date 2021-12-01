@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.option.create')
                    @include('admin.option.templates.form.create')
                @else
                    @include('admin.option.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
@endpush
@push('scripts-src')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
@endpush

@push('scripts')
    <script>
        var $selectValues =  $(`#type-select`).find(`tbody tr:not(:first)`).clone();

        $(`[name="type"]`).change(function() {
            var id = $(this).val();
            var parent = $(this).find(`option[value=${id}]`).data('parent');
            $(`#alert`).addClass('d-none');
            $(`#type-text-date`).addClass('d-none');

            if (parent == 'text' || parent == 'date') {
                $(`#type-select`).addClass('d-none');

                $(`#type-select`).addClass('d-none').find(`tbody tr:not(:first)`).remove();
                $(`#type-text-date`).removeClass('d-none');
            } else {
                if($(`#type-select`).hasClass('d-none')){
                    $(`#type-select`).find(`tbody tr:not(:first)`).remove();
                    $(`#type-select`).find(`tbody`).append($selectValues);
                }
                $(`#type-select`).removeClass('d-none');


            }


        });

        new Clone($(`[data-toggle="clone"]`),{
            onadd : ($clone) =>{
                select2($clone.find(`select`));
            }
        });
    </script>
@endpush
