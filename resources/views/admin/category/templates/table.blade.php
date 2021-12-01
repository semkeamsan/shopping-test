<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}" data-text-search="{{ __('Category') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Category') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <a href="#">{{ $row->translation()->name }}</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
