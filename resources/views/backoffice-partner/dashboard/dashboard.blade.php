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
                        <b>{{ $products->count() }}</b> Produtos inseridos
                    </h6>
                    <p>
                        Última entrada <br>
                        {{ $products->first()->created_at ?? null }}
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
                        <b>{{ $products->where('category.slug', 'entradas')->count() }}</b> Entradas
                    </h6>
                    <p>
                        Última entrada <br>
                        {{ $products->where('category.slug', 'entradas')->first()->created_at ?? null }}
                    </p>
                    <hr>
                </div>
                <div class="col-6">
                    <h6><b>{{ $products->where('category.slug', 'pratos-principais')->count() }}</b> Pratos principais</h6> 
                    <p>
                        Última entrada <br>
                        {{ $products->where('category.slug', 'pratos-principais')->first()->created_at ?? null }} 
                    </p>
                    <hr>
                </div>
            </div>
        
            
            <div class="row">
                <div class="col-6">
                    <h6><b>{{ $products->where('category.slug', 'sobremesas')->count() }}</b> Sobremesas</h6>
                    <p>
                        Última entrada <br>
                        {{ $products->where('category.slug', 'sobremesas')->first()->created_at ?? null }}
                    </p>
                    <hr>
                </div>
                <div class="col-6">
                    <h6><b>{{ $products->where('category.slug', 'bebidas')->count() }}</b> Bebidas</h6>
                    <p>
                        Última entrada <br>
                        {{ $products->where('category.slug', 'bebidas')->first()->created_at ?? null }}
                    </p>
                    <hr>

                </div> 
            </div>
        

    </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
    </script>
@endsection