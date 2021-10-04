@extends('frontoffice.layouts.app')

@section('content')

    {{-- @php
    App::setLocale('en');
@endphp --}}

    {{-- @isset($about)
        <strong>
            {{ $about->title ?? null }}
        </strong>
        <br><br>
        {!! $about->content ?? null !!}
    @endisset --}}


    <div id="page-front">
        <div class="block-home-top">
            <div class="block-about-us">
                <div class="img-full">
                    <img src="{{ asset('assets-frontoffice/images/about-us.jpg') }}" alt="About us">
                </div>
                <div class="main-fluid">
                    <div class="limit-wrapper">
                        <div class="about-us-text-top">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                        <div class="how-to-use">
                            <div class="about-block-title">
                                <h2>{{ __('Como utilizar:') }}</h2>
                            </div>
                            <div class="about-icons">
                                <div class="column-3">
                                    <div class="block-about-icon">
                                        <img src="{{ asset('assets-frontoffice/images/icon-time.svg') }}"
                                            alt="{{ __('Entregas no tempo certo') }}"
                                            title="{{ __('Entregas no tempo certo') }}" />
                                    </div>
                                    <div class="block-about-lead"><span>{{ __('Faça a sua pesquisa') }}</span></div>
                                </div>
                                <div class="column-3">
                                    <div class="block-about-icon">
                                        <img src="{{ asset('assets-frontoffice/images/icon-info.svg') }}"
                                            alt="{{ __('Informação integrada') }}"
                                            title="{{ __('Informação integrada') }}" />
                                    </div>
                                    <div class="block-about-lead"><span>{{ __('Encomende o que desejar') }}</span></div>
                                </div>
                                <div class="column-3">
                                    <div class="block-about-icon">
                                        <img src="{{ asset('assets-frontoffice/images/icon-bussiness.svg') }}"
                                            alt="{{ __('Mapeamento do negócio') }}"
                                            title="{{ __('Mapeamento do negócio') }}" />
                                    </div>
                                    <div class="block-about-lead"><span>{{ __('Acompanhe o seu pedido') }}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="about-us-text-bottum">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
