@extends('backoffice-partner.layouts.app')

{{-- @php
    $partner = Auth::user()->partner ?? null;
@endphp --}}


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

        {!! Form::open(['class'  => '', 'id' => 'formProfileData', 'route' => array('partner.profile.update', ['partner' => $partner]), 
                        'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            {{ method_field('PATCH') }}

            <div class="accordion" id="accordionProfileData">
                
                {{-- Product name item--}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingProduct">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                            Dados do perfil
                        </button>
                    </h2>
                    <div id="collapseProduct" class="accordion-collapse collapse show" aria-labelledby="headingProduct" data-bs-parent="#accordionProfileData">
                        <div class="accordion-body">
                            <div class="form-group">

                                @if (isset($partner->images->image_cover))
                                    <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" 
                                        alt="Partner Image" height="90px">
                                    <br>
                                    {!! Form::label('image_cover', 'Alterar foto' , ['class' => 'form-check-label']) !!}

                                @endif

                                {!! Form::label('image_cover', 'Inserir foto*', ['class' => 'form-check-label']) !!}
                                {!! Form::file ('image_cover', null, false,     ['class' => 'form-check-input']) !!}

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
                                {!! Form::text('county', $partner->address->county ?? null, ['class' => 'form-control', 'placeholder' => 'Bairro*']) !!}
                            </div>
                            <div class="form-group mb-1">
                                {!! Form::text('city', $partner->address->city ?? null, ['class' => 'form-control', 'placeholder' => 'Província*']) !!}
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
                    </div>
                </div>


            </div>
        {!! Form::close() !!}
       
        {!! Form::submit('Próximo', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProfileData']) !!}

    </div>
@endsection
