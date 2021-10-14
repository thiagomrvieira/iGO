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
                <div class="block-title"><h2>{{ __('backoffice-aderentes.partner-title') }}</h2></div>
                <div class="block-lead"><span>{{ __('backoffice-aderentes.partner-subtitle') }}</span></div>
                <div class="row-fluid">
                    <div class="column-4">
                        <div class="block-find-icon">
                           <img src="{{ asset('assets-frontoffice/images/icon-time.svg') }}" alt="{{ __('homepage.home-find-delivery') }}" title="{{ __('homepage.home-find-delivery') }}"/>
                        </div>
                        <div class="number-circle"><span>1</span></div>
                        <div class="block-find-lead"><span>{{ __('homepage.home-find-delivery') }}</span></div>
                    </div>
                    <div class="column-4">
                        <div class="block-find-icon">
                           <img src="{{ asset('assets-frontoffice/images/icon-info.svg') }}" alt="{{ __('homepage.home-find-information') }}" title="{{ __('homepage.home-find-information') }}"/>
                        </div>
                        <div class="number-circle"><span>2</span></div>
                        <div class="block-find-lead"><span>{{ __('homepage.home-find-information') }}</span></div>
                    </div>
                    <div class="column-4">
                        <div class="block-find-icon">
                           <img src="{{ asset('assets-frontoffice/images/icon-bussiness.svg') }}" alt="{{ __('homepage.home-find-business') }}" title="{{ __('homepage.home-find-business') }}"/>
                        </div>
                        <div class="number-circle"><span>3</span></div>
                        <div class="block-find-lead"><span>{{ __('homepage.home-find-business') }}</span></div>
                    </div>
                    <div class="column-4">
                        <div class="block-find-icon">
                           <img src="{{ asset('assets-frontoffice/images/icon-comunication.svg') }}" alt="{{ __('homepage.home-find-comunication') }}" title="{{ __('homepage.home-find-comunication') }}"/>
                        </div>
                        <div class="number-circle"><span>4</span></div>
                        <div class="block-find-lead"><span>{{ __('homepage.home-find-comunication') }}</span></div>
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
