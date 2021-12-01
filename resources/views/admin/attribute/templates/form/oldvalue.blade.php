@foreach ($values as $key => $value)
    <tr class="bg-white border" id="clone-value">
        <td>
            <i class="fa fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
        </td>
        <td>
            <input type="text" class="form-control" name="values[{{ $key }}][name]"
                value="{{ @$value['name'] }}">
        </td>
        <td>
            <button class="btn shadow-none px-3" type="button" data-toggle="clone-delete" data-target="#clone-value">
                <i class="fal fa-trash" aria-hidden="true"></i>
            </button>
        </td>
    </tr>
@endforeach
