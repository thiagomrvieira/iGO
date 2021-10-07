@extends('frontoffice.layouts.app')
@section('content')
    @php
        App::setLocale('en');
    @endphp
    <div id="page-front">
        <div class="block-home-top">
            <div class="block-faq">
                <div class="main-fluid">
                    <div class="limit-wrapper">
                        <div class="faq-block-title">
                            <h2>{{ __('FAQs') }}</h2>
                        </div>
                        <div class="faqs">
                            {{-- <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Dúvidas frequentes</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Pedidos</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Entregas</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Pagamentos</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Cancelamentos</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-button">
                                    <h3>Reclamações</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 58 58">
                                        <defs>
                                          <filter id="Ellipse_200" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse">
                                            <feOffset dx="1" dy="1" input="SourceAlpha"/>
                                            <feGaussianBlur stdDeviation="3" result="blur"/>
                                            <feFlood flood-opacity="0.161"/>
                                            <feComposite operator="in" in2="blur"/>
                                          </filter>
                                        </defs>
                                        <g transform="translate(288 -309) rotate(90)">
                                          <g transform="matrix(0, -1, 1, 0, 309, 288)" filter="url(#Ellipse_200)">
                                            <circle cx="20" cy="20" r="20" transform="translate(48 8) rotate(90)" fill="#fff"/>
                                          </g>
                                          <g transform="translate(0 14.883)">
                                            <path d="M-3.816-.278,2.652-4.553l-6.469-4.3,1.411-2.215,9.569,6.5-9.569,6.5Z" transform="translate(335.385 249.847)" fill="#687780"/>
                                            <rect width="14" height="14" transform="translate(330 238.117)" fill="none"/>
                                          </g>
                                          <rect width="44" height="44" transform="translate(315 238)" fill="none"/>
                                        </g>
                                    </svg>
                                </button>
                                <div class="faq-content">
                                    <div class="faq-answer">
                                        <h4>Dúvida 1</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                    <div class="faq-answer">
                                        <h4>Dúvida 2</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                            @foreach ($content as $faq)
                                {!! $faq->content ?? null !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
