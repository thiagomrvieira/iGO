@extends('frontoffice.layouts.app')

@section('content')

    <div id="page-front">
        <div class="block-home-top">
            <div class="block-contact">
                <div class="main-fluid">
                    <div class="limit-wrapper">
                        <div class="contact-block-title">
                            <h2>{{ __('Contactos') }}</h2>
                        </div>
                        <div class="contacts">
                            <div class="department">
                                <h3>Sede:</h3>
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-16567 -885.837)">
                                                <g transform="translate(16568.652 887.653)">
                                                    <path
                                                        d="M19.364,6.983,17.081,4.969v-3.2a.49.49,0,0,0-.49-.49h-1.96a.49.49,0,0,0-.49.49v.61L11.589.123a.49.49,0,0,0-.648,0L3.165,6.983a.49.49,0,0,0,.648.735l1.049-.925v8.954H4.4a.49.49,0,1,0,0,.98H18.125a.49.49,0,1,0,0-.98h-.458V6.793l1.049.925a.49.49,0,1,0,.648-.735ZM15.121,2.254h.98V4.1l-.98-.865Zm1.566,13.492H5.842V5.928l5.422-4.784,5.429,4.79C16.69,5.959,16.687,15.747,16.687,15.747Z"
                                                        transform="translate(-2.999 0)" fill="#072a40" />
                                                    <path
                                                        d="M141.161,214a2.288,2.288,0,0,0-1.63.674A2.305,2.305,0,0,0,135.6,216.3a5.057,5.057,0,0,0,1.544,3.013,4.527,4.527,0,0,0,2.39,1.556,4.448,4.448,0,0,0,2.385-1.482,4.933,4.933,0,0,0,1.548-3.088A2.305,2.305,0,0,0,141.161,214Zm.056,4.7a4.07,4.07,0,0,1-1.685,1.189,4.348,4.348,0,0,1-1.695-1.267,4.02,4.02,0,0,1-1.26-2.323,1.323,1.323,0,0,1,2.513-.579.49.49,0,0,0,.881,0,1.323,1.323,0,0,1,2.513.579A3.865,3.865,0,0,1,141.217,218.7Z"
                                                        transform="translate(-131.265 -207.009)" fill="#072a40" />
                                                </g>
                                                <rect width="20" height="20" transform="translate(16567 885.837)"
                                                    fill="none" />
                                            </g>
                                        </svg>
                                        <p> R. do Mónaco, 240 Bairro Talatona, Luanda </p>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-18205 -891)">
                                                <g transform="translate(18206.199 892.2)">
                                                    <path
                                                        d="M12.6,17.527a4.883,4.883,0,0,1-1.675-.3,17.864,17.864,0,0,1-6.487-4.135A17.863,17.863,0,0,1,.3,6.606,4.848,4.848,0,0,1,.052,4.223,4.971,4.971,0,0,1,2.607.584,4.88,4.88,0,0,1,4.944,0,.548.548,0,0,1,5.48.433l.86,4.012a.548.548,0,0,1-.148.5L4.722,6.416a14.417,14.417,0,0,0,6.389,6.389l1.469-1.469a.548.548,0,0,1,.5-.148l4.012.86a.548.548,0,0,1,.433.536,4.88,4.88,0,0,1-.584,2.337A4.971,4.971,0,0,1,13.3,17.475a4.872,4.872,0,0,1-.707.052ZM4.507,1.119A3.838,3.838,0,0,0,1.329,6.232,16.612,16.612,0,0,0,11.3,16.2a3.838,3.838,0,0,0,5.112-3.177l-3.264-.7L11.61,13.856a.548.548,0,0,1-.62.108A15.508,15.508,0,0,1,3.563,6.537a.548.548,0,0,1,.108-.62L5.206,4.383Z"
                                                        transform="translate(0 0)" fill="#072a40" />
                                                </g>
                                                <rect width="20" height="20" transform="translate(18205 891)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> +244 111 222 789 </p>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-89 -255)">
                                                <g transform="translate(90.583 258.623)">
                                                    <g transform="translate(0 0)">
                                                        <path
                                                            d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z"
                                                            transform="translate(0 -61)" fill="#072a40" />
                                                    </g>
                                                </g>
                                                <rect width="20" height="20" transform="translate(89 255)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> geral@igo.com.ao </p>
                                    </li>
                                </ul>
                            </div>

                            <div class="department">
                                <h3>Departamento comercial:</h3>
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-18205 -891)">
                                                <g transform="translate(18206.199 892.2)">
                                                    <path
                                                        d="M12.6,17.527a4.883,4.883,0,0,1-1.675-.3,17.864,17.864,0,0,1-6.487-4.135A17.863,17.863,0,0,1,.3,6.606,4.848,4.848,0,0,1,.052,4.223,4.971,4.971,0,0,1,2.607.584,4.88,4.88,0,0,1,4.944,0,.548.548,0,0,1,5.48.433l.86,4.012a.548.548,0,0,1-.148.5L4.722,6.416a14.417,14.417,0,0,0,6.389,6.389l1.469-1.469a.548.548,0,0,1,.5-.148l4.012.86a.548.548,0,0,1,.433.536,4.88,4.88,0,0,1-.584,2.337A4.971,4.971,0,0,1,13.3,17.475a4.872,4.872,0,0,1-.707.052ZM4.507,1.119A3.838,3.838,0,0,0,1.329,6.232,16.612,16.612,0,0,0,11.3,16.2a3.838,3.838,0,0,0,5.112-3.177l-3.264-.7L11.61,13.856a.548.548,0,0,1-.62.108A15.508,15.508,0,0,1,3.563,6.537a.548.548,0,0,1,.108-.62L5.206,4.383Z"
                                                        transform="translate(0 0)" fill="#072a40" />
                                                </g>
                                                <rect width="20" height="20" transform="translate(18205 891)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> +244 111 222 789 </p>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-89 -255)">
                                                <g transform="translate(90.583 258.623)">
                                                    <g transform="translate(0 0)">
                                                        <path
                                                            d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z"
                                                            transform="translate(0 -61)" fill="#072a40" />
                                                    </g>
                                                </g>
                                                <rect width="20" height="20" transform="translate(89 255)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> geral@igo.com.ao </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="department">
                                <h3>Apoio ao cliente:</h3>
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-18205 -891)">
                                                <g transform="translate(18206.199 892.2)">
                                                    <path
                                                        d="M12.6,17.527a4.883,4.883,0,0,1-1.675-.3,17.864,17.864,0,0,1-6.487-4.135A17.863,17.863,0,0,1,.3,6.606,4.848,4.848,0,0,1,.052,4.223,4.971,4.971,0,0,1,2.607.584,4.88,4.88,0,0,1,4.944,0,.548.548,0,0,1,5.48.433l.86,4.012a.548.548,0,0,1-.148.5L4.722,6.416a14.417,14.417,0,0,0,6.389,6.389l1.469-1.469a.548.548,0,0,1,.5-.148l4.012.86a.548.548,0,0,1,.433.536,4.88,4.88,0,0,1-.584,2.337A4.971,4.971,0,0,1,13.3,17.475a4.872,4.872,0,0,1-.707.052ZM4.507,1.119A3.838,3.838,0,0,0,1.329,6.232,16.612,16.612,0,0,0,11.3,16.2a3.838,3.838,0,0,0,5.112-3.177l-3.264-.7L11.61,13.856a.548.548,0,0,1-.62.108A15.508,15.508,0,0,1,3.563,6.537a.548.548,0,0,1,.108-.62L5.206,4.383Z"
                                                        transform="translate(0 0)" fill="#072a40" />
                                                </g>
                                                <rect width="20" height="20" transform="translate(18205 891)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> +244 111 222 789 </p>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g transform="translate(-89 -255)">
                                                <g transform="translate(90.583 258.623)">
                                                    <g transform="translate(0 0)">
                                                        <path
                                                            d="M15.354,61H1.479A1.44,1.44,0,0,0,0,62.392v9.277a1.44,1.44,0,0,0,1.479,1.392H15.354a1.44,1.44,0,0,0,1.479-1.392V62.392A1.44,1.44,0,0,0,15.354,61Zm-.2.928-6.7,6.3-6.759-6.3ZM.986,71.477v-8.9l4.75,4.43Zm.7.656,4.753-4.471L8.1,69.215a.515.515,0,0,0,.7,0l1.624-1.527,4.727,4.447Zm14.163-.656L11.12,67.03l4.727-4.447Z"
                                                            transform="translate(0 -61)" fill="#072a40" />
                                                    </g>
                                                </g>
                                                <rect width="20" height="20" transform="translate(89 255)" fill="none" />
                                            </g>
                                        </svg>
                                        <p> geral@igo.com.ao </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- @isset($contacts)
        <strong>
            {{ $contacts->title ?? null }}
        </strong>
        <br><br>
        {!! $contacts->content ?? null !!}
    @endisset --}}

@endsection
