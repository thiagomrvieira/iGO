@extends('frontoffice.layouts.app')
@section('content')
    {{-- <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    <div id="page-front">
        <div class="block-home-top">
            <div class="block-login">
                <div class="login">
                    <div class="block-title">
                        <h1> {{ __('Iniciar sessão') }}</h1>
                    </div>
                    <div class="login-form">
                        <form method="post" action="{{ route('login') }}" class="form-default-wrapper">
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
                                        <input id="email" type="email"
                                            class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror   

                            </div>
                            <div class="block-form-group">
                                <div class="block-field block-field-entity-partner-name">
                                    <div class="block-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(138 -724.44)">
                                                <g transform="translate(-138 724.44)">
                                                    <rect width="20" height="20" fill="none" />
                                                    <g transform="translate(2.088 1.677)">
                                                        <g>
                                                            <path
                                                                d="M8.322,0a8.322,8.322,0,1,0,8.322,8.322A8.331,8.331,0,0,0,8.322,0Zm0,15.326a7,7,0,1,1,7-7A7.012,7.012,0,0,1,8.322,15.326Z"
                                                                fill="#072a40" />
                                                        </g>
                                                        <g transform="translate(2.156 9.798)">
                                                            <path
                                                                d="M72.5,301.425a7.78,7.78,0,0,0-6.166,3.3l1.045.8a6.095,6.095,0,0,1,10.241,0l1.045-.8A7.78,7.78,0,0,0,72.5,301.425Z"
                                                                transform="translate(-66.33 -301.425)" fill="#072a40" />
                                                        </g>
                                                        <g transform="translate(4.896 2.986)">
                                                            <path
                                                                d="M154.053,91.863a3.447,3.447,0,1,0,3.425,3.447A3.44,3.44,0,0,0,154.053,91.863Zm0,5.577a2.13,2.13,0,1,1,2.108-2.13A2.121,2.121,0,0,1,154.053,97.44Z"
                                                                transform="translate(-150.628 -91.863)" fill="#072a40" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="block-input">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                    </div>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror  

                            </div>
                            <div class="password-recover">
                                <p>Esqueceu-se da password? <span><a href="{{ route('password.request') }}">Recuperar</a></span> </p>
                            </div>
                            {{-- <a class="register" href="#">Registar</a> --}}
                            <button type="submit" class="button button-primary">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
