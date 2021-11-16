@extends('backoffice-partner.layouts.app')

{{-- @php
    $partner = Auth::user()->partner ?? null;
@endphp --}}

{{-- 
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
@endsection --}}

@section('content')
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

                        {!! Form::open(['class'  => '', 'id' => 'formProfileData', 'route' => array('partner.profile.update', ['partner' => $partner]), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="accordion" id="accordionProfileData">
                            
                            {{-- Product name item--}}

                            {{-- Product name item--}}
                            <div class="accordion-item sub-categories">
                                <button class="accordion-button" type="button">
                                    <h3><strong>Dados do perfil</strong></h3>
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
                                    @if (isset($partner->images->image_cover))
                                        <img src="{{url('/storage/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" 
                                            alt="Partner Image" height="90px">
                                        <br>
                                        {!! Form::label('image_cover', 'Alterar foto' , ['class' => 'form-check-label']) !!}

                                    @endif

                                    {!! Form::label('image_cover', 'Inserir foto*', ['class' => 'form-check-label']) !!}
                                    {!! Form::file ('image_cover', null, false,     ['class' => 'form-check-input']) !!}
                                </div>
                            </div> 
                            
                            <div class="form-group mb-1">
                                {!! Form::text('name', $partner->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome*']) !!}
                            </div>

                            <div class="form-group mb-1">
                                {!! Form::text('email', $partner->email ?? null, ['class' => 'form-control', 'placeholder' => 'E-mail*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('line_1', $partner->address->line_1 ?? null, ['class' => 'form-control', 'placeholder' => 'Rua*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('county_id', $partner->address->county->name ?? null, ['class' => 'form-control', 'placeholder' => 'Provincia*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('', $partner->address->locality ?? null, ['class' => 'form-control', 'placeholder' => 'Bairro*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('phone', $partner->phone_number ?? null, ['class' => 'form-control', 'placeholder' => 'Telefone*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('mobile', $partner->mobile_phone_number ?? null, ['class' => 'form-control', 'placeholder' => 'Telemóvel*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('post_code', $partner->address->post_code ?? null, ['class' => 'form-control', 'placeholder' => 'Codigo postal*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('country', $partner->address->country ?? null, ['class' => 'form-control', 'placeholder' => 'País*']) !!}
                            </div>

                        </div>
                        {!! Form::close() !!}
                        <div class="button-next-container">
                            {!! Form::submit($partner->first_login ? 'Guardar' : 'Salvar', ['type' => 'submit', 'class' => 'button button-primary' , 'form' => 'formProfileData']) !!}
                        </div>
                        <div class="nav-menu-fixed">
                            @include('backoffice-partner.layouts.sidebar') 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
