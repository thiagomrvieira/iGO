@extends('frontoffice.layouts.app')

@section('content')
    <div id="page-front">
        <div class="block-home-top">
            {!! $about->content ?? null !!}
        </div>
    </div>

    {{-- 
    <div class="block-about-us">
        <div class="block-about-banner" style="background-image: url(/assets-frontoffice/images/about-us.png);">
            <div class="limit-wrapper">
                <h2>Um mundo à sua porta...</h2>
            </div>
        </div>
        <div class="block-about-body">
            <div class="limit-wrapper">
                <div class="block-about-body-top">
                    <p>A iGo é uma empressa jovem e dinâmica, baseada em Angola, com objetivo de melhorar o acesso de produtos e serviços aos nossos usuários, de forma a melhorar a funcionalidade do nosso cotidiano. Apelamos pela tecnologia e inovação dos nossos serviços bem como o favorecimento do desenvolvimento económico, social e ambiental da nossa sociedade.</p>
                    <p>Missão IGo: A nossa missão é garantir aos nossos clientes acesso aos seus pedidos de forma rápida e eficiente anytime, anywhere; Conectando usuários, empresas e transportadores de acordo as suas necessidades.</p>
                    <p>Visão iGo: A nossa visão consiste em facilitar o acesso e intercâmbio de produtos a todos os nossos clientes sem esforço e de forma sustentável.</p>
                </div>
                <div class="block-about-how-use">
                    <div class="block-about-how-use-title">
                        <h2>Como utilizar:</h2>
                    </div>
                    <div class="block-about-how-use-list">
                        <div class="block-how-use-column">
                            <div class="block-how-use-icon">
                                <img src="/assets-frontoffice/images/icon-time.svg" alt="Entregas no tempo certo" title="Entregas no tempo certo">
                            </div>
                            <div class="block-how-use-lead"><span>Faça a sua pesquisa</span></div>
                        </div>
                        <div class="block-how-use-column">
                            <div class="block-how-use-icon">
                                <img src="/assets-frontoffice/images/icon-info.svg" alt="Informação integrada" title="Informação integrada">
                            </div>
                            <div class="block-how-use-lead"><span>Encomende o que desejar</span></div>
                        </div>
                        <div class="block-how-use-column">
                            <div class="block-how-use-icon">
                                <img src="/assets-frontoffice/images/icon-bussiness.svg" alt="Mapeamento do negócio" title="Mapeamento do negócio">
                            </div>
                            <div class="block-how-use-lead"><span>Acompanhe o seu pedido</span></div>
                        </div>
                    </div>
                </div>
                <div class="block-about-body-bottom">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
        </div>
    </div>
    --}}
@endsection