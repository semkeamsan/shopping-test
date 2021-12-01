{!! Form::open([
    'url' => route('admin.attribute.store'),
    'class' => 'needs-validation',
    'novalidate' => true,
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 mb-3">
                @include('admin.attribute.templates.form.tab')
            </div>
            <div class="col-xl-9 mb-3">
                <div class="tab-content">
                    <div id="general" class="tab-pane fade show active">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('General') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <label for="attribute_set_id" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Attribute Set') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        <select class="form-control" data-toggle="select" name="attribute_set_id"
                                            required>
                                            @foreach ($attributeSet as $set)
                                                <option {{ old('attribute_set_id') != $set->id ?: 'selected' }}
                                                    value="{{ $set->id }}">
                                                    {{ $set->translation()->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('attribute_set_id')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Attribute Set')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="name" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Name') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        <div class="input-group">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <img src="{{ asset('images/flags/' . app()->getlocale() . '.svg') }}"
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
                            </div>
                        </div>
                    </div>
                    <div id="values" class="tab-pane fade">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('Price') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="border-right-0" width="40px"></th>
                                            <th class="border-right-0 border-left-0">{{ __('Value') }}</th>
                                            <th class="border-left-0" width="40px"></th>
                                        </thead>
                                        <tbody data-toggle="ui-drag" id="clone-values">
                                            <tr class="d-none bg-white border" id="clone-value">
                                                <td>
                                                    <i class="fa fa-grip-vertical" style="padding: 15px 5px 0 0"></i>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        data-name="values[{0}][name]">
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none px-3" type="button"
                                                        data-toggle="clone-delete" data-target="#clone-value">
                                                        <i class="fal fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('admin.attribute.templates.form.oldvalue',['values'=>old('values',
                                            [])])


                                        </tbody>
                                    </table>
                                </div>
                                <button data-toggle="clone" data-clone="#clone-value" data-target="#clone-values"
                                    type="button" class="btn btn-secondary">
                                    {{ __('Add New Value') }}
                                </button>
                            </div>

                        </div>
                    </div>
                    <div id="seo" class="tab-pane fade">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('SEO') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <label for="slug" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Slug') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
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
                                <div class="form-group form-row">
                                    {!! Form::hidden('meta[translation][locale]', app()->getLocale()) !!}
                                    {!! Form::label('meta_title', __('Meta Title'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                                    <div class="col-xl-6">
                                        {!! Form::text('meta[translation][title]', null, ['class' => 'form-control']) !!}
                                        @error('meta[translation][title]')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Meta Title')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    {!! Form::label('meta_description', __('Meta Description'), ['class' => 'col-xl-3 col-form-label form-control-label']) !!}
                                    <div class="col-xl-6">
                                        {!! Form::textarea('meta[translation][description]', null, ['class' => 'form-control']) !!}
                                        @error('meta[translation][description]')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Meta Description')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.attribute.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
