@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Novo estafeta</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('deliveryman.index') }} ">Estafetas</a></li>
                    <li class="breadcrumb-item active">Novo</li>
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
                                <b>Criado em:</b> <a class="float-right">{{ date('d-m-Y') }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Aprovação pendente</b>
                            </li>
                            <li class="list-group-item">
                                <b>Total de entregas</b> <a class="float-right">0</a>
                            </li>
                        </ul>
                            {{-- <a href="#" class="btn btn-primary btn-block"><b>Aprovar conta</b></a> --}}
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
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nome" value="{{ $deliveryman->name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputBirthDate" class="col-sm-2 col-form-label">Data de nascimento</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputBirthDate" name="inputBirthDate" placeholder="987 654 321" value="{{ $deliveryman->birth_date ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNacionality" class="col-sm-2 col-form-label">Nacionalidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNacionality" name="inputNacionality" value="{{ $deliveryman->nacionality ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="{{ $deliveryman->email ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMobilePhoneNumber" class="col-sm-2 col-form-label">Telemóvel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputMobilePhoneNumber" name="inputMobilePhoneNumber" placeholder="987 654 321" value="{{ $deliveryman->mobile_phone_number ?? null}}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input id="inputActiveAccount" name="inputActiveAccount" type="checkbox"> Conta ativa
                                                </label>
                                            </div>
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
                                <form class="form-horizontal"method="POST" action="{{ route('deliveryman.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputIdentityCardNumber" class="col-sm-2 col-form-label">Número do cartão de identidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputIdentityCardNumber" name="inputIdentityCardNumber" placeholder="L123456" value="{{ $deliveryman->identity_card_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTaxNumber" class="col-sm-2 col-form-label">NIF</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputTaxNumber" name="inputTaxNumber" placeholder="M98754" value="{{ $deliveryman->tax_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSocialInsuranceNumber" class="col-sm-2 col-form-label">Segurança social</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSocialInsuranceNumber" name="inputSocialInsuranceNumber" placeholder="654987" value="{{ $deliveryman->social_insurance_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputDrivingLicenseName" class="col-sm-2 col-form-label">Carta de condução (nome)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputDrivingLicenseName" name="inputDrivingLicenseName" placeholder="Thiago M R Vieira" value="{{ $deliveryman->driving_license_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputDrivingLicenseNumber" class="col-sm-2 col-form-label">Carta de condução (Número)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputDrivingLicenseNumber" name="inputDrivingLicenseNumber" placeholder="MN987654" value="{{ $deliveryman->driving_license_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputBankAccountName" class="col-sm-2 col-form-label">Conta bancária (nome)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputBankAccountName"  name="inputBankAccountName" placeholder="Thiago Maciel R Vieira" value="{{ $deliveryman->bank_account_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputBankAccountNumber" class="col-sm-2 col-form-label">Conta bancária (Número)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputBankAccountNumber" name="inputBankAccountNumber" placeholder="OP987654" value="{{ $deliveryman->bank_account_number ?? null}}">
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
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.store') }}">
                                    @csrf
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
                                        <label for="inputCounty" class="col-sm-2 col-form-label">Província</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCounty" placeholder="Província" {{ $deliveryman->address->county_id ?? null}}>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCity" class="col-sm-2 col-form-label">Bairro</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCity" placeholder="Bairro" {{ $deliveryman->address->locality ?? null}}>
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