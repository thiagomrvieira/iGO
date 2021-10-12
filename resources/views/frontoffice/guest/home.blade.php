
@extends('frontoffice.layouts.app')

@section('content')
    <div id="page-front">
        <div class="block-home-top">
            <div class="main-fluid">
                <div class="limit-wrapper">
                    <div class="row-fluid">
                        <div class="column-left">
                            <div class="block-image"><img src="{{ asset('assets-frontoffice/images/telephone-app-igo.png') }}" alt="{{ __('iGO APP') }}" title="{{ __('iGO APP') }}"/></div>
                        </div>
                        <div class="column-right">
                            <div class="block-title"><h1>{{ __('homepage.header-title') }}</h1></div>
                            <div class="block-subtitle"><h2>{{ __('homepage.header-subtitle') }}</h2></div>
                            <div class="block-apps">
                                <a href="javascript:void(0);" target="_blank"><img src="{{ asset('assets-frontoffice/images/google-play-store.png') }}" alt="{{ __('Google Play') }}" title="{{ __('Google Play') }}"/></a>
                                <a href="javascript:void(0);" target="_blank"><img src="{{ asset('assets-frontoffice/images/apple-store.png') }}" alt="{{ __('Apple Store') }}" title="{{ __('Apple Store') }}"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-home-find">
            <div class="main-fluid">
                <div class="limit-wrapper">
                    <div class="block-title"><h2>{{ __('homepage.home-find-title') }}</h2></div>
                    <div class="row-fluid">
                        <div class="column-4">
                            <div class="block-find-icon">
                               <img src="{{ asset('assets-frontoffice/images/icon-time.svg') }}" alt="{{ __('homepage.home-find-delivery') }}" title="{{ __('homepage.home-find-delivery') }}"/>
                            </div>
                            <div class="block-find-lead"><span>{{ __('homepage.home-find-delivery') }}</span></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                               <img src="{{ asset('assets-frontoffice/images/icon-info.svg') }}" alt="{{ __('homepage.home-find-information') }}" title="{{ __('homepage.home-find-information') }}"/>
                            </div>
                            <div class="block-find-lead"><span>{{ __('homepage.home-find-information') }}</span></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                               <img src="{{ asset('assets-frontoffice/images/icon-bussiness.svg') }}" alt="{{ __('homepage.home-find-business') }}" title="{{ __('homepage.home-find-business') }}"/>
                            </div>
                            <div class="block-find-lead"><span>{{ __('homepage.home-find-business') }}</span></div>
                        </div>
                        <div class="column-4">
                            <div class="block-find-icon">
                               <img src="{{ asset('assets-frontoffice/images/icon-comunication.svg') }}" alt="{{ __('homepage.home-find-comunication') }}" title="{{ __('homepage.home-find-comunication') }}"/>
                            </div>
                            <div class="block-find-lead"><span>{{ __('homepage.home-find-comunication') }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-home-partner">
            <div class="main-fluid">
                <div class="limit-wrapper">
                    <div class="row-fluid">
                        <div class="column-left">
                            <div class="block-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="255" height="36.01" viewBox="0 0 255 36.01">
                                    <g transform="translate(-260 -1394)">
                                        <g transform="translate(67.257 1354.149)">
                                            <rect width="6.356" height="25.338" transform="translate(271.689 50.051)" fill="#ffe414"/>
                                            <path d="M423.027,175.194a3.214,3.214,0,0,1-.826,1.073,3.974,3.974,0,0,1-1.3.731,5.169,5.169,0,0,1-1.73.268,5.113,5.113,0,0,1-1.707-.268,3.956,3.956,0,0,1-1.3-.731,3.21,3.21,0,0,1-.826-1.073,3.013,3.013,0,0,1-.291-1.3,3.078,3.078,0,0,1,.291-1.322,3.142,3.142,0,0,1,.826-1.063,4.139,4.139,0,0,1,1.3-.718,5.109,5.109,0,0,1,1.707-.268,5.167,5.167,0,0,1,1.73.268,4.143,4.143,0,0,1,1.3.718,3.148,3.148,0,0,1,.826,1.063,3.05,3.05,0,0,1,.289,1.322A2.986,2.986,0,0,1,423.027,175.194Z" transform="translate(-144.305 -130.673)" fill="#eb3e3e"/>
                                            <path d="M465.7,191.68a14.915,14.915,0,0,1-1.117,4.6,14.515,14.515,0,0,1-2.5,3.963,15.457,15.457,0,0,1-3.8,3.1,19.418,19.418,0,0,1-5.024,2.018,24.926,24.926,0,0,1-6.163.718,23.986,23.986,0,0,1-8.385-1.374,18.721,18.721,0,0,1-6.281-3.758,16.158,16.158,0,0,1-3.939-5.583,17.25,17.25,0,0,1-1.365-6.829,16.536,16.536,0,0,1,1.332-6.624,15.135,15.135,0,0,1,3.887-5.356,18.535,18.535,0,0,1,6.281-3.585,25.66,25.66,0,0,1,8.536-1.311,34.2,34.2,0,0,1,3.489.183,29.838,29.838,0,0,1,3.458.569,27.548,27.548,0,0,1,3.329.977,21.218,21.218,0,0,1,3.079,1.406l-3.134,5.154a12.844,12.844,0,0,0-2-.934,18.209,18.209,0,0,0-2.395-.709,23.3,23.3,0,0,0-2.641-.44,24.763,24.763,0,0,0-2.738-.151,18.385,18.385,0,0,0-5.669.806,12.313,12.313,0,0,0-4.209,2.253,9.643,9.643,0,0,0-2.62,3.468,10.736,10.736,0,0,0-.9,4.424,10.926,10.926,0,0,0,.945,4.573,10.321,10.321,0,0,0,2.684,3.586,12.644,12.644,0,0,0,4.209,2.352,18.367,18.367,0,0,0,9.963.3,11.794,11.794,0,0,0,3.522-1.557,8.73,8.73,0,0,0,2.448-2.436,8.234,8.234,0,0,0,1.246-3.211H447.5v-5.6h17.844v.021l.022-.021A17.422,17.422,0,0,1,465.7,191.68Z" transform="translate(-139.668 -130.239)" fill="#072a40"/>
                                            <path d="M495.48,181.8a15.763,15.763,0,0,0-3.92-5.421,17.746,17.746,0,0,0-6.065-3.51,25.175,25.175,0,0,0-15.642,0,17.774,17.774,0,0,0-6.055,3.51,15.754,15.754,0,0,0-3.918,5.421,17,17,0,0,0-1.4,6.956,17.275,17.275,0,0,0,1.4,7.01,15.972,15.972,0,0,0,3.918,5.486,17.9,17.9,0,0,0,6.058,3.575,24.59,24.59,0,0,0,15.641,0,17.878,17.878,0,0,0,6.065-3.575,15.972,15.972,0,0,0,3.918-5.486,17.276,17.276,0,0,0,1.394-7.01A17.027,17.027,0,0,0,495.48,181.8Zm-6.356,11.636a10.54,10.54,0,0,1-2.6,3.554,11.57,11.57,0,0,1-3.918,2.266,15.693,15.693,0,0,1-9.858,0,11.7,11.7,0,0,1-3.929-2.266,10.328,10.328,0,0,1-2.6-3.554,11.3,11.3,0,0,1-.933-4.68,11.145,11.145,0,0,1,.933-4.66,9.934,9.934,0,0,1,2.6-3.489,11.524,11.524,0,0,1,3.929-2.178,16.515,16.515,0,0,1,9.858,0,11.412,11.412,0,0,1,3.918,2.178,10.117,10.117,0,0,1,2.6,3.489,11.042,11.042,0,0,1,.944,4.66A11.2,11.2,0,0,1,489.124,193.44Z" transform="translate(-127.623 -130.249)" fill="#072a40"/>
                                        </g>
                                        <rect width="255" height="36" transform="translate(260 1394)" fill="none"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="block-title"><h2>{{ __('homepage.home-partner-title') }}</h2></div>
                            <div class="block-lead"><span>{{ __('homepage.home-partner-subtitle') }}</span></div>
                            <div class="block-image"><img src="{{ asset('assets-frontoffice/images/phone-app-igo.png') }}" alt="{{ __('iGO APP') }}" title="{{ __('iGO APP') }}"/></div>
                        </div>
                        <div class="column-right">
                            <div class="block-form">
                                <form method="POST" id="partnerCreation" class="form-default-wrapper" enctype="multipart/form-data">
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
                                                <input type="text" id="name" name="name" placeholder="{{ __('homepage.home-partner-form-name') }}" @change="removeClassError('partnerCreation', 'name')" v-model="partner.name">
                                            </div>
                                        </div> 
                                        <div class="block-field-msg" v-if="partnerErrors.includes('name')">
                                            <small id="nameHelp" class="text-danger" >{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="email" id="email" name="email" placeholder="{{ __('homepage.home-partner-form-email') }}" @change="removeClassError('partnerCreation', 'email')" v-model="partner.email">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="emailHelp" class="text-danger" v-if="partnerErrors.includes('email')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="address" name="line_1" placeholder="{{ __('homepage.home-partner-form-address') }}" @change="removeClassError('partnerCreation', 'line_1')" v-model="partner.line_1">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="address1Help" class="text-danger" v-if="partnerErrors.includes('line_1')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input  type="text" id="county" name="county" placeholder="{{ __('homepage.home-partner-form-county') }}" @change="removeClassError('partnerCreation', 'county')" v-model="partner.county">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="countyHelp" class="text-danger" v-if="partnerErrors.includes('county')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="city" name="city" placeholder="{{ __('homepage.home-partner-form-city') }}" @change="removeClassError('partnerCreation', 'city')" v-model="partner.city">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="cityHelp" class="text-danger" v-if="partnerErrors.includes('city')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="phone_number" name="phone_number" placeholder="{{ __('homepage.home-partner-form-phone-number') }}" @change="removeClassError('partnerCreation', 'phone_number')" v-model="partner.phone_number">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="phone_numberHelp" class="text-danger" v-if="partnerErrors.includes('phone_number')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="mobile_phone_number" name="mobile_phone_number" placeholder="{{ __('homepage.home-partner-form-mobile-phone-number') }}" @change="removeClassError('partnerCreation', 'mobile_phone_number')" v-model="partner.mobile_phone_number">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="mobile_phone_numberHelp" class="text-danger" v-if="partnerErrors.includes('mobile_phone_number')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="company_name" name="company_name" placeholder="{{ __('homepage.home-partner-form-company-name') }}" @change="removeClassError('partnerCreation', 'company_name')" v-model="partner.company_name">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="company_nameHelp" class="text-danger" v-if="partnerErrors.includes('company_name')">{{ __('homepage.home-partner-form-error') }}</small>
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
                                                <input type="text" id="tax_number" name="tax_number" placeholder="{{ __('homepage.home-partner-form-tax-number') }}" @change="removeClassError('partnerCreation', 'tax_number')" v-model="partner.tax_number">
                                            </div>
                                        </div>
                                        <div class="block-field-msg">
                                            <small id="tax_numberHelp" class="text-danger" v-if="partnerErrors.includes('tax_number')">{{ __('homepage.home-partner-form-error') }}</small>
                                        </div>
                                    </div>
                                    <div class="block-form-group">
                                        <div class="block-field block-field-big block-field-entity-partner-category">
                                            <div class="block-input">
                                                <select id="category_id" class="category_id" name="category_id" @change="removeClassError('partnerCreation', 'category_id')" v-model="partner.category_id">
                                                    <option value="" disabled selected>{{ __('Categoria') }}</option>
                                                    @foreach ($partnerCategories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="block-field-msg"></div>
                                    </div>
                                    <div class="block-form-group">
                                        <div class="block-submit">
                                            <button class="button button-primary" @click="getFormRequest('partnerCreation', $event)">{{ __('Enviar') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-home-team">
            <div class="main-fluid">
                <div class="limit-wrapper">
                    <div class="row-fluid">
                        <div class="column-left">
                            <div class="block-form-title"><h2>{{ __('homepage.home-find-title') }}</h2></div>
                            <div class="block-form-lead"><span>{{ __('homepage.home-find-subtitle') }}</span></div>
                            <form method="POST" id="deliverymanCreation" class="form-default-wrapper" enctype="multipart/form-data">
                                <div class="block-form-group">
                                    <div class="block-field block-field-entity-deliveryman-name" >
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
                                            <input type="text" id="name" placeholder="{{ __('homepage.') }}" @change="removeClassError('deliverymanCreation', 'name')" v-model="deliveryman.name">
                                        </div>
                                    </div> 
                                    <div class="block-field-msg">
                                        <small id="nameHelp" class="text-danger" v-if="deliverymanErrors.includes('name')">{{ __('homepage.home-partner-form-error') }}</small>
                                    </div>
                                </div>
                                <div class="block-form-group">
                                    <div class="block-field block-field-entity-deliveryman-email">
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
                                            <input  type="email"  id="email" placeholder="Email" @change="removeClassError('deliverymanCreation', 'email')" v-model="deliveryman.email">
                                        </div>
                                    </div>
                                    <div class="block-field-msg">
                                        <small id="nameHelp" class="text-danger" v-if="deliverymanErrors.includes('email')">{{ __('Campo obrigatório') }}</small>
                                    </div>
                                </div>
                                <div class="block-form-group">
                                    <div class="block-field block-field-entity-deliveryman-mobile-number">
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
                                            <input type="text" id="mobile_phone_number" placeholder="Telemóvel" @change="removeClassError('deliverymanCreation', 'mobile_phone_number')" v-model="deliveryman.mobile_phone_number">
                                        </div>
                                    </div>
                                    <div class="block-field-msg">
                                        <small id="nameHelp" class="text-danger" v-if="deliverymanErrors.includes('mobile_phone_number')">{{ __('Campo obrigatório') }}</small>
                                    </div>
                                </div>
                                <div class="block-form-group">
                                    <div class="block-submit">
                                        <button class="button button-primary" @click="getFormRequest('deliverymanCreation', $event)">{{ __('Enviar') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="column-right">
                            <div class="block-image"><img src="{{ asset('assets-frontoffice/images/world-team-igo.png') }}" alt="{{ __('iGO') }}" title="{{ __('iGO') }}"/></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Show success message --}}
        <div class="alert alert-success" role="alert"
            v-if="partnerCreated.company_name">
            <h4 class="alert-heading">Olá, @{{ partnerCreated.name }}!</h4>
            <p>O pré-cadasto da <b> @{{ partnerCreated.company_name }} </b> foi efetuado. Em breve entraremos em contacto através do e-mail e telemóvel informado. </p>
        </div>
        {{-- Show validation error --}}
        <div class="alert alert-danger" role="alert"
            v-if="partnrValidationError">
            <h4 class="alert-heading">Erro!</h4>
            <p>  @{{ partnrValidationErrorMessage }} </p>
        </div>

        {{-- Show success message --}}
        <div class="alert alert-success" role="alert"
            v-if="deliverymanCreated">
            <h4 class="alert-heading">Olá, @{{ deliverymanCreated }}!</h4>
            <p>O seu pré-cadasto foi efetuado. Em breve entraremos em contacto através do e-mail e telemóvel informado. </p>
        </div>
        {{-- Show validation error --}}
        <div class="alert alert-danger" role="alert"
            v-if="delManValidationError">
            <h4 class="alert-heading">Erro!</h4>
            <p>  @{{ delManValidationErrorMessage }} </p>
        </div>
    </div>
@endsection

@section('vue-instance')
    <script type="text/javascript">
        new Vue({
            el: '#page-front',
            data: {
                partner: {
                    name: '',
                    email: '',
                    address: '',
                    county: '',
                    city: '',
                    phone_number: '',
                    mobile_phone_number: '',
                    company_name: '',
                    tax_number: '',
                    category_id: '',
                },
                deliveryman: {
                    name: '',
                    email: '',
                    mobile_phone_number: '',
                }, 
                resource: '',
                form : '',
                formAction: '',
                partnerErrors: [],
                deliverymanErrors: [],
                deliverymanCreated: false,
                partnerCreated: {
                    name: null,
                    company_name: null,
                },
                delManValidationError: false,
                delManValidationErrorMessage: '',
                partnrValidationError: false,
                partnrValidationErrorMessage: '',
            },
            methods: {
                //  Handle the form request
                getFormRequest: function (form, event) {
                    event.preventDefault();
                    
                    if (form == 'deliverymanCreation') {
                        this.resource = this.deliveryman;
                        if(this.checkForm(form) ){
                            this.formAction = "{{ route('deliveryman.store.home') }}";
                        }
                    } else {
                        this.resource = this.partner;
                        if(this.checkForm(form) ){
                            this.formAction = "{{ route('partner.store.home') }}";
                        }
                    }

                    if ( this.formAction ) {
                        this.submitForm(event);
                    }
                },

                //  Check input values and show errors
                checkForm(form) {
                    this.deliverymanErrors = [];
                    this.partnerErrors = [];

                    Object.entries(this.resource).forEach(([key, value]) => {
                        if (!this.resource[key]) { 
                            jQuery(`#${form} #${key}`).parents('.block-field').addClass("is-invalid");
                            (form == 'deliverymanCreation') ? this.deliverymanErrors.push(key) : this.partnerErrors.push(key);
                        }
                    });

                    return (this.partnerErrors.length || this.deliverymanErrors.length) ? false : true;
                },

                //  Submit forms
                submitForm() {
                    axios.post(this.formAction, {
                        resource: this.resource,
                    })
                    .then(response => {
                        if (Object.keys(response.data.resource).length > 6) {
                            this.partnerCreated.name = (response.status == 201) ?  response.data.resource.name : null;
                            this.partnerCreated.company_name = (response.status == 201) ?  response.data.resource.company_name : null;
                        } else {
                            this.deliverymanCreated = (response.status == 201) ?  response.data.resource.name : null;
                        }
                        this.cleanInputs(this.resource);
                    })
                    .catch((error) => {
                        console.log(Object.keys(this.resource).length); 
                        if (Object.keys(this.resource).length > 3) {
                            this.partnrValidationError = true;
                            this.partnrValidationErrorMessage = "Não foi possível cadastar o aderente com os dados informados";
                        } else {
                            this.delManValidationError = true;
                            this.delManValidationErrorMessage = "Não foi possível cadastar o estafeta com os dados informados";
                        }
                    });
                },

                //  Clean form inputs after requests
                cleanInputs(resource){
                    this.formAction = '';
                    
                    Object.keys(resource).forEach(key => {
                        resource[key] = '';
                    });
                },

                //  Remove error class and messages
                removeClassError(form, inputId){
                    $(`#${form} #${inputId}`).removeClass('is-invalid');
                    if (form == 'deliverymanCreation') {
                        this.deliverymanErrors = this.deliverymanErrors.filter(item => item !== inputId);
                        this.delManValidationError = false;
                        this.delManValidationErrorMessage = '';
                        
                    } else {
                        this.partnerErrors = this.partnerErrors.filter(item => item !== inputId);
                        this.partnrValidationError = false;
                        this.partnrValidationErrorMessage = '';
                    }

                }
            }

        })
    </script>
@endsection