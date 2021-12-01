{!! Form::open([
    'url' => route('admin.product.store'),
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
                @include('admin.product.templates.form.tab')
            </div>
            <div class="col-xl-9 mb-3">
                <div class="tab-content">
                    @include('admin.product.templates.form.create.general')
                    @include('admin.product.templates.form.create.price')
                    @include('admin.product.templates.form.create.inventory')
                    @include('admin.product.templates.form.create.image')
                    @include('admin.product.templates.form.create.download')
                    @include('admin.product.templates.form.create.seo')
                    @include('admin.product.templates.form.create.attribute')
                    @include('admin.product.templates.form.create.option')
                    @include('admin.product.templates.form.create.related')
                    @include('admin.product.templates.form.create.up')
                    @include('admin.product.templates.form.create.cross')
                    @include('admin.product.templates.form.create.additional')
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.product.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
