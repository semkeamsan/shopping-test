<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item text-nowrap dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" id="navbar-languages">
                        <span>
                            <img src="{{ asset('images/flags/' . app()->getLocale() . '.svg') }}" width="26" />
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-languages">
                        @foreach (config('languages', []) as $lang)
                            <li>
                                <a class="dropdown-item {{  $lang['code'] == app()->getLocale()? 'active' : null }}" href="{{ route('language.set', $lang['code']) }}">
                                    <span><img width="26"
                                            src="{{ asset('images/flags/' . $lang['code'] . '.svg') }}" /></span>
                                    <span>{{ $lang['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img src="{{ auth()->user()->avatar }}">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                        </div>
                        @if (auth()->user()->role->permissions->where('slug', 'account')->count())
                            <a href="{{ route('admin.account.index') }}"
                                class="dropdown-item {{ auth()->user()->role->permissions->where('slug', 'account')->first()->routes->contains('index') ?:
                                    'd-none' }}">
                                <i class="fal fa-user"></i>
                                <span>{{ __('My account') }}</span>
                            </a>
                        @endif

                        <a href="#" class="dropdown-item">
                            <i class="fal fa-cog"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fal fa-calendar-alt"></i>
                            <span>{{ __('Activity') }}</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        {!! Form::open(['url' => route('logout')]) !!}
                        <button type="submit" class="dropdown-item">
                            <i class="fal fa-sign-out-alt"></i>
                            <span>{{ __('Logout') }}</span>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
