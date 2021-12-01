<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{ route('front.index') }}" target="_blank">
                <svg class="w-100 h-100 navbar-brand-img" version="1.0" xmlns="http://www.w3.org/2000/svg" width="1984.000000pt" height="1984.000000pt" viewBox="0 0 1984.000000 1984.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,1984.000000) scale(0.100000,-0.100000)" fill="var(--primary)" stroke="none"> <path d="M6140 16486 l-3865 -2233 0 -4473 0 -4473 3868 -2234 3867 -2233 3868 2233 3867 2234 0 4473 0 4473 -3860 2230 c-2123 1226 -3864 2231 -3870 2233 -5 1 -1749 -1002 -3875 -2230z m7054 -1226 l3156 -1825 0 -3670 0 -3670 -3148 -1820 c-2753 -1592 -3152 -1820 -3187 -1820 -35 0 -434 228 -3187 1820 l-3148 1820 0 3670 0 3670 3158 1827 c1896 1097 3166 1826 3179 1825 11 -1 1441 -823 3177 -1827z"/> <path d="M5170 9990 l0 -1600 945 0 945 0 0 245 0 245 -655 0 -655 0 0 1355 0 1355 -290 0 -290 0 0 -1600z"/> <path d="M8308 10739 c-458 -53 -818 -343 -951 -765 -49 -156 -62 -245 -62 -444 0 -262 37 -423 139 -615 155 -292 405 -473 761 -551 123 -26 378 -24 512 4 417 90 717 346 846 722 53 155 70 269 70 470 1 202 -16 313 -69 462 -180 507 -662 784 -1246 717z m314 -440 c127 -42 227 -133 297 -269 143 -275 146 -669 9 -948 -199 -406 -684 -431 -917 -47 -144 237 -161 671 -37 949 54 123 155 234 258 287 103 52 280 65 390 28z"/> <path d="M10870 10740 c-95 -13 -223 -56 -320 -106 -367 -188 -590 -604 -590 -1099 0 -457 197 -836 531 -1019 135 -74 272 -107 444 -108 280 -1 503 106 663 317 l23 30 -4 -190 c-4 -152 -9 -206 -25 -268 -59 -218 -206 -366 -422 -424 -91 -25 -351 -25 -470 0 -110 23 -272 78 -350 117 -34 17 -63 30 -65 28 -1 -2 -30 -99 -64 -217 -50 -171 -60 -216 -49 -223 69 -46 251 -110 393 -138 411 -79 841 -31 1119 124 231 129 373 326 450 624 47 181 48 190 56 1317 5 589 12 1098 16 1133 l7 62 -251 0 c-230 0 -251 -1 -256 -17 -2 -10 -8 -72 -12 -138 -9 -165 -11 -169 -59 -100 -92 134 -258 243 -425 280 -91 20 -252 27 -340 15z m402 -460 c154 -48 278 -187 323 -365 18 -73 21 -560 4 -664 -40 -237 -251 -412 -494 -410 -255 2 -448 170 -527 460 -20 72 -23 108 -23 254 1 143 4 184 23 260 56 222 185 389 353 455 106 42 226 46 341 10z"/> <path d="M13698 10739 c-458 -53 -818 -343 -951 -765 -49 -156 -62 -245 -62 -444 0 -262 37 -423 139 -615 155 -292 405 -473 761 -551 123 -26 378 -24 512 4 417 90 717 346 846 722 53 155 70 269 70 470 1 202 -16 313 -69 462 -180 507 -662 784 -1246 717z m314 -440 c127 -42 227 -133 297 -269 143 -275 146 -669 9 -948 -199 -406 -684 -431 -917 -47 -144 237 -161 671 -37 949 54 123 155 234 258 287 103 52 280 65 390 28z"/> </g> </svg>
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Route::currentRouteName(), config('page.prefix').'.index') === 0 || strpos(Route::currentRouteName(), config('page.prefix').'.dashboard') === 0 ? 'active' : null }}"
                            href="{{ route(config('page.prefix').'.dashboard') }}">
                            <i
                                class="fal fa-tv {{ strpos(Route::currentRouteName(), config('page.prefix').'.index') === 0 || strpos(Route::currentRouteName(), config('page.prefix').'.dashboard') === 0 ? 'text-primary' : null }}"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-3">
                @foreach (auth()->user()->role->permissions as $permission)
                    @if (Route::has(config('page.prefix').'.' . $permission->slug . '.index') && $permission->routes->contains('index') && $permission->navbar)
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ config('page.slug') == $permission->slug ? 'active' : null }}"
                                    href="{{ route(config('page.prefix').'.' . $permission->slug . '.index') }}">
                                    <i
                                        class="{{ $permission->icon }} {{ config('page.slug') == $permission->slug ? 'text-primary' : null }}"></i>
                                    <span class="nav-link-text">{{ $permission->translation()->name }}</span>
                                </a>
                            </li>
                        </ul>
                        @if ($permission->underline)
                            <hr class="my-3">
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</nav>
