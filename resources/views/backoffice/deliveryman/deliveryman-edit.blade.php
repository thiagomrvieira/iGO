@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar estafeta</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('deliveryman.index') }} ">Estafetas</a></li>
                    <li class="breadcrumb-item active">{{ $deliveryman->name ?? null}}</li>
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
                                src="{{ asset('assets-backoffice/dist/img/deliveryman02.png')}}"
                                alt="User profile picture">
                        </div>
                        
                        <h3 class="profile-username text-center">{{ $deliveryman->name ?? null}}</h3>
                        <p class="text-muted text-center">Alguma informação adicional</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Criado em:</b> <a class="float-right">{{ date('d-m-Y', strtotime($deliveryman->created_at))  ?? 'Pendente'}}</a>
                            </li>
                            <li class="list-group-item">
                                @if (is_null($deliveryman->approved_at))
                                    <b>Aprovação pendente</b>
                                @else
                                    <b>Aprovado em:</b> <a class="float-right">{{ date('d-m-Y', strtotime($deliveryman->approved_at))  ?? 'Pendente'}}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Total de entregas</b> <a class="float-right">0</a>
                            </li>
                        </ul>
                        @if ($deliveryman->active == false)
                            <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                @if (is_null($deliveryman->approved_at))
                                    <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                @endif

                                <input type="hidden" name="active" value="1">
                                <button type="submit"class="btn btn-primary btn-block"><b>Aprovar conta</b></button>
                            </form>
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
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
                            <li class="nav-item"><a class="nav-link active" href="#personal"  data-toggle="tab">Dados pessoais</a></li>
                            <li class="nav-item"><a class="nav-link"        href="#documents" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item"><a class="nav-link"        href="#address"   data-toggle="tab">Morada</a></li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            
                            {{-- TAB PERSONAL --}}
                            <div class="active tab-pane" id="personal">
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    {{-- Input de controle para o metodo update --}}
                                    <input type="hidden" name="personalData" value="true">

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $deliveryman->name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birth_date" class="col-sm-2 col-form-label">Data de nascimento</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="987 654 321" value="{{ $deliveryman->birth_date ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nacionality" class="col-sm-2 col-form-label">Nacionalidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nacionality" name="nacionality" value="{{ $deliveryman->nacionality ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $deliveryman->email ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile_phone_number" class="col-sm-2 col-form-label">Telemóvel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mobile_phone_number" name="mobile_phone_number" placeholder="987 654 321" value="{{ $deliveryman->mobile_phone_number ?? null}}">
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
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="identity_card_number" class="col-sm-2 col-form-label">Número do cartão de identidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="identity_card_number" name="identity_card_number" placeholder="L123456" value="{{ $deliveryman->identity_card_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tax_number" class="col-sm-2 col-form-label">NIF</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="M98754" value="{{ $deliveryman->tax_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_insurance_number" class="col-sm-2 col-form-label">Segurança social</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="social_insurance_number" name="social_insurance_number" placeholder="654987" value="{{ $deliveryman->social_insurance_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="driving_license_name" class="col-sm-2 col-form-label">Carta de condução (nome)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="driving_license_name" name="driving_license_name" placeholder="Thiago M R Vieira" value="{{ $deliveryman->driving_license_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="driving_license_number" class="col-sm-2 col-form-label">Carta de condução (Número)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="driving_license_number" name="driving_license_number" placeholder="MN987654" value="{{ $deliveryman->driving_license_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank_account_name" class="col-sm-2 col-form-label">Conta bancária (nome)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bank_account_name"  name="bank_account_name" placeholder="Thiago Maciel R Vieira" value="{{ $deliveryman->bank_account_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank_account_number" class="col-sm-2 col-form-label">Conta bancária (Número)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="OP987654" value="{{ $deliveryman->bank_account_number ?? null}}">
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
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="inputAddressLine1" class="col-sm-2 col-form-label">Morada</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddressLine1" placeholder="Linha 1" {{ $deliveryman->address->line_1 ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAddressLine2" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddressLine2" placeholder="Linha 2" {{ $deliveryman->address->line_2 ?? null}}>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="inputCounty" class="col-sm-2 col-form-label">Concelho</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCounty" placeholder="Concelho" {{ $deliveryman->address->county_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCity" class="col-sm-2 col-form-label">Cidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCity" placeholder="Cidade" {{ $deliveryman->address->city_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPostalCode" class="col-sm-2 col-form-label">Código postal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPostalCode" placeholder="Código postal" {{ $deliveryman->address->post_code ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">País</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCountry" placeholder="País" {{ $deliveryman->address->country_id ?? null}}>
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