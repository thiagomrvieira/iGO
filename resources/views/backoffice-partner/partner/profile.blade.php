@extends('backoffice-partner.layouts.app')

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
                            {{-- 
                                TODO: Validate Address ID to update the profile
                                      Check is the user profile has photo                                
                            --}}
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
                                <div class="accordion-content top-image">

                                        @if (isset($partner->images->image_cover))
                                            <div class="profile-image-cover" id="profile-image-cover" style="background-image:url('/storage/images/partner/{{$partner->id}}/{{$partner->images->image_cover}}')">
                                        @else
                                            <div class="profile-image-cover" id="profile-image-cover">
                                        @endif
                                        {!! Form::file ('image_cover', ['class' => 'form-check-input', 'id' => 'id-profile-image-cover']) !!}
                                        <div class="form-fild-text">
                                            <span>
                                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g filter="url(#filter0_d_307_2)">
                                                        <path d="M28 46C37.9411 46 46 37.9411 46 28C46 18.0589 37.9411 10 28 10C18.0589 10 10 18.0589 10 28C10 37.9411 18.0589 46 28 46Z" fill="#FFE414"/>
                                                    </g>
                                                    <path d="M28.0201 24.352C27.205 24.352 26.4082 24.5937 25.7306 25.0465C25.0529 25.4993 24.5247 26.1429 24.2127 26.896C23.9008 27.649 23.8192 28.4776 23.9782 29.277C24.1372 30.0764 24.5297 30.8106 25.1061 31.387C25.6824 31.9633 26.4167 32.3558 27.2161 32.5148C28.0155 32.6738 28.8441 32.5922 29.5971 32.2803C30.3501 31.9684 30.9937 31.4402 31.4465 30.7625C31.8994 30.0848 32.1411 29.288 32.1411 28.473C32.1397 27.3804 31.7051 26.333 30.9326 25.5605C30.16 24.7879 29.1126 24.3533 28.0201 24.352V24.352ZM28.0201 31.276C27.4663 31.276 26.9249 31.1118 26.4645 30.8041C26.004 30.4964 25.6451 30.0591 25.4332 29.5475C25.2213 29.0359 25.1658 28.4729 25.2739 27.9297C25.3819 27.3866 25.6486 26.8877 26.0402 26.4961C26.4317 26.1045 26.9307 25.8378 27.4738 25.7298C28.017 25.6218 28.5799 25.6772 29.0916 25.8891C29.6032 26.1011 30.0405 26.4599 30.3482 26.9204C30.6558 27.3809 30.8201 27.9222 30.8201 28.476C30.8185 29.2181 30.523 29.9294 29.9982 30.4541C29.4734 30.9789 28.7622 31.2744 28.0201 31.276V31.276Z" fill="#072A40"/>
                                                    <path d="M34.4801 22.374H32.0571C32.0195 22.3746 31.9824 22.3647 31.9502 22.3452C31.9181 22.3257 31.892 22.2976 31.8751 22.264L31.2041 20.854L31.1981 20.842C31.0722 20.5884 30.8778 20.3751 30.6369 20.2263C30.396 20.0774 30.1182 19.9991 29.8351 20H26.2521C25.9689 19.9991 25.6912 20.0774 25.4503 20.2263C25.2094 20.3751 25.015 20.5884 24.8891 20.842L24.8831 20.854L24.2121 22.264C24.1952 22.2976 24.1691 22.3257 24.1369 22.3452C24.1047 22.3647 24.0677 22.3746 24.0301 22.374H21.5581C21.0336 22.3745 20.5308 22.5831 20.16 22.9539C19.7892 23.3248 19.5806 23.8276 19.5801 24.352V33.252C19.5806 33.7764 19.7892 34.2793 20.16 34.6501C20.5308 35.0209 21.0336 35.2295 21.5581 35.23H34.4801C35.0045 35.2295 35.5073 35.0209 35.8782 34.6501C36.249 34.2793 36.4575 33.7764 36.4581 33.252V24.352C36.4575 23.8276 36.249 23.3248 35.8782 22.9539C35.5073 22.5831 35.0045 22.3745 34.4801 22.374V22.374ZM35.1391 33.254C35.1388 33.4287 35.0693 33.5962 34.9458 33.7197C34.8222 33.8432 34.6548 33.9127 34.4801 33.913H21.5581C21.3834 33.9127 21.2159 33.8432 21.0924 33.7197C20.9689 33.5962 20.8993 33.4287 20.8991 33.254V24.354C20.8993 24.1793 20.9689 24.0118 21.0924 23.8883C21.2159 23.7648 21.3834 23.6953 21.5581 23.695H24.0311C24.3142 23.696 24.592 23.6176 24.8329 23.4688C25.0738 23.3199 25.2682 23.1066 25.3941 22.853L25.4001 22.841L26.0711 21.431C26.088 21.3974 26.1141 21.3693 26.1462 21.3498C26.1784 21.3304 26.2155 21.3204 26.2531 21.321H29.8361C29.8737 21.3204 29.9107 21.3304 29.9429 21.3498C29.9751 21.3693 30.0012 21.3974 30.0181 21.431L30.6891 22.841L30.6951 22.853C30.821 23.1066 31.0154 23.3199 31.2563 23.4688C31.4972 23.6176 31.7749 23.696 32.0581 23.695H34.4801C34.6548 23.6953 34.8222 23.7648 34.9458 23.8883C35.0693 24.0118 35.1388 24.1793 35.1391 24.354V33.254Z" fill="#072A40"/>
                                                    <path d="M33.9441 24.788H32.2661V26.466H33.9441V24.788Z" fill="#072A40"/>
                                                    <defs>
                                                        <filter id="filter0_d_307_2" x="4" y="4" width="52" height="52" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                            <feOffset dx="2" dy="2"/>
                                                            <feGaussianBlur stdDeviation="4"/>
                                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.161 0"/>
                                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_307_2"/>
                                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_307_2" result="shape"/>
                                                        </filter>
                                                    </defs>
                                                </svg>
                                            </span>
                                        </div> 
                                    </div>
                                    <h3>Inserir foto*</h3>
                                    <p>Formato jpeg/png</p>  
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
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.711 18.5H5.18704C4.75974 18.4921 4.35295 18.3154 4.05557 18.0085C3.75819 17.7015 3.59441 17.2893 3.60004 16.862V9.20301C3.59361 8.77517 3.75703 8.36222 4.0545 8.05463C4.35196 7.74704 4.75921 7.5699 5.18704 7.56201H14.711C15.1392 7.56938 15.547 7.74629 15.8449 8.05393C16.1428 8.36158 16.3065 8.77482 16.3 9.20301V16.862C16.3057 17.2897 16.1416 17.7022 15.8438 18.0092C15.546 18.3161 15.1387 18.4926 14.711 18.5V18.5ZM5.18704 8.65601C5.04443 8.65864 4.90868 8.71769 4.80952 8.82022C4.71037 8.92275 4.65589 9.0604 4.65804 9.20301V16.862C4.65589 17.0046 4.71037 17.1423 4.80952 17.2448C4.90868 17.3473 5.04443 17.4064 5.18704 17.409H14.711C14.8536 17.4064 14.9894 17.3473 15.0885 17.2448C15.1877 17.1423 15.2422 17.0046 15.24 16.862V9.20301C15.2422 9.0604 15.1877 8.92275 15.0885 8.82022C14.9894 8.71769 14.8536 8.65864 14.711 8.65601H5.18704Z" fill="#072A40"/>
                                                        <path d="M13.587 8.656C13.4456 8.65233 13.3114 8.59266 13.2139 8.4901C13.1164 8.38754 13.0636 8.25047 13.067 8.109V5.375C13.0867 4.52649 12.7692 3.70478 12.1843 3.08983C11.5993 2.47487 10.7945 2.11679 9.94605 2.094C9.09797 2.11731 8.29365 2.47562 7.70912 3.09052C7.12458 3.70541 6.80742 4.52683 6.82705 5.375V8.109C6.83145 8.18 6.82127 8.25115 6.79713 8.31806C6.77299 8.38498 6.73541 8.44624 6.68669 8.49808C6.63797 8.54991 6.57915 8.59122 6.51386 8.61946C6.44857 8.6477 6.37818 8.66226 6.30705 8.66226C6.23591 8.66226 6.16553 8.6477 6.10024 8.61946C6.03495 8.59122 5.97613 8.54991 5.92741 8.49808C5.87869 8.44624 5.8411 8.38498 5.81696 8.31806C5.79282 8.25115 5.78264 8.18 5.78705 8.109V5.375C5.76071 4.24346 6.18398 3.14761 6.9641 2.32756C7.74423 1.50751 8.8176 1.03013 9.94905 1C11.0805 1.03013 12.1539 1.50751 12.934 2.32756C13.7141 3.14761 14.1374 4.24346 14.111 5.375V8.109C14.1128 8.17938 14.1006 8.2494 14.0751 8.31505C14.0497 8.38069 14.0115 8.44065 13.9628 8.49149C13.9141 8.54233 13.8559 8.58303 13.7914 8.61127C13.7269 8.6395 13.6574 8.6547 13.587 8.656Z" fill="#072A40"/>
                                                        <path d="M9.94909 13.396C9.66072 13.396 9.37884 13.3105 9.13907 13.1503C8.8993 12.9901 8.71243 12.7623 8.60207 12.4959C8.49172 12.2295 8.46285 11.9364 8.5191 11.6535C8.57536 11.3707 8.71422 11.1109 8.91813 10.907C9.12203 10.7031 9.38182 10.5643 9.66465 10.508C9.94747 10.4517 10.2406 10.4806 10.507 10.591C10.7735 10.7013 11.0012 10.8882 11.1614 11.128C11.3216 11.3677 11.4071 11.6496 11.4071 11.938C11.4066 12.3245 11.2528 12.695 10.9795 12.9684C10.7062 13.2417 10.3356 13.3955 9.94909 13.396V13.396ZM9.94909 11.573C9.8769 11.573 9.80633 11.5944 9.74631 11.6345C9.68628 11.6746 9.6395 11.7316 9.61187 11.7983C9.58425 11.865 9.57702 11.9384 9.5911 12.0092C9.60519 12.08 9.63995 12.145 9.691 12.1961C9.74204 12.2471 9.80708 12.2819 9.87788 12.296C9.94868 12.3101 10.0221 12.3028 10.0888 12.2752C10.1555 12.2476 10.2125 12.2008 10.2526 12.1408C10.2927 12.0807 10.3141 12.0102 10.3141 11.938C10.3141 11.8412 10.2756 11.7483 10.2072 11.6799C10.1387 11.6114 10.0459 11.573 9.94909 11.573V11.573Z" fill="#072A40"/>
                                                        <path d="M9.95203 15.583C9.80696 15.583 9.66782 15.5254 9.56524 15.4228C9.46266 15.3202 9.40503 15.1811 9.40503 15.036V13.034C9.40503 12.8889 9.46266 12.7498 9.56524 12.6472C9.66782 12.5446 9.80696 12.487 9.95203 12.487C10.0971 12.487 10.2362 12.5446 10.3388 12.6472C10.4414 12.7498 10.499 12.8889 10.499 13.034V15.034C10.4993 15.106 10.4853 15.1773 10.458 15.2439C10.4306 15.3105 10.3903 15.3711 10.3395 15.4221C10.2887 15.4731 10.2283 15.5136 10.1618 15.5412C10.0953 15.5688 10.024 15.583 9.95203 15.583V15.583Z" fill="#072A40"/>
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
                                                <div class="block-input ">
                                                    <div class="block-field block-field-entity-partner-county">
                                                        {!! Form::select('county_id', $counties , $partner->address->county->id, [ 'class' => 'counties_select form-control']) !!}
                                                    </div>
                                                   
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
@section('jquery')
    <script type="text/javascript">
         // Image field load 
         jQuery(document).ready(function() {
            if (jQuery('#id-profile-image-cover').length > 0) {
                document.getElementById('id-profile-image-cover').addEventListener("change", function() {
                    let currentFile  = this.files[0];
                    console.log(currentFile);
                    const reader = new FileReader();
                    reader.readAsDataURL(currentFile);
                    reader.addEventListener('load', () => {
                        currentFile = reader.result;
                        document.getElementById('profile-image-cover').style.backgroundImage = `url(${currentFile})`;
                    });
                });
            } 
        });
        
    </script>
@endsection
