<div class="form-row">
    <div class="col-xl-5">
        <div class="tree">
            <div>
                <a href="#" class="collapse-all">{{ __('Collapse All') }}</a>
                |
                <a href="#" class="expand-all">{{ __('Expand All') }}</a>
            </div>
        </div>
    </div>
    <div class="col-xl-7 d-none" id="add-edit">
        <div class="card border shadow-none m-0 sticky-top">
            <div class="card-header border-0">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item {{ config('page.permissions')->contains('create-store') ?: 'd-none' }}"
                        role="presentation">
                        <a class="nav-link active" id="add-tab" data-toggle="tab" href="#add" role="tab"
                            aria-controls="add" aria-selected="true">
                            {{ __('Add') }}
                        </a>
                    </li>
                    <li class="nav-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                        role="presentation">
                        <a class="nav-link d-none" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                            aria-controls="edit" aria-selected="false">
                            {{ __('Edit') }}
                        </a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" data-toggle="tab" href="#" role="tab" onclick="$('#add-edit').addClass('d-none')">
                            <i class="fal fa-eye-slash" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active {{ config('page.permissions')->contains('create-store') ?: 'd-none' }}"
                        id="add" role="tabpanel" aria-labelledby="add-tab">
                        @include('admin.category.templates.form.create')
                    </div>
                    <div class="tab-pane fade {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                        id="edit" role="tabpanel" aria-labelledby="edit-tab">
                        @include('admin.category.templates.form.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('styles-link')
    <link rel="stylesheet" href="{{ asset('vendor/tree/tree.css') }}" type="text/css">
@endpush

@push('scripts-src')
    <script src="{{ asset('vendor/tree/tree.js') }}"></script>
@endpush

@push('scripts')
    <script>
        var _token = $('meta[name="csrf-token"]').attr("content");
        var notify = {
            icon: 'fal fa-check-circle',
            message: "",
            url: ""
        };
        var notify2 = {
            element: "body",
            type: 'success',
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 15,
                y: 15
            },
            delay: 2500,
            url_target: "_blank",
            template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify w-auto" role="alert"><span class="alert-icon" data-notify="icon"></span> <div class="alert-text"</div> <span class="alert-title" data-notify="title">{1}</span> <span data-notify="message">{2}</span></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        };

        var permissions = {!! config('page.permissions') !!};
        var onedit = (data) => {
            $(`#edit-tab`).removeClass('d-none');
            $(`#parent`).removeClass('d-none');
            $(`[name="parent_id"]`).val(data.id);
            $.each(data.translations, (i, d) => {
                if (d.locale == $('html').attr('lang')) {
                    data.name = d.name
                    return;
                }
            });
            $(`[name="parent"]`).val(data.name);
            $('#parent').removeClass('d-none');
            var url = $(`#edit`).find(`form`).attr('action');
            $(`#edit`).find(`form`).attr('action',
                `{{ route('admin.category.index') }}/${data.id}`);
            $(`#edit`).find(`[name="slug"]`).val(data.slug);
            $(`#edit`).find(`[name="name"]`).val(data.name);

            $(`#edit`).find(`[name="slug"]`).focus();
        }
        var reset = () => {
            $(`#edit-tab`).addClass('d-none');
            $(`#parent`).addClass('d-none');
            $(`[name="parent_id"]`).val(null);
            $(`#add`).find(`[name="slug"]`).focus();
        }

        var options = {
            data: {!! $collection !!},
            callback: function($t) {
                onedit($t.data('item'));
            },
            onadd: ($t) => {
                $(`#add-edit`).removeClass('d-none');
                $(`#add-tab`).click();
                reset();
                onedit($t.data('item'));
            },
            onedit: ($t) => {
                $(`#add-edit`).removeClass('d-none');
                $(`#edit-tab`).click();
                onedit($t.data('item'));
            },
            ondel: ($t, data) => {
                $.post(`{{ route('admin.category.index', '') }}/${data.id}`, {
                    _token: _token,
                    _method: 'delete',
                }).done(res => {
                    $t.remove();
                    reset();
                    notify.message = "{!! __('Delete successfully') !!}";
                    $.notify(notify, notify2);
                });
            },
        };


        if ($.inArray('create-store', permissions) == -1) {
            delete options.onadd;
        }
        if ($.inArray('edit-update', permissions) == -1) {
            delete options.onedit;
        }

        if ($.inArray('destroy', permissions) == -1) {
            delete options.ondel;
        }
        var tree = new Tree($('.tree'), options);
        tree.init();
        $(`#create`).click((e) => {
            e.preventDefault();
            $(`#add-edit`).removeClass('d-none');
            $(`#add-tab`).click();
            tree.$0.find('.active').removeClass('active');
            reset();
        });

        $(`form.needs-validation`).submit(function(e) {
            var $form = $(this);
            e.preventDefault();
            var url = $(this).attr('action');
            if (e.target.checkValidity()) {
                var formData = new FormData(e.target);
                $.ajax({
                    url: url,
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: res => {
                        if (res) {
                            var $t = tree.parent(res);
                            if (formData.get('_method')) {
                                $.each(res.translations, (i, d) => {
                                    if (d.locale == $('html').attr('lang')) {
                                        res.name = d.name
                                        return;
                                    }
                                });
                                $(`[category="${res.id}"]`).data('item', res).find(`>.cate>a`)
                                    .html(`<i class="folder fal"></i> ${res.name}`);
                                    onedit(res);
                            } else if ($(`[category="${res.parent_id}"]`).length) {
                                $(`[category="${res.parent_id}"]`).addClass('tree-show');
                                $(`[category="${res.parent_id}"]`).find('.up-down')
                                    .removeClass('invisible');
                                if ($(`[category="${res.parent_id}"]`).find('>ul').length) {
                                    $(`[category="${res.parent_id}"]`).find('>ul').append($t);
                                } else {
                                    var $ul = $(`<ul>`);
                                    $ul.append($t);
                                    $(`[category="${res.parent_id}"]`).append($ul);
                                }

                            } else {
                                tree.$0.find('>ul').append($t);
                                $form.get(0).reset();
                            }

                            $form.removeClass('was-validated');
                            $form.find(`[name]`).each(function() {
                                var message = $(this).next().data('massage');
                                if (message) {
                                    $(this).next().removeClass('d-block').text(message);
                                }
                            });

                            notify.message = formData.get('_method') ? "{!! __('Edit successfully') !!}" :
                                "{!! __('Add successfully') !!}";
                            $.notify(notify, notify2);
                        }
                    },
                    error: res => {
                        $form.addClass('was-validated');
                        if (res.responseJSON.errors) {
                            $.each(res.responseJSON.errors, (i, d) => {
                                var message = $form.find(`[name="${i}"]`).next().text();
                                if (!$form.find(`[name="${i}"]`).next().data('massage')) {
                                    $form.find(`[name="${i}"]`).next().data('massage', message);
                                };
                                $form.find(`[name="${i}"]`).next().addClass('d-block').text(d);
                            });
                        }
                    }
                });
            }
        });
    </script>
@endpush
