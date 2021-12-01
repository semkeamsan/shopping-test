@foreach ($downloads as $key => $download)
    <tr class="bg-white border" id="clone-download">
        <td>
            <i class="fal fa-grip-vertical p-2"></i>
        </td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control" name="downloads[]" id="file-{{ $key }}"
                    value="{{ $download }}">
                <div class="input-group-append" id="download" data-target-input="#file-{{ $key }}">
                    <span class="input-group-text py-0 text-sm">
                        {{ __('Choose') }}
                    </span>
                </div>
            </div>
        </td>
        <td>
            <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-download">
                <i class="fal fa-trash" aria-hidden="true"></i>
            </button>
        </td>
    </tr>
@endforeach
