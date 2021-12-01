<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Permissions') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th
                class="{{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                    {{ $row->translation()->name }}
                </td>
                <td class="form-row">
                    @foreach ($row->permissions as $permission)
                        <div class="col-auto mb-2">
                            <a href="#" class="badge badge-lg badge-pill badge-primary">
                                <i class="{{ $permission->icon }}"></i>
                                {{ $permission->translation()->name }}
                            </a>
                        </div>
                    @endforeach
                </td>
                <td>{{ $row->created_at ? $row->created_at->diffForHumans() : null }}</td>
                <td>{{ $row->updated_at ? $row->updated_at->diffForHumans() : null }}</td>
                <td
                    class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                    <div class="dropdown dropleft">
                        <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                            <a class="dropdown-item {{ config('page.permissions')->contains('show') ?: 'd-none' }}"
                                href="{{ route('admin.role.show', $row) }}">
                                <i class="fal fa-eye"></i>
                                {{ __('View') }}
                            </a>
                            <a class="dropdown-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                                href="{{ route('admin.role.edit', $row) }}">
                                <i class="fal fa-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            {!! Form::open(['url' => route('admin.role.destroy', $row), 'method' => 'delete']) !!}
                            <button type="submit"
                                class="dropdown-item {{ config('page.permissions')->contains('destroy') ?: 'd-none' }}">
                                <i class="fal fa-trash"></i>
                                {{ __('Delete') }}
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
