<div class="accordion" id="accordion">
    <div class="card border shadow-none m-0">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">{{ __('Basic Information') }}</h5>
        </div>
        <div class="card-body p-0">
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                data-parent="#accordion">
                <div class="list-group">
                    <a href="#general" data-toggle="tab"
                        class="rounded-0 list-group-item list-group-item-action active">
                        {{ __('General') }}
                    </a>
                    <a href="#price" data-toggle="tab" class="list-group-item list-group-item-action">
                        {{ __('Price') }}
                    </a>
                    <a href="#inventory" data-toggle="tab"
                        class="list-group-item list-group-item-action">
                        {{ __('Inventory') }}
                    </a>
                    <a href="#images" data-toggle="tab" class="list-group-item list-group-item-action">
                        {{ __('Images') }}
                    </a>
                    <a href="#downloads" data-toggle="tab"
                        class="list-group-item list-group-item-action">
                        {{ __('Downloads') }}
                    </a>
                    <a href="#seo" data-toggle="tab"
                        class="rounded-0 list-group-item list-group-item-action">
                        {{ __('SEO') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card border shadow-none">
        <div class="card-header" id="headingTwwo" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <h5 class="mb-0">{{ __('Advanced Information') }}</h5>
        </div>
        <div class="card-body p-0">
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwwo"
                data-parent="#accordion">
                <div class="list-group">
                    <a href="#attributes" data-toggle="tab"
                        class="rounded-0 list-group-item list-group-item-action">
                        {{ __('Attributes') }}
                    </a>
                    <a href="#options" data-toggle="tab" class="list-group-item list-group-item-action">
                        {{ __('Options') }}
                    </a>
                    <a href="#related-products" data-toggle="tab"
                        class="list-group-item list-group-item-action">
                        {{ __('Related Products') }}
                    </a>
                    <a href="#up-sells" data-toggle="tab"
                        class="list-group-item list-group-item-action">
                        {{ __('Up-Sells') }}
                    </a>
                    <a href="#cross-sells" data-toggle="tab"
                        class="list-group-item list-group-item-action">
                        {{ __('Cross-Sells') }}
                    </a>
                    <a href="#additional" data-toggle="tab"
                        class="rounded-0 list-group-item list-group-item-action">
                        {{ __('Additional') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
