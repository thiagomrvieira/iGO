@extends('backoffice-partner.layouts.app')

@php
    if(Auth::user()->partner) {
        $partner = Auth::user()->partner;
    }
@endphp

@section('content')
    <div id="page-backoffice">
        <div class="block-home-find">
            <div class="main-fluid">
                <div class="limit-wrapper">
                    <div class="block-title">
                        <h2>{{ __('backoffice-aderentes.partner-title') }}</h2>
                    </div>
                    <div class="block-lead">
                        <p>{{ __('backoffice-aderentes.partner-subtitle') }}</p>
                    </div>
                    <div class="row-fluid">
                        <div class="column-4">
                            <div class="block-find-icon">
                                <img src="{{ asset('assets-backoffice-partner/images/completar_perfil.png') }}" alt="{{ __('backoffice-aderentes.partner-complete-profile') }}" title="{{ __('backoffice-aderentes.partner-complete-profile') }}"/>
                            </div>
                            <div class="number-circle"><span>1</span></div>
                            <div class="block-find-lead"><h3>{{ __('backoffice-aderentes.partner-complete-profile') }}</h3></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                                <img src="{{ asset('assets-backoffice-partner/images/inserir_produtos.png') }}" alt="{{ __('backoffice-aderentes.partner-products') }}" title="{{ __('backoffice-aderentes.partner-products') }}"/>
                            </div>
                            <div class="number-circle"><span>2</span></div>
                            <div class="block-find-lead"><h3>{{ __('backoffice-aderentes.partner-products') }}</h3></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                                <img src="{{ asset('assets-backoffice-partner/images/enviar_revisao.png') }}" alt="{{ __('backoffice-aderentes.partner-send') }}" title="{{ __('backoffice-aderentes.partner-send') }}"/>
                            </div>
                            <div class="number-circle"><span>3</span></div>
                            <div class="block-find-lead"><h3>{{ __('backoffice-aderentes.partner-send') }}</h3></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                                <img src="{{ asset('assets-backoffice-partner/images/validar_perfil.png') }}" alt="{{ __('backoffice-aderentes.partner-validate') }}" title="{{ __('backoffice-aderentes.partner-validate') }}"/>
                            </div>
                            <div class="number-circle"><span>4</span></div>
                            <div class="block-find-lead"><h3>{{ __('backoffice-aderentes.partner-validate') }}</h3></div>
                        </div>
                    </div>
                    <div class="block-start">
                        <a href="{{ route('partner.createBusiness.data') }}" class="button button-primary">Iniciar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <h4>Bem-vindo!</h4>
        <p>Está a um passo de se tornar parceiro iGO  <br>
           Preencha as informações em falta e bom negócio
        </p>
        <ol>
            <li>Completar o perfil</li>
            <li>Inserir ementa</li>
            <li>Enviar para revisão</li>
            <li>Validação de perfil</li>
        </ol>
        <button class="btn btn-primary">Iniciar</button> 
        <a href="{{ route('partner.createBusiness.data') }}" class="btn btn-primary">Iniciar</a>
    </div> --}}
@endsection
