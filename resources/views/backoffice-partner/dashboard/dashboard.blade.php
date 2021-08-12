@extends('backoffice-partner.layouts.app')

@php
    $partner = Auth::user()->partner ?? null;
    
   
@endphp

{{-- @dump($partner->subCategories) --}}
{{-- @dump($partner->mainCategory->name) --}}

@section('navbar')
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand float-left pl-3" href="#">
            <h3>iGO</h3>
        </a>
        <a class="navbar-brand float-right" href="#">
            <small>{{ $partner->company_name ?? null}} </small>
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets-backoffice/dist/img/store.png')}}"
                alt="User profile picture" width="45px">
        </a>
    </nav>
@endsection

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <h4>Dashboard</h4>

            <div class="row">
                <div class="col-6">
                    <h6>
                        <b>{{$totalProducts}}</b> Produtos inseridos
                    </h6>
                    <p>
                        Última entrada <br>
                        {{$lastProductEntry->created_at ?? null}}
                    </p>
                    <hr>

                </div>
                <div class="col-6">
                    <h6>Produtos em destaque</h6>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <h6>
                        <b>{{$totalSideDishes}}</b> Entradas
                    </h6>
                    <p>
                        Última entrada <br>
                        {{$lastSDEntry->created_at ?? null}}
                    </p>
                    <hr>
                </div>
                <div class="col-6">
                    <h6><b>{{$totalMainDishes}}</b> Pratos principais</h6>
                    <p>
                        Última entrada <br>
                        {{$lastMainEntry->created_at ?? null}}
                    </p>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <h6><b>{{$totalDesserts}}</b> Sobremesas</h6>
                    <p>
                        Última entrada <br>
                        {{$lastDessertEntry->created_at ?? null}}
                    </p>
                    <hr>
                </div>
                <div class="col-6">
                    <h6><b>{{$totalDrinks}}</b> Bebidas</h6>
                    <p>
                        Última entrada <br>
                        {{$lastDrinkEntry->created_at ?? null}}
                    </p>
                    <hr>

                </div>
            </div>
        

    </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
        // Uncheck checkboxes for period if checkbox for DAY is unchecked
        // $(document).on("click", ".checkDay", function () {
        //     var day = $(this).data('day');
            
        //     $('.check' + day).prop('checked', false).removeAttr('checked');
        //     $('.input' + day).val('');
              
        // });

        // // Remove values from inputs if checkbox for PERIOD is unchecked
        // $(document).on("click", ".checkPeriod", function () {
        //     var id = $(this).attr('id');
        //     if (!$('#' + id).is(":checked")) {
        //         $('.input' + id).val('');
        //     };
        // });
        
    </script>
@endsection