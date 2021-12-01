@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.role.create')
                    @include('admin.role.templates.form.create')
                @else
                    @include('admin.role.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" type="text/css">
@endpush
@push('scripts-src')
    <script src="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/select2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
@endpush
@push('scripts')
    <script>
        function fn() {
            var allck = [];
            $(`table tbody tr input[type="checkbox"][data-toggle]`).each(function() {
                var c = $(this).prop('checked');
                allck.push(c);
            });
            if ($.inArray(false, allck) != -1) {
                $(`[data-toggle="ck-all"]`).prop('checked', false);
            } else {
                $(`[data-toggle="ck-all"]`).prop('checked', allck.every(v => v === allck[0]));
            }

        }
        $(document).on('change', `[data-toggle="ck-all"]`, function() {
            var ck = $(this).prop('checked');
            $('table tbody tr').each(function() {
                $(this).find(`[data-toggle="ck-group"]`).prop('checked', ck).live-input('change');
            });
            if (ck == false) {
                $(this).prop('checked', ck);
            }
        });
        $(document).on('change', `[data-toggle="ck-group"]`, function() {
            var ck = $(this).prop('checked');
            $(`[data-toggle="ck-all"]`).prop('checked', ck);
            $(this).parents('tr').find(`[data-toggle="ck-one"]`).prop('checked', ck);
            fn();
        });
        $(document).on('change', `[data-toggle="ck-one"]`, function() {
            var ck = $(this).prop('checked');
            var allck = [];
            $(this).parents('tr').find(`[data-toggle="ck-one"]`).each(function() {
                var c = $(this).prop('checked');
                allck.push(c);
            });

            if ($.inArray(false, allck) != -1) {
                $(this).parents('tr').find(`[data-toggle="ck-group"]`).prop('checked', false);
            } else {
                $(this).parents('tr').find(`[data-toggle="ck-group"]`).prop('checked', allck.every(v => v === allck[
                    0]));
            }



            fn();
        });
        $(`[data-toggle="route-add"]`).each(function() {
            var name = $(this).data('name');
            var id = $(this).data('id');
            $(this).find('#add').click((e) => {
                e.preventDefault();
                var val = $(this).find('input').val();
                if (val) {
                    $(this).find('input').val('');
                    var $li = $(`<li class="nav-item">
                        <div class="custom-control custom-checkbox">
                            <input checked
                                type="checkbox" class="custom-control-input"
                                name="${name}"
                                data-toggle="ck-one"
                                id="${id}-${val}"
                                value="${val}">
                            <label class="custom-control-label"
                                for="${id}-${val}">${val}</label>
                                <i id="remove" class="fal fa-times text-sm text-danger" aria-hidden="true" style="vertical-align: 5px;"></i>
                        </div>
                    </li>`);
                    $li.find(`#remove`).click(()=>{
                        $li.remove();
                    });
                    $(this).before($li);
                }
            });
        });
    </script>

@endpush
