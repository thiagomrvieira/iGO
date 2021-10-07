<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('assets-backoffice/dist/img/iGOLogo.png') }}" alt="iGO Logo" class="brand-image img-circle" style="max-height: 100px;">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
       
        {!! Form::open(['route' => 'login', 'method' => 'post' ]) !!}
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('backoffice/login.email')" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('backoffice/login.password')" />
                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('backoffice/login.remember') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- 
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                --}}
                <x-button class="ml-3">
                    {{ __('backoffice/login.login') }}
                </x-button>
            </div>
        {!! Form::close() !!}
    </x-auth-card>
</x-guest-layout>
