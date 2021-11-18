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
                                <button class="accordion-button is-open" type="button">
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
                                <div class="accordion-content profile-content">
                                    <div class="profile-image-cover">

                                    </div>
                                    {{-- @if (isset($partner->images->image_cover))
                                        <img src="{{url('/storage/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" alt="Partner Image" height="90px">
                                        {!! Form::label('image_cover', 'Alterar foto' , ['class' => 'form-check-label']) !!}
                                    @else
                                        <img src="{{url('/assets-backoffice-partner/images/photo_loja.png')}}" alt="Partner Image" height="90px">
                                        {!! Form::label('image_cover', 'Inserir foto*', ['class' => 'form-check-label']) !!}
                                    @endif --}}
                                    {!! Form::file ('image_cover', null, false,     ['class' => 'form-check-input']) !!}

                                    <div class="block-form">
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-name">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(138 -724.44)">
                                                            <g transform="translate(-138 724.44)">
                                                                <rect width="20" height="20" fill="none"/>
                                                                <g transform="translate(2.088 1.677)">
                                                                    <g>
                                                                        <path d="M8.322,0a8.322,8.322,0,1,0,8.322,8.322A8.331,8.331,0,0,0,8.322,0Zm0,15.326a7,7,0,1,1,7-7A7.012,7.012,0,0,1,8.322,15.326Z" fill="#072a40"/>
                                                                    </g>
                                                                    <g transform="translate(2.156 9.798)">
                                                                        <path d="M72.5,301.425a7.78,7.78,0,0,0-6.166,3.3l1.045.8a6.095,6.095,0,0,1,10.241,0l1.045-.8A7.78,7.78,0,0,0,72.5,301.425Z" transform="translate(-66.33 -301.425)" fill="#072a40"/>
                                                                    </g>
                                                                    <g transform="translate(4.896 2.986)">
                                                                        <path d="M154.053,91.863a3.447,3.447,0,1,0,3.425,3.447A3.44,3.44,0,0,0,154.053,91.863Zm0,5.577a2.13,2.13,0,1,1,2.108-2.13A2.121,2.121,0,0,1,154.053,97.44Z" transform="translate(-150.628 -91.863)" fill="#072a40"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('name', $partner->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome*']) !!}
                                                </div>
                                            </div> 
                                        </div>
                                    

                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-email">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-89 -255)">
                                                            <g transform="translate(90.583 258.623)">
                                                                <g transform="translate(0 0)">
                                                                    <path d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z" transform="translate(0 -61)" fill="#072a40"/>
                                                                </g>
                                                            </g>
                                                            <rect width="20" height="20" transform="translate(89 255)" fill="none"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('email', $partner->email ?? null, ['class' => 'form-control', 'placeholder' => 'E-mail*']) !!}
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-address">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-16567 -885.837)">
                                                            <g transform="translate(16568.652 887.653)">
                                                                <path d="M19.364,6.983,17.081,4.969v-3.2a.49.49,0,0,0-.49-.49h-1.96a.49.49,0,0,0-.49.49v.61L11.589.123a.49.49,0,0,0-.648,0L3.165,6.983a.49.49,0,0,0,.648.735l1.049-.925v8.954H4.4a.49.49,0,1,0,0,.98H18.125a.49.49,0,1,0,0-.98h-.458V6.793l1.049.925a.49.49,0,1,0,.648-.735ZM15.121,2.254h.98V4.1l-.98-.865Zm1.566,13.492H5.842V5.928l5.422-4.784,5.429,4.79C16.69,5.959,16.687,15.747,16.687,15.747Z" transform="translate(-2.999 0)" fill="#072a40"/>
                                                                <path d="M141.161,214a2.288,2.288,0,0,0-1.63.674A2.305,2.305,0,0,0,135.6,216.3a5.057,5.057,0,0,0,1.544,3.013,4.527,4.527,0,0,0,2.39,1.556,4.448,4.448,0,0,0,2.385-1.482,4.933,4.933,0,0,0,1.548-3.088A2.305,2.305,0,0,0,141.161,214Zm.056,4.7a4.07,4.07,0,0,1-1.685,1.189,4.348,4.348,0,0,1-1.695-1.267,4.02,4.02,0,0,1-1.26-2.323,1.323,1.323,0,0,1,2.513-.579.49.49,0,0,0,.881,0,1.323,1.323,0,0,1,2.513.579A3.865,3.865,0,0,1,141.217,218.7Z" transform="translate(-131.265 -207.009)" fill="#072a40"/>
                                                            </g>
                                                            <rect width="20" height="20" transform="translate(16567 885.837)" fill="none"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha*']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-address">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-16567 -885.837)">
                                                            <g transform="translate(16568.652 887.653)">
                                                                <path d="M19.364,6.983,17.081,4.969v-3.2a.49.49,0,0,0-.49-.49h-1.96a.49.49,0,0,0-.49.49v.61L11.589.123a.49.49,0,0,0-.648,0L3.165,6.983a.49.49,0,0,0,.648.735l1.049-.925v8.954H4.4a.49.49,0,1,0,0,.98H18.125a.49.49,0,1,0,0-.98h-.458V6.793l1.049.925a.49.49,0,1,0,.648-.735ZM15.121,2.254h.98V4.1l-.98-.865Zm1.566,13.492H5.842V5.928l5.422-4.784,5.429,4.79C16.69,5.959,16.687,15.747,16.687,15.747Z" transform="translate(-2.999 0)" fill="#072a40"/>
                                                                <path d="M141.161,214a2.288,2.288,0,0,0-1.63.674A2.305,2.305,0,0,0,135.6,216.3a5.057,5.057,0,0,0,1.544,3.013,4.527,4.527,0,0,0,2.39,1.556,4.448,4.448,0,0,0,2.385-1.482,4.933,4.933,0,0,0,1.548-3.088A2.305,2.305,0,0,0,141.161,214Zm.056,4.7a4.07,4.07,0,0,1-1.685,1.189,4.348,4.348,0,0,1-1.695-1.267,4.02,4.02,0,0,1-1.26-2.323,1.323,1.323,0,0,1,2.513-.579.49.49,0,0,0,.881,0,1.323,1.323,0,0,1,2.513.579A3.865,3.865,0,0,1,141.217,218.7Z" transform="translate(-131.265 -207.009)" fill="#072a40"/>
                                                            </g>
                                                            <rect width="20" height="20" transform="translate(16567 885.837)" fill="none"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('line_1', $partner->address->line_1 ?? null, ['class' => 'form-control', 'placeholder' => 'Rua*']) !!}
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-county">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-2960 -715)">
                                                            <rect width="20" height="20" transform="translate(2960 715)" fill="none"/>
                                                            <path d="M18.1,7.422l-.915-.52h0L14.568,5.418a.542.542,0,0,0-.536,0l-1.8,1.024V4.36l.181.1a.542.542,0,1,0,.536-.943L6.878.072a.543.543,0,0,0-.536,0L.274,3.519a.542.542,0,1,0,.536.943l.181-.1v7.2a.542.542,0,0,0,.542.542h15.38a.542.542,0,0,0,.542-.542V8.306l.1.059a.543.543,0,0,0,.536-.943ZM2.076,3.743,6.61,1.167l4.534,2.576V7.385h0v3.634h-2.2V6.974A.542.542,0,0,0,8.4,6.432H4.821a.542.542,0,0,0-.542.542v4.045h-2.2V3.743Zm3.288,7.276v-3.5H7.856v3.5Zm8.626,0V9.754h.62v1.266Zm2.381,0h-.676V9.211a.542.542,0,0,0-.542-.542h-1.7a.542.542,0,0,0-.542.542v1.808h-.676V7.69L14.3,6.513,16.371,7.69Zm0,0" transform="translate(2961 718.999)" fill="#072a40"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('county_id', $partner->address->county->name ?? null, ['class' => 'form-control', 'placeholder' => 'Provincia*']) !!}
                                                    {{-- <select id="county_id" class="county_id" name="county_id" @change="removeClassError('partnerCreation', 'county_id')" v-select="partner.county_id">
                                                        <option value="" disabled selected>{{ __('Província') }}</option>
                                                        @foreach ($counties as $countie)
                                                            <option value="{{$countie->id}}">{{$countie->name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    {{-- <input  type="text" id="county_id" name="county_id" placeholder="{{ __('homepage.home-partner-form-county') }}" @change="removeClassError('partnerCreation', 'county_id')" v-model="partner.county_id"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-city">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-5539 -748)">
                                                            <rect width="20" height="20" transform="translate(5539 748)" fill="none"/>
                                                            <g transform="translate(5542.333 749.111)">
                                                                <g transform="translate(0)">
                                                                    <path d="M67.693,0A6.7,6.7,0,0,0,61,6.693c0,2.382.725,3.338,4.207,7.929.6.8,1.29,1.7,2.074,2.745a.515.515,0,0,0,.824,0c.779-1.04,1.462-1.939,2.064-2.733,3.491-4.6,4.217-5.562,4.217-7.941A6.7,6.7,0,0,0,67.693,0Zm1.655,14.011c-.494.652-1.043,1.375-1.655,2.189-.616-.819-1.168-1.546-1.665-2.2-3.387-4.466-4-5.27-4-7.306a5.663,5.663,0,0,1,11.326,0C73.356,8.725,72.744,9.532,69.348,14.011Z" transform="translate(-61)" fill="#072a40"/>
                                                                </g>
                                                                <g transform="translate(3.089 3.089)">
                                                                    <path d="M154.6,90a3.6,3.6,0,1,0,3.6,3.6A3.608,3.608,0,0,0,154.6,90Zm0,6.178a2.574,2.574,0,1,1,2.574-2.574A2.577,2.577,0,0,1,154.6,96.178Z" transform="translate(-151 -90)" fill="#072a40"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('', $partner->address->locality ?? null, ['class' => 'form-control', 'placeholder' => 'Bairro*']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-phone-number">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-18205 -891)">
                                                            <g transform="translate(18206.199 892.2)">
                                                                <path d="M12.6,17.527a4.883,4.883,0,0,1-1.675-.3,17.864,17.864,0,0,1-6.487-4.135A17.863,17.863,0,0,1,.3,6.606,4.848,4.848,0,0,1,.052,4.223,4.971,4.971,0,0,1,2.607.584,4.88,4.88,0,0,1,4.944,0,.548.548,0,0,1,5.48.433l.86,4.012a.548.548,0,0,1-.148.5L4.722,6.416a14.417,14.417,0,0,0,6.389,6.389l1.469-1.469a.548.548,0,0,1,.5-.148l4.012.86a.548.548,0,0,1,.433.536,4.88,4.88,0,0,1-.584,2.337A4.971,4.971,0,0,1,13.3,17.475a4.872,4.872,0,0,1-.707.052ZM4.507,1.119A3.838,3.838,0,0,0,1.329,6.232,16.612,16.612,0,0,0,11.3,16.2a3.838,3.838,0,0,0,5.112-3.177l-3.264-.7L11.61,13.856a.548.548,0,0,1-.62.108A15.508,15.508,0,0,1,3.563,6.537a.548.548,0,0,1,.108-.62L5.206,4.383Z" transform="translate(0 0)" fill="#072a40"/>
                                                            </g>
                                                            <rect width="20" height="20" transform="translate(18205 891)" fill="none"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('phone', $partner->phone_number ?? null, ['class' => 'form-control', 'placeholder' => 'Telefone*']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-mobile-number">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-5600 -713)">
                                                            <g transform="translate(5533.1 715)">
                                                                <g transform="translate(71.6)">
                                                                    <path id="Path_5863" data-name="Path 5863" d="M81.346.453v0A1.531,1.531,0,0,0,80.261,0H73.135A1.54,1.54,0,0,0,71.6,1.535V14.645a1.541,1.541,0,0,0,1.535,1.536h7.128A1.541,1.541,0,0,0,81.8,14.647V1.536A1.531,1.531,0,0,0,81.346.453ZM76.7,15.14h0a.415.415,0,1,1,.415-.415A.415.415,0,0,1,76.7,15.14Zm3.88-2.6a1,1,0,0,1-1,1H73.82a1,1,0,0,1-1-1V2.767a1,1,0,0,1,1-1h5.757a1,1,0,0,1,1,1Z" transform="translate(-71.6)" fill="#072a40"/>
                                                                </g>
                                                            </g>
                                                            <rect width="20" height="20" transform="translate(5600 713)" fill="none"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('mobile', $partner->mobile_phone_number ?? null, ['class' => 'form-control', 'placeholder' => 'Telemóvel*']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-company-name">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g transform="translate(-3137 -900)" opacity="0.7">
                                                            <rect width="20" height="20" transform="translate(3137 900)" fill="none"/>
                                                            <g transform="translate(3137.5 902.3)">
                                                                <g>
                                                                    <path d="M.866,63.07H1.18V54.757A2.61,2.61,0,0,1,0,52.569a.284.284,0,0,1,.036-.139l2.191-3.891a.866.866,0,0,1,.752-.443H15.867a.866.866,0,0,1,.752.443L18.81,52.43a.284.284,0,0,1,.036.139,2.61,2.61,0,0,1-1.18,2.188V63.07h.314a.28.28,0,0,1,0,.56H.866a.28.28,0,0,1,0-.56ZM18.275,52.849H17.39a.28.28,0,0,1,0-.56h.7L16.14,48.817a.314.314,0,0,0-.273-.161H2.979a.314.314,0,0,0-.273.161L.752,52.289h.7a.28.28,0,0,1,0,.56H.571A2.024,2.024,0,0,0,2.563,54.61a2.024,2.024,0,0,0,1.991-1.761H2.637a.28.28,0,0,1,0-.56H16.21a.28.28,0,0,1,0,.56H14.292a2.007,2.007,0,0,0,3.983,0Zm-13.13,0a2.006,2.006,0,0,0,3.983,0Zm4.574,0a2.006,2.006,0,0,0,3.983,0ZM3.208,63.07H6.2v-.937H3.208Zm0-1.5H6.2v-5.13H3.208Zm-1.475,1.5h.923V56.163a.278.278,0,0,1,.276-.28H6.472a.278.278,0,0,1,.276.28V63.07H17.114V55.029a2.516,2.516,0,0,1-.83.141A2.562,2.562,0,0,1,14,53.743a2.545,2.545,0,0,1-4.574,0,2.545,2.545,0,0,1-4.574,0A2.562,2.562,0,0,1,2.563,55.17a2.518,2.518,0,0,1-.83-.141Z" transform="translate(0 -48.096)" fill="#072a40" stroke="#072a40" stroke-width="0.4"/>
                                                                </g>
                                                                <g transform="translate(7.504 7.787)">
                                                                    <path d="M72.425,256.516h8.086a.28.28,0,0,1,.28.28v5.69a.28.28,0,0,1-.28.28H72.425a.28.28,0,0,1-.28-.28V256.8A.28.28,0,0,1,72.425,256.516Zm.28,5.69h7.526v-5.13H72.705Z" transform="translate(-72.145 -256.516)" fill="#072a40" stroke="#072a40" stroke-width="0.4"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('post_code', $partner->address->post_code ?? null, ['class' => 'form-control', 'placeholder' => 'Codigo postal*']) !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="block-form-group">
                                            <div class="block-field block-field-entity-partner-tax-number">
                                                <div class="block-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <g transform="translate(-16629 -1772)">
                                                            <rect width="24" height="24" transform="translate(16629 1772)" fill="none"/>
                                                            <g transform="translate(16630 1680.5)" opacity="0.7">
                                                                <path d="M21.1,96.5H.69a.69.69,0,0,0-.69.69v12.082a.69.69,0,0,0,.69.69H21.1a.69.69,0,0,0,.69-.69V97.19A.69.69,0,0,0,21.1,96.5Zm-.69,12.082H1.38V97.88H20.406Z" transform="translate(0 0)" fill="#072a40"/>
                                                                <path d="M68.423,185.028v3.609a.69.69,0,0,0,1.38,0V184.05a.691.691,0,0,0-1.076-.572l-.477.322A.691.691,0,0,0,68.423,185.028Z" transform="translate(-65.016 -83.112)" fill="#072a40"/>
                                                                <path d="M181.658,184.478,182.69,184a.677.677,0,0,1,.781.351.669.669,0,0,1-.347.913c-.061.025.06-.041-1.661.944a1.275,1.275,0,0,0,.62,2.382c2.773.029,2.011.023,2.147.023a.69.69,0,0,0,.007-1.38l-1.754-.019,1.21-.693a2.048,2.048,0,0,0-1.542-3.793l-1.073.5a.69.69,0,0,0,.58,1.252Z" transform="translate(-172.885 -82.373)" fill="#072a40"/>
                                                                <path d="M336.23,182.751h1.584l-.574.583a.691.691,0,0,0,.492,1.174.812.812,0,1,1-.73,1.168.69.69,0,0,0-1.239.607,2.192,2.192,0,1,0,3.227-2.759l.376-.382a1.042,1.042,0,0,0-.742-1.771H336.23a.69.69,0,1,0,0,1.38Z" transform="translate(-321.068 -81.211)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="block-input">
                                                    {!! Form::text('country', $partner->address->country ?? null, ['class' => 'form-control', 'placeholder' => 'País*']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
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
