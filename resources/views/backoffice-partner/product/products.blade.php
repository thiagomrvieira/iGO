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


{{-- @section('navbar')
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
@endsection --}}

@section('content')
    <div class="container">
        <div id="page-backoffice">
            <div class="block-home-find">
                <div class="block-accordion">
                    <div class="main-fluid">
                        <div class="limit-wrapper">
                
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => 'products.store', 
                                            'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                
                                {!! Form::hidden('partner_id', $partner->id ) !!}  --}}

                            <div class="accordion" id="accordionProducts">

                                {{-- Product Categories --}}
                                <div class="accordion-item sub-categories">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Destaques</strong></h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="arrow" transform="translate(282 -315) rotate(90)">
                                            <g id="Group_10953" data-name="Group 10953" transform="translate(0 14.883)">
                                                <path id="MAPA" d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"></path>
                                                <rect id="Rectangle_8291" data-name="Rectangle 8291" width="14" height="14" transform="translate(330 238.117)" fill="none"></rect>
                                            </g>
                                            <rect id="Rectangle_8292" data-name="Rectangle 8292" width="44" height="44" transform="translate(315 238)" fill="none"></rect>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="accordion-content">
                                        {{-- List of Featured Products --}}
                                        @forelse ($products as $featuredProduct)
                                            @if (isset($featuredProduct->featured->created_at))
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div>
                                                            @if ($featuredProduct->image)
                                                                <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$featuredProduct->image)}}" 
                                                                    alt="Product Image" height="90px">
                                                                <br>
                                                            @endif
                                                            <strong>{{$featuredProduct->name}}</strong>
                                                            <p>{{ Str::limit($featuredProduct->description, 60, '...') }}</p>
                                                            <p>{{ number_format(($product->price / 100), 2) }}AKZ</p>
                                                        </div>
                                                        <div>
                                                            
                                                            <div id="pen">
                                                                <a href="{{ route('products.edit', ['product' => $featuredProduct] ) }}">
                                                                    pen
                                                                </a>
                                                            </div>

                                                            <div id="trash">
                                                                <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $featuredProduct->id }}"  
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    trash
                                                                </a>
                                                            </div>
                                                            <div id="plus">
                                                                plus
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            Sem produtos destacados
                                        @endforelse
                                    </div>
                                </div> 

                                {{-- Featured item--}}
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFeatured">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFeatured" aria-expanded="false" aria-controls="collapseFeatured">
                                            Destaques
                                        </button>
                                    </h2>
                                    <div id="collapseFeatured" class="accordion-collapse collapse" aria-labelledby="headingFeatured" data-bs-parent="#accordionProducts">
                                        <div class="accordion-body"> --}}
                                            {{-- List of Featured Products --}}
                                            {{-- @forelse ($products as $featuredProduct)
                                                @if (isset($featuredProduct->featured->created_at))
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div style="float: left;">
                                                                @if ($featuredProduct->image)
                                                                    <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$featuredProduct->image)}}" 
                                                                        alt="Product Image" height="90px">
                                                                    <br>
                                                                @endif
                                                                <strong>{{$featuredProduct->name}}</strong>
                                                                <p>{{ Str::limit($featuredProduct->description, 60, '...') }}</p>
                                                                <p>{{$featuredProduct->price}}€</p>
                                                            </div>
                                                            <div style="float: right;">
                                                                
                                                                <div id="pen">
                                                                    <a href="{{ route('products.edit', ['product' => $featuredProduct] ) }}">
                                                                        pen
                                                                    </a>
                                                                </div>

                                                                <div id="trash">
                                                                    <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $featuredProduct->id }}"  
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        trash
                                                                    </a>
                                                                </div>
                                                                <div id="plus">
                                                                    plus
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                Sem produtos destacados
                                            @endforelse
                                        
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- List Product Categories --}}
                                @foreach ($products->unique('category')->pluck('category') as $productCategory)
                                    {{-- Product Categories --}}
                                    <div class="accordion-item products-cerification">
                                        <button class="accordion-button" type="button">
                                            <h3><strong>{{$productCategory->name}}</strong></h3>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                                <g id="arrow" transform="translate(282 -315) rotate(90)">
                                                <g id="Group_10953" data-name="Group 10953" transform="translate(0 14.883)">
                                                    <path id="MAPA" d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"></path>
                                                    <rect id="Rectangle_8291" data-name="Rectangle 8291" width="14" height="14" transform="translate(330 238.117)" fill="none"></rect>
                                                </g>
                                                <rect id="Rectangle_8292" data-name="Rectangle 8292" width="44" height="44" transform="translate(315 238)" fill="none"></rect>
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="accordion-content">
                                            <div id='{{"collapse".$productCategory->slug}}' class="accordion-collapse collapse" aria-labelledby='{{"heading".$productCategory->slug}}' data-bs-parent="#accordionProducts">
                                                <div class="accordion-body">
                                                    {{-- List Products --}}
                                                    @foreach ($products->where('category_id', $productCategory->id) as $product)
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-body-left">
                                                                    <div class="card-body-image" >
                                                                        @if ($product->image)
                                                                            <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$product->image)}}" alt="Product Image">
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body-values">   
                                                                        <h3>{{$product->name}}</h3>
                                                                        <p>{{ Str::limit($product->description, 60, '...') }}</p>
                                                                        <p>{{ number_format(($product->price / 100), 2) }}AKZ</p>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="card-body-right">
                                                                    <div id="pen">
                                                                        <a href="{{ route('products.edit', ['product' => $product] ) }}">
                                                                            pen
                                                                        </a>
                                                                    </div>
    
                                                                    <div id="trash">
                                                                        <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $product->id }}"  
                                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                            trash
                                                                        </a>
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
                                    </div> 
                                    {{-- <div class="accordion-item">
                                        <h2 class="accordion-header" id='{{ "heading" . $productCategory->slug}}'>
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='{{ "#collapse".$productCategory->slug}}'  aria-expanded="false" aria-controls='{{"collapse".$productCategory->slug}}'>
                                                {{$productCategory->name}}
                                            </button>
                                        </h2>
                                        <div id='{{"collapse".$productCategory->slug}}' class="accordion-collapse collapse" aria-labelledby='{{"heading".$productCategory->slug}}' data-bs-parent="#accordionProducts">
                                            <div class="accordion-body"> --}}
                                                {{-- List Products --}}
                                                {{-- @foreach ($products->where('category_id', $productCategory->id) as $product)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div style="float: left;">
                                                                @if ($product->image)
                                                                    <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$product->image)}}" 
                                                                        alt="Product Image" height="90px">
                                                                    <br>
                                                                @endif
                                                                <strong>{{$product->name}}</strong>
                                                                <p>{{ Str::limit($product->description, 60, '...') }}</p>
                                                                <p>{{$product->price}}€</p>
                                                            </div>
                                                            <div style="float: right;">
                                                                
                                                                <div id="pen">
                                                                    <a href="{{ route('products.edit', ['product' => $product] ) }}">
                                                                        pen
                                                                    </a>
                                                                </div>

                                                                <div id="trash">
                                                                    <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $product->id }}"  
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        trash
                                                                    </a>
                                                                </div>
                                                                <div id="plus">
                                                                    plus
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endforeach --}}

                                            {{-- </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                                
                                {{-- Main dishes item--}}
                                {{-- <div class="accordion-item">
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
                                                            @if ($product->image)
                                                                <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$product->image)}}" 
                                                                    alt="Product Image" height="90px">
                                                                <br>
                                                            @endif
                                                            <strong>{{$product->name}}</strong>
                                                            <p>{{ Str::limit($product->description, 60, '...') }}</p>
                                                            <p>{{$product->price}}€</p>
                                                        </div>
                                                        <div style="float: right;">
                                                            
                                                            <div id="pen">
                                                                <a href="{{ route('products.edit', ['product' => $product] ) }}">
                                                                    pen
                                                                </a>
                                                            </div>

                                                            <div id="trash">
                                                                <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $product->id }}"  
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    trash
                                                                </a>
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
                                </div> --}}
                                
                                {{-- Dessert item--}}
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDessert">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDessert" aria-expanded="false" aria-controls="collapseDessert">
                                            Sobremesas
                                        </button>
                                    </h2>
                                    <div id="collapseDessert" class="accordion-collapse collapse" aria-labelledby="headingDessert" data-bs-parent="#accordionProducts">
                                        <div class="accordion-body">
                                            
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- Drink item--}}
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDrink">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDrink" aria-expanded="false" aria-controls="collapseDrink">
                                            Bebidas*
                                        </button>
                                    </h2>
                                    <div id="collapseDrink" class="accordion-collapse collapse" aria-labelledby="headingDrink" data-bs-parent="#accordionProducts">
                                        <div class="accordion-body">
                                            
                                        </div>
                                    </div>
                                </div> --}}
                            </div>   
                            {{-- {!! Form::close() !!} --}}
                            
                            {{-- {!! Form::submit('Adicionar', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProductData']) !!} --}}
                            <a class="btn btn-primary" href="{{ route('products.create') }}">
                                Adicionar produto
                            </a>
                        </div>
                        <div class="nav-menu-fixed">
                            @include('backoffice-partner.layouts.sidebar') 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal de confirmação de remoção --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Deseja remover este produto?</p>
                    
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formDelete', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.close'), ['type' => 'button', 'class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.remove'), ['type' => 'submit', 'class' => 'btn btn-danger'   , 'form' => 'formDelete']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jquery')
    <script type="text/javascript">
        // Seta action do modal de confirmação de remoção de produto
        jQuery(document).on("click", ".openDeleteDialog", function (event) {
            event.preventDefault();

            var productId = jQuery(this).data('product-id');
            var action   = `/partner/products/jQuery{productId}`;

            jQuery('#formDelete').attr('action', action );
        });
        
    </script>
@endsection