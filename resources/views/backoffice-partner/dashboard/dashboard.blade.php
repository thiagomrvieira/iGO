@extends('backoffice-partner.layouts.app')

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
    <div id="page-backoffice">
        <div class="block-home-find">
            <div class="block-accordion">
                <div class="main-fluid">
                    <div class="limit-wrapper dashboard-first-page">

                        <div class="dashboard-product">
                            {{-- Inserted dishes --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Pratos inseridos</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $products->first()->created_at ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Featured dishes --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ 
                                        $products->where('featured.active', 1)
                                                 ->where('featured.start_date',  '<=', Carbon\Carbon::now())
                                                 ->where('featured.finish_date', '>=', Carbon\Carbon::now())
                                                 ->count() 
                                        }}
                                    </p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p>Pratos em destaque</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $products->first()->created_at ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Starters --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'entradas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p class="container-title">Entradas</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $products->where('category.slug', 'entradas')->first()->created_at ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Mains --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'pratos-principais')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p class="container-title">Pratos principais</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        {{ $products->where('category.slug', 'pratos-principais')->first()->created_at ?? null }} 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Desserts --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'sobremesas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p class="container-title">Sobremesas</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $products->where('category.slug', 'sobremesas')->first()->created_at ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Drinks --}}
                            <div class="dashboard-product-content">
                                <div class="dashboard-product-count">
                                    <p>{{ $products->where('category.slug', 'bebidas')->count() }}</p>
                                </div>
                                    
                                <div class="dashboard-inserted-product-values">
                                    <p class="container-title">Bebidas</p>
                                    <div class="lastproduct-entry">
                                        <p>Última entrada</p>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <g id="calendar" transform="translate(-249 -504)">
                                                    <rect id="Rectangle_8194" data-name="Rectangle 8194" width="16" height="16" transform="translate(249 504)" fill="none"/>
                                                    <g id="calendar_copy" data-name="calendar copy" transform="translate(228.867 504.2)">
                                                        <g id="Group_10048" data-name="Group 10048" transform="translate(21.333)">
                                                            <g id="Group_10047" data-name="Group 10047" transform="translate(0)">
                                                                <rect id="Rectangle_8195" data-name="Rectangle 8195" width="3.757" height="3.757" transform="translate(6.763 8.266)" fill="#072a40"/>
                                                                <path id="Path_5390" data-name="Path 5390" d="M33.356,1.5H32.6V0H31.1V1.5H25.09V0h-1.5V1.5h-.751a1.5,1.5,0,0,0-1.5,1.5l-.008,10.52a1.5,1.5,0,0,0,1.5,1.5h10.52a1.5,1.5,0,0,0,1.5-1.5V3.006A1.5,1.5,0,0,0,33.356,1.5Zm0,12.023H22.836V5.26h10.52Z" transform="translate(-21.333)" fill="#072a40"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $products->where('category.slug', 'bebidas')->first()->created_at ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div>
                            <div>
                                <h6>
                                    <b>{{ $products->where('category.slug', 'entradas')->count() }}</b> Entradas
                                </h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'entradas')->first()->created_at ?? null }}
                                </p>
                                <hr>
                            </div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'pratos-principais')->count() }}</b> Pratos principais</h6> 
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'pratos-principais')->first()->created_at ?? null }} 
                                </p>
                                <hr>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'sobremesas')->count() }}</b> Sobremesas</h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'sobremesas')->first()->created_at ?? null }}
                                </p>
                                <hr>
                            </div>
                            <div>
                                <h6><b>{{ $products->where('category.slug', 'bebidas')->count() }}</b> Bebidas</h6>
                                <p>
                                    Última entrada <br>
                                    {{ $products->where('category.slug', 'bebidas')->first()->created_at ?? null }}
                                </p>
                                <hr>

                            </div> 
                        </div> --}}
                        <div class="nav-menu-fixed">
                            @include('backoffice-partner.layouts.sidebar') 
                        </div>
                        <div class="dashboard-footer">
                            <div class="dashboard-footer-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" viewBox="0 0 98.51 36.01">
                                    <g id="logo_form" transform="translate(-798 -315)">
                                      <g id="Group_13035" data-name="Group 13035" transform="translate(527.257 275.149)">
                                        <rect id="Rectangle_8134" data-name="Rectangle 8134" width="6.356" height="25.338" transform="translate(271.689 50.051)" fill="#072a40"/>
                                        <path id="Path_5314" data-name="Path 5314" d="M423.027,175.194a3.214,3.214,0,0,1-.826,1.073,3.974,3.974,0,0,1-1.3.731,5.169,5.169,0,0,1-1.73.268,5.113,5.113,0,0,1-1.707-.268,3.956,3.956,0,0,1-1.3-.731,3.21,3.21,0,0,1-.826-1.073,3.013,3.013,0,0,1-.291-1.3,3.078,3.078,0,0,1,.291-1.322,3.142,3.142,0,0,1,.826-1.063,4.139,4.139,0,0,1,1.3-.718,5.109,5.109,0,0,1,1.707-.268,5.167,5.167,0,0,1,1.73.268,4.143,4.143,0,0,1,1.3.718,3.148,3.148,0,0,1,.826,1.063,3.05,3.05,0,0,1,.289,1.322A2.986,2.986,0,0,1,423.027,175.194Z" transform="translate(-144.305 -130.673)" fill="#072a40"/>
                                        <path id="Path_5315" data-name="Path 5315" d="M465.7,191.68a14.915,14.915,0,0,1-1.117,4.6,14.515,14.515,0,0,1-2.5,3.963,15.457,15.457,0,0,1-3.8,3.1,19.418,19.418,0,0,1-5.024,2.018,24.926,24.926,0,0,1-6.163.718,23.986,23.986,0,0,1-8.385-1.374,18.721,18.721,0,0,1-6.281-3.758,16.158,16.158,0,0,1-3.939-5.583,17.25,17.25,0,0,1-1.365-6.829,16.536,16.536,0,0,1,1.332-6.624,15.135,15.135,0,0,1,3.887-5.356,18.535,18.535,0,0,1,6.281-3.585,25.66,25.66,0,0,1,8.536-1.311,34.2,34.2,0,0,1,3.489.183,29.838,29.838,0,0,1,3.458.569,27.548,27.548,0,0,1,3.329.977,21.218,21.218,0,0,1,3.079,1.406l-3.134,5.154a12.844,12.844,0,0,0-2-.934,18.209,18.209,0,0,0-2.395-.709,23.3,23.3,0,0,0-2.641-.44,24.763,24.763,0,0,0-2.738-.151,18.385,18.385,0,0,0-5.669.806,12.313,12.313,0,0,0-4.209,2.253,9.643,9.643,0,0,0-2.62,3.468,10.736,10.736,0,0,0-.9,4.424,10.926,10.926,0,0,0,.945,4.573,10.321,10.321,0,0,0,2.684,3.586,12.644,12.644,0,0,0,4.209,2.352,18.367,18.367,0,0,0,9.963.3,11.794,11.794,0,0,0,3.522-1.557,8.73,8.73,0,0,0,2.448-2.436,8.234,8.234,0,0,0,1.246-3.211H447.5v-5.6h17.844v.021l.022-.021A17.422,17.422,0,0,1,465.7,191.68Z" transform="translate(-139.668 -130.239)" fill="#072a40"/>
                                        <path id="Path_5950" data-name="Path 5950" d="M495.48,181.8a15.763,15.763,0,0,0-3.92-5.421,17.746,17.746,0,0,0-6.065-3.51,25.175,25.175,0,0,0-15.642,0,17.774,17.774,0,0,0-6.055,3.51,15.754,15.754,0,0,0-3.918,5.421,17,17,0,0,0-1.4,6.956,17.275,17.275,0,0,0,1.4,7.01,15.972,15.972,0,0,0,3.918,5.486,17.9,17.9,0,0,0,6.058,3.575,24.59,24.59,0,0,0,15.641,0,17.878,17.878,0,0,0,6.065-3.575,15.972,15.972,0,0,0,3.918-5.486,17.276,17.276,0,0,0,1.394-7.01A17.027,17.027,0,0,0,495.48,181.8Zm-6.356,11.636a10.54,10.54,0,0,1-2.6,3.554,11.57,11.57,0,0,1-3.918,2.266,15.693,15.693,0,0,1-9.858,0,11.7,11.7,0,0,1-3.929-2.266,10.328,10.328,0,0,1-2.6-3.554,11.3,11.3,0,0,1-.933-4.68,11.145,11.145,0,0,1,.933-4.66,9.934,9.934,0,0,1,2.6-3.489,11.524,11.524,0,0,1,3.929-2.178,16.515,16.515,0,0,1,9.858,0,11.412,11.412,0,0,1,3.918,2.178,10.117,10.117,0,0,1,2.6,3.489,11.042,11.042,0,0,1,.944,4.66A11.2,11.2,0,0,1,489.124,193.44Z" transform="translate(-127.623 -130.249)" fill="#072a40"/>
                                      </g>
                                    </g>
                                  </svg>
                            </div>
                            <div class="dashboard-footer-contacts">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g id="email" transform="translate(-89 -255)" opacity="0.7">
                                          <g id="mail" transform="translate(90.583 258.623)">
                                            <g id="Group_9804" data-name="Group 9804" transform="translate(0 0)">
                                              <path id="Path_5334" data-name="Path 5334" d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z" transform="translate(0 -61)" fill="#072a40"/>
                                            </g>
                                          </g>
                                          <rect id="Rectangle_8180" data-name="Rectangle 8180" width="20" height="20" transform="translate(89 255)" fill="none"/>
                                        </g>
                                    </svg>
                                    <span>aderentes@igo.com.ao</span>
                                </p>
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g id="telemóvel" transform="translate(-5600 -713)" opacity="0.7">
                                          <g id="phone" transform="translate(5533.1 715)">
                                            <g id="Group_10749" data-name="Group 10749" transform="translate(71.6)">
                                              <path id="Path_5863" data-name="Path 5863" d="M81.346.453v0A1.531,1.531,0,0,0,80.261,0H73.135A1.54,1.54,0,0,0,71.6,1.535V14.645a1.541,1.541,0,0,0,1.535,1.536h7.128A1.541,1.541,0,0,0,81.8,14.647V1.536A1.531,1.531,0,0,0,81.346.453ZM76.7,15.14h0a.415.415,0,1,1,.415-.415A.415.415,0,0,1,76.7,15.14Zm3.88-2.6a1,1,0,0,1-1,1H73.82a1,1,0,0,1-1-1V2.767a1,1,0,0,1,1-1h5.757a1,1,0,0,1,1,1Z" transform="translate(-71.6)" fill="#072a40"/>
                                            </g>
                                          </g>
                                          <rect id="Rectangle_8250" data-name="Rectangle 8250" width="20" height="20" transform="translate(5600 713)" fill="none"/>
                                        </g>
                                    </svg>
                                    <span>+244 111 222 789</span>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
    </script>
@endsection