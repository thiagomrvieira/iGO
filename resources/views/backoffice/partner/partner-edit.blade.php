@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar aderente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }} ">Aderentes</a></li>
                    <li class="breadcrumb-item active">{{ $partner->company_name ?? null}}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('assets-backoffice/dist/img/burger.jpg')}}"
                                alt="User profile picture">
                        </div>
                        
                        <h3 class="profile-username text-center">{{ $partner->company_name ?? null}}</h3>
                        <p class="text-muted text-center">Alguma informação adicional</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Criado em:</b> <a class="float-right">{{ date('d-m-Y', strtotime($partner->created_at))  ?? 'Pendente'}}</a>
                            </li>
                            <li class="list-group-item">
                                @if (is_null($partner->approved_at))
                                    <b>Aprovação pendente</b>
                                @else
                                    <b>Aprovado em:</b> <a class="float-right">{{ date('d-m-Y', strtotime($partner->approved_at))  ?? 'Pendente'}}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Total de pedidos</b> <a class="float-right">0</a>
                            </li>
                        </ul>
                        @if ($partner->active == false)
                            <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                @if (is_null($partner->approved_at))
                                    <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                @endif

                                <input type="hidden" name="active" value="1">
                                <button type="submit"class="btn btn-primary btn-block"><b>Aprovar conta</b></button>
                            </form>
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="active" value="0">
                                <button type="submit" class="btn btn-danger btn-block"><b>Desativar conta</b></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#company"   data-toggle="tab">Dados da empresa</a></li>
                            <li class="nav-item"><a class="nav-link"        href="#documents" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item"><a class="nav-link"        href="#address"   data-toggle="tab">Morada</a></li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            
                            {{-- TAB COMPANY --}}
                            <div class="active tab-pane" id="company">
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    <div class="form-group row">
                                        <label for="company_name" class="col-sm-2 col-form-label">Empresa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Nome da empresa" value="{{ $partner->company_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">Categoria</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="category_id" name="category_id">
                                                @if (isset($partnerCategories) && count($partnerCategories) > 0)
                                                    @foreach ($partnerCategories as $category)
                                                        <option value="{{ $category->id}}" 
                                                            {{ $partner->category_id == $category->id ? 'selected': ''}}> 
                                                            {{ $category->name}} 
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option disabled selected value="0"> Sem categorias cadastradas </option>
                                                @endif
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Responsavel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $partner->name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $partner->email ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-2 col-form-label">Telefone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="345 567 678" value="{{ $partner->phone_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile_phone_number" class="col-sm-2 col-form-label">Telemóvel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mobile_phone_number" name="mobile_phone_number" placeholder="987 654 321" value="{{ $partner->mobile_phone_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB DOCUMENTS --}}
                            <div class="tab-pane" id="documents">
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="tax_number" class="col-sm-2 col-form-label">NIF</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="L123456" value="{{ $partner->tax_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB ADDRESS --}}
                            <div class="tab-pane" id="address">
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="inputAddressLine1" class="col-sm-2 col-form-label">Morada</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddressLine1" placeholder="Linha 1" {{ $partner->address->line_1 ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAddressLine2" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddressLine2" placeholder="Linha 2" {{ $partner->address->line_2 ?? null}}>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="inputCounty" class="col-sm-2 col-form-label">Concelho</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCounty" placeholder="Concelho" {{ $partner->address->county_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCity" class="col-sm-2 col-form-label">Cidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCity" placeholder="Cidade" {{ $partner->address->city_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPostalCode" class="col-sm-2 col-form-label">Código postal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPostalCode" placeholder="Código postal" {{ $partner->address->post_code ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">País</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCountry" placeholder="País" {{ $partner->address->country_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection