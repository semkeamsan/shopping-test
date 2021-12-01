<div class="accordion" id="accordion">
    <div class="card border shadow-none m-0">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">{{ __('Basic Information') }}</h5>
        </div>
        <div class="card-body p-0">
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="list-group">
                    <a href="#general" data-toggle="tab" class="rounded-0 list-group-item list-group-item-action active">
                        {{ __('General') }}
                    </a>
                    <a href="#values" data-toggle="tab" class="list-group-item list-group-item-action">
                        {{ __('Values') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
