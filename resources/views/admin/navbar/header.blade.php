@if (config('page.breadcrumbs') && config('page.breadcrumbs')->count())
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            {{ config('page.breadcrumbs')->first()['title'] }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item">
                                    <a href="{{ config('page.breadcrumbs')->first()['link'] }}">
                                        <i class="fal fa-home"></i>
                                    </a>
                                </li>
                                @foreach (config('page.breadcrumbs')->slice(1) as $k => $breadcrumb)
                                    @if (config('page.breadcrumbs')->count() == $k + 1)
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ $breadcrumb['title'] }}
                                        </li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['link'] }}">
                                                {{ $breadcrumb['title'] }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
