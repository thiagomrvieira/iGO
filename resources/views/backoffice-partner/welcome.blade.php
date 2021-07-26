@extends('backoffice-partner.layouts.app')

@php
    if(Auth::user()->partner) {
        $partner = Auth::user()->partner;
    }
@endphp

@section('navbar')
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand float-left" href="#">
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
        {{-- <button class="btn btn-primary">Iniciar</button> --}}
        <a href="{{ route('partner.createBusiness.data') }}" class="btn btn-primary">Iniciar</a>
    </div>
@endsection
