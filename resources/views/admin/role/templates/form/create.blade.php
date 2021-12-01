{!! Form::open([
    'url' => route('admin.role.store'),
    'class' => 'needs-validation',
    'novalidate' => true,
]) !!}
<div class="card">

    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                {!! Form::label('slug', __('Slug'), ['class' => 'form-control-label']) !!}
                <span class="text-danger text-xs"> * </span>
                {!! Form::text('slug', null, ['class' => 'form-control', 'required' => true]) !!}
                @error('slug')
                    <div class="error-feedback d-block">
                        {{ $message }}
                    </div>
                @else
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('Slug')]) }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                        <span class="text-danger text-xs"> * </span>

                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/flags/' .app()->getlocale() . '.svg') }}"
                                        width="20px">
                                </span>
                            </div>
                            @error('name')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    {{ __('validation.required', ['attribute' => __('Name')]) }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        {!! Form::label('description', __('Description'), ['class' => 'form-control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                {!! Form::label('permission', __('Permissions'), ['class' => 'form-control-label']) !!}
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" data-toggle="ck-all"
                                        id="ck-all">
                                    <label class="custom-control-label pr-5" for="ck-all">{{ __('All') }}</label>
                                </div>
                            </th>
                        </thead>
                        <tbody data-toggle="ui-drag">
                            @foreach ($permissions as $i => $permission)
                                <tr class="bg-white w-100">
                                    <td>
                                        {!! Form::hidden('permissions[' . $i . '][slug]', $permission->slug) !!}
                                        {!! Form::hidden('permissions[' . $i . '][icon]', $permission->icon) !!}
                                        @foreach ($permission->translations()->get(['locale','name']) as $key => $translation)
                                            {!! Form::hidden('permissions[' . $i . '][translations]['.$key.'][locale]', $translation->locale) !!}
                                            {!! Form::hidden('permissions[' . $i . '][translations]['.$key.'][name]', $translation->name) !!}
                                        @endforeach
                                        <button type="button" class="btn" data-toggle="collapse"
                                            aria-expanded="true" aria-controls="collapse-{{ $i }}"
                                            data-target="#collapse-{{ $i }}">
                                            <i class="{{ $permission->icon }}" aria-hidden="true"></i>
                                            {{ $permission->translation()->name }}
                                        </button>
                                    </td>
                                    <td>
                                        <div class="collapse {{ $loop->first ? 'show' : 'show' }}"
                                            id="collapse-{{ $i }}">
                                            <ul class="navbar-nav">
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            data-toggle="ck-group" id="ck-{{ $i }}">
                                                        <label class="custom-control-label"
                                                            for="ck-{{ $i }}">{{ __('All') }}</label>
                                                    </div>
                                                    <ul class="navbar-brand">

                                                        @foreach ($permission->routes->union(['index', 'create-store', 'edit-update', 'show', 'destroy']) as $route)
                                                            <li class="nav-item">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        name="permissions[{{ $i }}][routes][]"
                                                                        data-toggle="ck-one"
                                                                        id="ck-{{ $i }}-{{ $route }}"
                                                                        value="{{ $route }}">
                                                                    <label class="custom-control-label"
                                                                        for="ck-{{ $i }}-{{ $route }}">{{ __($route) }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                        <li data-toggle="route-add"
                                                            data-name="permissions[{{ $i }}][routes][]"
                                                            data-id="ck-{{ $i }}">
                                                            <div class="input-group input-group-sm">
                                                                <input class="form-control form-control-sm" type="text">
                                                                <div class="input-group-append">
                                                                    <a href="#" class="input-group-text" id="add">
                                                                        <i class="fal fa-plus"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.role.index') }}">{{ __('Back') }}</a>
        <div class="float-right">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
