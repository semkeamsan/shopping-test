<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Price') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>
                <div class="media align-items-center">
                    <a href="#" target="_blank" class="border avatar avatar-xl bg-transparent mr-3">
                        <img src="{{ $row->images->count() ? $row->images->first() : asset('images/default.png') }}">
                    </a>
                    <div class="media-body">
                        <span class="name mb-0 text-sm">{{ $row->translation()->name }}</span>
                    </div>
                </div>
            </td>
            <td>{{ $row->price }}</td>
            <td>
                <span class="badge badge-lg badge-dot">
                    @if ($row->is_active )
                    <i class="bg-success"></i>
                    @else
                    <i class="bg-danger"></i>
                    @endif
                </span>
            </td>
            <td>{{ $row->created_at ? $row->created_at->diffForHumans() : null }}</td>
            <td>{{ $row->updated_at ? $row->updated_at->diffForHumans() : null }}</td>
            <td class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                <div class="dropdown dropleft">
                    <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" product="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                        <a class="dropdown-item {{ config('page.permissions')->contains('show') ?: 'd-none' }}" href="{{ route('admin.product.show', $row) }}">
                            <i class="fal fa-eye"></i>
                            {{ __('View') }}
                        </a>
                        <a class="dropdown-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}" href="{{ route('admin.product.edit', $row) }}">
                            <i class="fal fa-edit"></i>
                            {{ __('Edit') }}
                        </a>
                        {!! Form::open(['url' => route('admin.product.destroy', $row), 'method' => 'delete']) !!}
                        <button type="submit" class="dropdown-item {{ config('page.permissions')->contains('destroy') ?: 'd-none' }}">
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
