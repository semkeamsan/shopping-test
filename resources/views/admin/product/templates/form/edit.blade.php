{!! Form::open([
    'url' => route('admin.product.update', $product),
    'class' => 'needs-validation',
    'novalidate' => true,
    'method' => 'put',
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
                    @include('admin.product.templates.form.edit.general')
                    @include('admin.product.templates.form.edit.price')
                    @include('admin.product.templates.form.edit.inventory')
                    @include('admin.product.templates.form.edit.image')
                    @include('admin.product.templates.form.edit.download')
                    @include('admin.product.templates.form.edit.seo')
                    @include('admin.product.templates.form.edit.attribute')
                    @include('admin.product.templates.form.edit.option')
                    @include('admin.product.templates.form.edit.related')
                    @include('admin.product.templates.form.edit.up')
                    @include('admin.product.templates.form.edit.cross')
                    @include('admin.product.templates.form.edit.additional')
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.product.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
