{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


@extends('frontoffice.layouts.app')
@section('content')
    {{-- <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
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
                                        <input id="email" type="email"
                                            class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
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
