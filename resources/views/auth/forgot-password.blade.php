@extends('frontoffice.layouts.auth')
@section('content')
    <div id="page-front">
        <div class="block-home-top">
            <div class="block-login">
                <div class="login">
                    <div class="block-title">
                        <h1> {{ __('Recuperar Password') }}</h1>
                    </div>
                    <div class="login-form">
                        <form method="post" action="{{ route('password.email') }}" class="form-default-wrapper">
                            @csrf
                            <div class="block-form-group">
                                <div class="block-field block-field-entity-partner-name @error('email') is-invalid @enderror">
                                    <div class="block-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-89 -255)">
                                                <g transform="translate(90.583 258.623)">
                                                    <g transform="translate(0 0)">
                                                        <path
                                                            d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z"
                                                            transform="translate(0 -61)" fill="#072a40" />
                                                    </g>
                                                </g>
                                                <rect width="20" height="20" transform="translate(89 255)" fill="none" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="block-input ">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-mail" autocomplete="email" autofocus>
                                    </div>
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror   

                            </div>
                         
                            <button type="submit" class="button button-primary">{{ __('Recuperar password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
