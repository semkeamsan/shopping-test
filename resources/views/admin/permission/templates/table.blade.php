<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}" data-text-search="{{ __('Role') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Role') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                    <a href="#">{{ $row->translation()->name }}</a>
                </td>
                <td>
                    @include('admin.permission.templates.children',['collection' => $row->permissions])
                </td>

            </tr>
        @endforeach
    </tbody>

</table>
