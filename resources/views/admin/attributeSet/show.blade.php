@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0">{{ __('View') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="timeline timeline-one-side" data-timeline-content="axis"
                                    data-timeline-axis-style="dashed">
                                    <div class="timeline-block">
                                        <span class="timeline-step badge-primary">

                                        </span>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between pt-1">
                                                <div class="text-sm font-weight-bold">
                                                    <span class="text-muted">{{ __('Id') }} : </span>
                                                    {{ $attributeSet->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach (config('languages') as $language)

                                        <div class="timeline-block">
                                            <span class="timeline-step badge-primary">

                                            </span>
                                            <div class="timeline-content">
                                                <div class="d-flex justify-content-between pt-1">
                                                    <div class="text-sm font-weight-bold">
                                                        <span class="text-muted">{{ $language['name'] }} : </span>
                                                        {{ $attributeSet->{$language['code']} }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="timeline-block">
                                        <span class="timeline-step badge-primary">

                                        </span>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between pt-1">
                                                <div class="text-sm font-weight-bold">
                                                    <span class="text-muted">{{ __('Description') }} : </span>
                                                    {{ $attributeSet->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-block">
                                        <span class="timeline-step badge-primary">

                                        </span>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between pt-1">
                                                <div class="d-flex justify-content-between pt-1">
                                                    <div class="text-sm font-weight-bold">
                                                        <span class="text-muted">{{ __('Created at') }} : </span>
                                                        {{ $attributeSet->created_at ? $attributeSet->created_at->diffForHumans() : null }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-block">
                                        <span class="timeline-step badge-primary">

                                        </span>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between pt-1">
                                                <div class="d-flex justify-content-between pt-1">
                                                    <div class="text-sm font-weight-bold">
                                                        <span class="text-muted">{{ __('Updated at') }} : </span>
                                                        {{ $attributeSet->updated_at ? $attributeSet->updated_at->diffForHumans() : null }}
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
                        <a class="btn" href="{{ route('admin.attribute-set.index') }}">{{ __('Back') }}</a>
                        <div class="float-right">
                            <a class="btn btn-outline-primary"
                                href="{{ route('admin.attribute-set.edit', $attributeSet) }}">{{ __('Edit') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
