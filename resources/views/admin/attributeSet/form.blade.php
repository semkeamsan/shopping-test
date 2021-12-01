@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.attribute-set.create')
                    @include('admin.attributeSet.templates.form.create')
                @else
                    @include('admin.attributeSet.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
