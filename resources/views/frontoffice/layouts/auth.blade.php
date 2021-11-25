<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'iGO - É só pedir') }}</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('assets-frontoffice/libs/select2/select2.min.css') }}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets-frontoffice/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-frontoffice/css/media.css') }}">
        
    </head>
    <body>
        <!-- Header -->
        @include('frontoffice.header')

        <div id="container-wrapper">
            @yield('content')
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets-frontoffice/libs/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <!-- Select2 -->
        <script src="{{ asset('assets-frontoffice/libs/select2/select2.min.js') }}" type="text/javascript"></script>
        <!-- Vue -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
        <!-- Axios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Custom JS -->
        <script src="{{ asset('assets-frontoffice/js/scripts.js') }}" type="text/javascript"></script>

        {{-- @yield('jquery') --}}
        @yield('vue-instance')
    </body>
</html>