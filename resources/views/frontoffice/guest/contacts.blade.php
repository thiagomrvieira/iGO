@extends('frontoffice.layouts.app')
@section('content')
	<div id="page-front">
		<div class="block-home-top">
			<div class="main-fluid">
				<div class="limit-wrapper">
					<div class="block-contacts">
						<div class="block-contacts-title">
							<h2>{{ $contacts->title ?? null }}</h2>
						</div>
						<div class="block-contacts-list">
							{!! $contacts->content ?? null !!}
							{{-- 
							<div class="block-contacts-department">
								<h3>Sede:</h3>
								<ul>
									<li class="block-contacts-address">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-5539 -748)">
												<rect width="24" height="24" transform="translate(5539 748)" fill="none"/>
												<g transform="translate(5542.938 749.312)">
													<g transform="translate(0)">
														<path d="M68.905,0A7.914,7.914,0,0,0,61,7.905c0,2.814.856,3.942,4.97,9.365.714.941,1.523,2.008,2.449,3.243a.608.608,0,0,0,.973,0c.921-1.228,1.726-2.291,2.437-3.229,4.123-5.439,4.981-6.57,4.981-9.379A7.914,7.914,0,0,0,68.905,0ZM70.86,16.55c-.584.77-1.232,1.625-1.955,2.586-.728-.968-1.38-1.826-1.967-2.6-4-5.275-4.722-6.225-4.722-8.63a6.689,6.689,0,0,1,13.378,0C75.595,10.306,74.872,11.259,70.86,16.55Z" transform="translate(-61)" fill="#072a40"/>
													</g>
													<g transform="translate(3.649 3.649)">
														<path id="Path_5865" data-name="Path 5865" d="M155.257,90a4.257,4.257,0,1,0,4.257,4.257A4.262,4.262,0,0,0,155.257,90Zm0,7.3a3.041,3.041,0,1,1,3.041-3.041A3.044,3.044,0,0,1,155.257,97.3Z" transform="translate(-151 -90)" fill="#072a40"/>
													</g>
												</g>
											</g>
										</svg>
										<span>R. do Mónaco, 240 Bairro Talatona, Luanda</span>
									</li>
									<li class="block-contacts-phone">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-5600 -713.669)">
												<g transform="translate(5605.826 715.356)">
													<path d="M83.681.562v0A1.9,1.9,0,0,0,82.336,0H73.5a1.908,1.908,0,0,0-1.9,1.9V18.155a1.91,1.91,0,0,0,1.9,1.9h8.836a1.91,1.91,0,0,0,1.9-1.9V1.9A1.9,1.9,0,0,0,83.681.562ZM77.92,18.768h0a.514.514,0,1,1,.514-.514A.514.514,0,0,1,77.92,18.768Zm4.81-3.226a1.243,1.243,0,0,1-1.243,1.243H74.352a1.243,1.243,0,0,1-1.243-1.243V3.43a1.243,1.243,0,0,1,1.243-1.243h7.137A1.243,1.243,0,0,1,82.732,3.43Z" transform="translate(-71.6)" fill="#072a40"/>
												</g>
												<rect width="24" height="24" transform="translate(5600 713.669)" fill="none"/>
											</g>
										</svg>
										<a href="tel:+244111222789"><span>+244 111 222 789</span></a>
									</li>
									<li class="block-contacts-email">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-371 -372)">
												<g transform="translate(373.5 377.2)">
													<g transform="translate(0 0)">
														<path d="M17.286,61H1.666A1.621,1.621,0,0,0,0,62.567V73.011a1.621,1.621,0,0,0,1.666,1.567h15.62a1.621,1.621,0,0,0,1.666-1.567V62.567A1.621,1.621,0,0,0,17.286,61Zm-.23,1.044-7.545,7.1-7.61-7.1ZM1.11,72.795V62.778l5.348,4.987Zm.785.739L7.247,68.5l1.875,1.748a.58.58,0,0,0,.783,0l1.828-1.72,5.322,5.006Zm15.945-.739-5.322-5.006,5.322-5.006Z" transform="translate(0 -61)" fill="#072a40"/>
													</g>
												</g>
												<rect width="24" height="24" transform="translate(371 372)" fill="none"/>
											</g>
										</svg>
										<a href="mailto:geral@igo.com.ao"><span>geral@igo.com.ao</span></a>
									</li>
								</ul>
							</div>
							<div class="block-contacts-department">
								<h3>Departamento comercial:</h3>
								<ul>
									<li class="block-contacts-phone">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-5600 -713.669)">
												<g transform="translate(5605.826 715.356)">
													<path d="M83.681.562v0A1.9,1.9,0,0,0,82.336,0H73.5a1.908,1.908,0,0,0-1.9,1.9V18.155a1.91,1.91,0,0,0,1.9,1.9h8.836a1.91,1.91,0,0,0,1.9-1.9V1.9A1.9,1.9,0,0,0,83.681.562ZM77.92,18.768h0a.514.514,0,1,1,.514-.514A.514.514,0,0,1,77.92,18.768Zm4.81-3.226a1.243,1.243,0,0,1-1.243,1.243H74.352a1.243,1.243,0,0,1-1.243-1.243V3.43a1.243,1.243,0,0,1,1.243-1.243h7.137A1.243,1.243,0,0,1,82.732,3.43Z" transform="translate(-71.6)" fill="#072a40"/>
												</g>
												<rect width="24" height="24" transform="translate(5600 713.669)" fill="none"/>
											</g>
										</svg>
										<a href="tel:+244111222789"><span>+244 111 222 789</span></a>
									</li>
									<li class="block-contacts-email">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-371 -372)">
												<g transform="translate(373.5 377.2)">
													<g transform="translate(0 0)">
														<path d="M17.286,61H1.666A1.621,1.621,0,0,0,0,62.567V73.011a1.621,1.621,0,0,0,1.666,1.567h15.62a1.621,1.621,0,0,0,1.666-1.567V62.567A1.621,1.621,0,0,0,17.286,61Zm-.23,1.044-7.545,7.1-7.61-7.1ZM1.11,72.795V62.778l5.348,4.987Zm.785.739L7.247,68.5l1.875,1.748a.58.58,0,0,0,.783,0l1.828-1.72,5.322,5.006Zm15.945-.739-5.322-5.006,5.322-5.006Z" transform="translate(0 -61)" fill="#072a40"/>
													</g>
												</g>
												<rect width="24" height="24" transform="translate(371 372)" fill="none"/>
											</g>
										</svg>
										<a href="mailto:comercial@igo.com.ao"><span>comercial@igo.com.ao</span></a>
									</li>
								</ul>
							</div>
							<div class="block-contacts-department">
								<h3>Apoio ao cliente:</h3>
								<ul>
									<li class="block-contacts-phone">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-5600 -713.669)">
												<g transform="translate(5605.826 715.356)">
													<path d="M83.681.562v0A1.9,1.9,0,0,0,82.336,0H73.5a1.908,1.908,0,0,0-1.9,1.9V18.155a1.91,1.91,0,0,0,1.9,1.9h8.836a1.91,1.91,0,0,0,1.9-1.9V1.9A1.9,1.9,0,0,0,83.681.562ZM77.92,18.768h0a.514.514,0,1,1,.514-.514A.514.514,0,0,1,77.92,18.768Zm4.81-3.226a1.243,1.243,0,0,1-1.243,1.243H74.352a1.243,1.243,0,0,1-1.243-1.243V3.43a1.243,1.243,0,0,1,1.243-1.243h7.137A1.243,1.243,0,0,1,82.732,3.43Z" transform="translate(-71.6)" fill="#072a40"/>
												</g>
												<rect width="24" height="24" transform="translate(5600 713.669)" fill="none"/>
											</g>
										</svg>
										<a href="tel:+244111222789"><span>+244 111 222 789</span></a>
									</li>
									<li class="block-contacts-email">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<g transform="translate(-371 -372)">
												<g transform="translate(373.5 377.2)">
													<g transform="translate(0 0)">
														<path d="M17.286,61H1.666A1.621,1.621,0,0,0,0,62.567V73.011a1.621,1.621,0,0,0,1.666,1.567h15.62a1.621,1.621,0,0,0,1.666-1.567V62.567A1.621,1.621,0,0,0,17.286,61Zm-.23,1.044-7.545,7.1-7.61-7.1ZM1.11,72.795V62.778l5.348,4.987Zm.785.739L7.247,68.5l1.875,1.748a.58.58,0,0,0,.783,0l1.828-1.72,5.322,5.006Zm15.945-.739-5.322-5.006,5.322-5.006Z" transform="translate(0 -61)" fill="#072a40"/>
													</g>
												</g>
												<rect width="24" height="24" transform="translate(371 372)" fill="none"/>
											</g>
										</svg>
										<a href="mailto:cliente@igo.com.ao"><span>cliente@igo.com.ao</span></a>
									</li>
								</ul>
							</div>
							--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
