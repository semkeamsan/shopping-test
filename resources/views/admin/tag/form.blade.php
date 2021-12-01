@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.tag.create')
                    @include('admin.tag.templates.form.create')
                @else
                    @include('admin.tag.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
