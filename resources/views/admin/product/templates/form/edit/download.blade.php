<div id="downloads" class="tab-pane fade">
    <div class="card border m-0 shadow-none">
        <div class="card-header">
            <h3 class="mb-0">{{ __('Downloads') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">
                                {{ __('Downloadable Files') }}
                            </th>
                        </tr>
                        <tr>
                            <th class="border-right-0" width="40px"></th>
                            <th class="border-right-0 border-left-0">
                                {{ __('File') }}
                            </th>
                            <th class="border-left-0" width="40px"></th>
                        </tr>
                    </thead>
                    <tbody data-toggle="ui-drag" id="clone-downloads">
                        <tr class="bg-white d-none border" id="clone-download">
                            <td>
                                <i class="fal fa-grip-vertical p-2"></i>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="downloads[]" id="file-{0}">
                                    <div class="input-group-append" id="download" data-target-input="#file-{0}">
                                        <span class="input-group-text py-0 text-sm">
                                            {{ __('Choose') }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete"
                                    data-target="#clone-download">
                                    <i class="fal fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @include('admin.product.templates.form.oldvalues.download',['downloads' => old('downloads',$product->downloads)])
                    </tbody>
                </table>
            </div>
            <button data-toggle="clone" data-clone="#clone-download" data-target="#clone-downloads" type="button"
                class="btn btn-secondary">
                {{ __('Add New Download') }}
            </button>
        </div>
    </div>
</div>
