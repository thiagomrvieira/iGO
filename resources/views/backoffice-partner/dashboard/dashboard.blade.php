@extends('backoffice-partner.layouts.app')

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
    <div id="page-backoffice">
        <div class="block-home-find">
            <div class="block-accordion">
                <div class="main-fluid">
                    <div class="limit-wrapper">

                        <div class="dashboard-product">
                            {{-- Inserted dishes --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Pratos inseridos</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->first()->created_at ?? null }}</p>
                                </div>
                            </div>
                            {{-- Featured dishes --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Pratos em destaque</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->first()->created_at ?? null }}</p>
                                </div>
                            </div>
                            {{-- Starters --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'entradas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Entradas</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->where('category.slug', 'entradas')->first()->created_at ?? null }}</p>
                                </div>
                            </div>
                            {{-- Mains --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'pratos-principais')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Pratos principais</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->where('category.slug', 'pratos-principais')->first()->created_at ?? null }} </p>
                                </div>
                            </div>
                            {{-- Desserts --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'sobremesas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Sobremesas</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->where('category.slug', 'sobremesas')->first()->created_at ?? null }}</p>
                                </div>
                            </div>
                            {{-- Drinks --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'bebidas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Bebidas</p>
                                    <p>Última entrada</p>
                                    <p>{{ $products->where('category.slug', 'bebidas')->first()->created_at ?? null }}</p>
                                </div>
                            </div>
                        
                        </div>

                        {{-- <div>
                            <div>
                                <h6>
                                    <b>{{ $products->where('category.slug', 'entradas')->count() }}</b> Entradas
                                </h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'entradas')->first()->created_at ?? null }}
                                </p>
                                <hr>
                            </div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'pratos-principais')->count() }}</b> Pratos principais</h6> 
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'pratos-principais')->first()->created_at ?? null }} 
                                </p>
                                <hr>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'sobremesas')->count() }}</b> Sobremesas</h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'sobremesas')->first()->created_at ?? null }}
                                </p>
                                <hr>
                            </div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'bebidas')->count() }}</b> Bebidas</h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'bebidas')->first()->created_at ?? null }}
                                </p>
                                <hr>

                            </div> 
                        </div> --}}
                        <div class="nav-menu-fixed">
                            @include('backoffice-partner.layouts.sidebar') 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
    </script>
@endsection