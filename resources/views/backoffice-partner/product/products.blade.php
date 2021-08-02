@extends('backoffice-partner.layouts.app')

@php
    $partner = Auth::user()->partner ?? null;
    
    $workTime = [
        '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', 
        '00:70', '08:00', '09:00', '10:00', '11:00', '12:00',  
        '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 
        '19:00', '20:00', '21:00', '22:00', '23:00', '00:00', 
    ];
    
    $workDays = [ 
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'holiday',
    ];
@endphp


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

    <h4>All products view</h4>

    {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => 'product.store', 
                    'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        
        {!! Form::hidden('partner_id', $partner->id ) !!} 

        <div class="accordion" id="accordionProducts">
            
            {{-- Featured item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFeatured">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFeatured" aria-expanded="false" aria-controls="collapseFeatured">
                        Destaques
                    </button>
                </h2>
                <div id="collapseFeatured" class="accordion-collapse collapse" aria-labelledby="headingFeatured" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>

            {{-- Appetizer item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingAppetizer">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAppetizer" aria-expanded="false" aria-controls="collapseAppetizer">
                        Entradas
                    </button>
                </h2>
                <div id="collapseAppetizer" class="accordion-collapse collapse" aria-labelledby="headingAppetizer" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>

            {{-- Main dishes item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMain">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMain" aria-expanded="true" aria-controls="collapseMain">
                    Pratos Principais
                    </button>
                </h2>
                <div id="collapseMain" class="accordion-collapse collapse show" aria-labelledby="headingMain" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">

                        @foreach ($products as $product)
                            <div class="card">
                                <div class="card-body">
                                    <div style="float: left;">
                                        <strong>{{$product->name}}</strong>
                                        <p>{{ Str::limit($product->description, 60, '...') }}</p>
                                        <p>{{$product->price}}€</p>
                                    </div>
                                    <div style="float: right;">
                                        <div id="pen">
                                            pen
                                        </div>
                                        <div id="trash">
                                            trash
                                        </div>
                                        <div id="plus">
                                            plus
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            

            {{-- Dessert item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDessert">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDessert" aria-expanded="false" aria-controls="collapseDessert">
                        Sobremesas
                    </button>
                </h2>
                <div id="collapseDessert" class="accordion-collapse collapse" aria-labelledby="headingDessert" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>

            {{-- Drink item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDrink">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDrink" aria-expanded="false" aria-controls="collapseDrink">
                        Bebidas*
                    </button>
                </h2>
                <div id="collapseDrink" class="accordion-collapse collapse" aria-labelledby="headingDrink" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>

        </div>
    {!! Form::close() !!}
    
    {!! Form::submit('Adicionar', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProductData']) !!}

</div>
@endsection
