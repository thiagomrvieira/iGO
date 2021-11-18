
<!DOCTYPE html>
<html lang="en">
<head>
    <title>iGO - Aderente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Custom CSS -->
     <link rel="stylesheet" href="{{ asset('assets-backoffice-partner/css/styles.css') }}">
    
</head>
<body>

   @include('backoffice-partner.header')

    <div id="container-wrapper">
        {{-- @if(Request::route()->getName() != "partner.login")
            <div class="col-2">
                @component('backoffice-partner.layouts.sidebar')
                @endcomponent
            </div>
        @endif --}}
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="{{ asset('libs/select2/select2.min.js') }}" type="text/javascript"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets-backoffice-partner/js/scripts.js') }}" type="text/javascript"></script>

    :
    @yield('jquery');


</body>
</html>
