<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}" data-paging="true">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Gender') }}</th>
            <th>{{ __('Email & Phone') }}</th>
            <th>{{ __('Role') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th>{{ __('Status') }}</th>
            <th class="{{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $key  =>  $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <div class="media align-items-center">
                        <a href="#" target="_blank" class="avatar avatar-sm rounded-circle mr-3">
                            <img src="{{ $row->avatar }}">
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $row->name }}</span>
                        </div>
                    </div>
                </td>
                <td>{{ __(Str::title($row->gender)) }}</td>
                <td>
                    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
                    <br>
                    <a href="tel:{{ $row->phone }}"> {{ $row->phone }}</a>
                </td>
                <td>{{ $row->role->{app()->getLocale()} }}</td>
                <td>{{ $row->created_at ? $row->created_at->diffForHumans() : null }}</td>
                <td>{{ $row->updated_at ? $row->updated_at->diffForHumans() : null }}</td>
                <td>{{ $row->status }}</td>
                <td class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                    <div class="dropdown dropleft">
                        <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                            <a class="dropdown-item {{ config('page.permissions')->contains('show')?:'d-none' }}" href="{{ route('admin.user.show', $row) }}">
                                <i class="fal fa-eye"></i>
                                {{ __('View') }}
                            </a>
                            <a class="dropdown-item {{ config('page.permissions')->contains('edit-update')?:'d-none' }}" href="{{ route('admin.user.edit', $row) }}">
                                <i class="fal fa-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            {!! Form::open(['url' => route('admin.user.destroy', $row), 'method' => 'delete']) !!}
                            <button type="submit" class="dropdown-item {{ config('page.permissions')->contains('destroy')?:'d-none' }}">
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
