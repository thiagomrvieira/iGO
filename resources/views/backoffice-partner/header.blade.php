<header>
    <div class="main-fluid">
        <div class="limit-wrapper">
            <div class="row-fluid">
                <div class="column-left">
                    <div class="block-logo">
                        <a href="{{ route('home') }}" title="{{ __('iGO') }}">
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
                        </a>
                    </div>
                </div>
                
                <div class="column-right">
					<small>{{ $partner->company_name ?? null}} </small>
					<img class="profile-user-img img-fluid img-circle" src="{{ asset('assets-backoffice/dist/img/store.png')}}" alt="User profile picture" width="45px">
                </div>
            </div>
        </div>
    </div>
</header>