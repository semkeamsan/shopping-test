@extends('layouts.app')
@section('content')
    <!--register -->
    <section class="py-xl-7 register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="py-3 {{ request()->is('register') ? 'col-xl-8 ' : 'col-xl-12' }}">
                    <div class="card">
                        <div class="card-body">
                            @if (request()->is('register'))
                                <div class="section-title">
                                    <h2 class="text-center">{{ __('Register') }}</h2>
                                </div>
                            @endif

                            <div class="form-row">
                                <div class="col-xl-6">
                                    <form class="form-row mt-4 mb-5 align-items-center needs-validation" method="POST"
                                        novalidate action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Name') }}:</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                name="name" placeholder="" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @else
                                                <div class="invalid-feedback">
                                                    {{ __('validation.required', ['attribute' => __('Name')]) }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Email Address') }}:</label>
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                                name="email" placeholder="" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @else
                                                <div class="invalid-feedback">
                                                    {{ __('validation.required', ['attribute' => __('Email Address')]) }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Password') }}:</label>
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" name="password" autocomplete="password"
                                                    required>

                                                <div class="input-group-append" data-toggle="sh-password"
                                                    data-target="#password">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-eye" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">
                                                        {{ __('validation.required', ['attribute' => __('Password')]) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Confirm Password') }}:</label>
                                            <div class="input-group">
                                                <input type="password" id="password_confirmation"
                                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                    value="{{ old('password_confirmation') }}"
                                                    name="password_confirmation" autocomplete="new-password" required>

                                                <div class="input-group-append" data-toggle="sh-password"
                                                    data-target="#password_confirmation">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-eye" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">
                                                        {{ __('validation.required', ['attribute' => __('Confirm Password')]) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 d-none d-xl-block">
                                    <svg class="w-100 h-100" version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        width="1984.000000pt" height="1984.000000pt" viewBox="0 0 1984.000000 1984.000000"
                                        preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,1984.000000) scale(0.100000,-0.100000)"
                                            fill="var(--primary)" stroke="none">
                                            <path
                                                d="M6140 16486 l-3865 -2233 0 -4473 0 -4473 3868 -2234 3867 -2233 3868 2233 3867 2234 0 4473 0 4473 -3860 2230 c-2123 1226 -3864 2231 -3870 2233 -5 1 -1749 -1002 -3875 -2230z m7054 -1226 l3156 -1825 0 -3670 0 -3670 -3148 -1820 c-2753 -1592 -3152 -1820 -3187 -1820 -35 0 -434 228 -3187 1820 l-3148 1820 0 3670 0 3670 3158 1827 c1896 1097 3166 1826 3179 1825 11 -1 1441 -823 3177 -1827z" />
                                            <path
                                                d="M5170 9990 l0 -1600 945 0 945 0 0 245 0 245 -655 0 -655 0 0 1355 0 1355 -290 0 -290 0 0 -1600z" />
                                            <path
                                                d="M8308 10739 c-458 -53 -818 -343 -951 -765 -49 -156 -62 -245 -62 -444 0 -262 37 -423 139 -615 155 -292 405 -473 761 -551 123 -26 378 -24 512 4 417 90 717 346 846 722 53 155 70 269 70 470 1 202 -16 313 -69 462 -180 507 -662 784 -1246 717z m314 -440 c127 -42 227 -133 297 -269 143 -275 146 -669 9 -948 -199 -406 -684 -431 -917 -47 -144 237 -161 671 -37 949 54 123 155 234 258 287 103 52 280 65 390 28z" />
                                            <path
                                                d="M10870 10740 c-95 -13 -223 -56 -320 -106 -367 -188 -590 -604 -590 -1099 0 -457 197 -836 531 -1019 135 -74 272 -107 444 -108 280 -1 503 106 663 317 l23 30 -4 -190 c-4 -152 -9 -206 -25 -268 -59 -218 -206 -366 -422 -424 -91 -25 -351 -25 -470 0 -110 23 -272 78 -350 117 -34 17 -63 30 -65 28 -1 -2 -30 -99 -64 -217 -50 -171 -60 -216 -49 -223 69 -46 251 -110 393 -138 411 -79 841 -31 1119 124 231 129 373 326 450 624 47 181 48 190 56 1317 5 589 12 1098 16 1133 l7 62 -251 0 c-230 0 -251 -1 -256 -17 -2 -10 -8 -72 -12 -138 -9 -165 -11 -169 -59 -100 -92 134 -258 243 -425 280 -91 20 -252 27 -340 15z m402 -460 c154 -48 278 -187 323 -365 18 -73 21 -560 4 -664 -40 -237 -251 -412 -494 -410 -255 2 -448 170 -527 460 -20 72 -23 108 -23 254 1 143 4 184 23 260 56 222 185 389 353 455 106 42 226 46 341 10z" />
                                            <path
                                                d="M13698 10739 c-458 -53 -818 -343 -951 -765 -49 -156 -62 -245 -62 -444 0 -262 37 -423 139 -615 155 -292 405 -473 761 -551 123 -26 378 -24 512 4 417 90 717 346 846 722 53 155 70 269 70 470 1 202 -16 313 -69 462 -180 507 -662 784 -1246 717z m314 -440 c127 -42 227 -133 297 -269 143 -275 146 -669 9 -948 -199 -406 -684 -431 -917 -47 -144 237 -161 671 -37 949 54 123 155 234 258 287 103 52 280 65 390 28z" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--register -->

@endsection
