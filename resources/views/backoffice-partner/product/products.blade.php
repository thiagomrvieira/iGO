@extends('backoffice-partner.layouts.app')

@php
    $partner = Auth::user()->partner ?? null;
    
    $workTime = [
        '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', 
        '00:70', '08:00', '09:00', '10:00', '11:00', '12:00',  
        '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 
        '19:00', '20:00', '21:00', '22:00', '23:00', '00:00', 
    ];
    
    $workDays = [ 
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'holiday',
    ];
@endphp

@section('content')
    <div class="container">
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

                            {{-- {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => 'products.store', 
                                            'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                
                                {!! Form::hidden('partner_id', $partner->id ) !!}  --}}

                            <div class="accordion" id="accordionProducts">

                                {{-- Product Categories --}}
                                <div class="accordion-item products-cerification">
                                    <button class="accordion-button is-open" type="button">
                                        <h3><strong>Destaques</strong></h3>
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
                                    <div class="accordion-content">
                                        {{-- List of Featured Products --}}
                                        <div class="accordion-body">    
                                            @forelse ($products as $featuredProduct)
                                                @if (isset($featuredProduct->featured->created_at))
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <div class="card-body-left">
                                                                <div class="card-body-image" >
                                                                    @if ($featuredProduct->image)
                                                                        <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$featuredProduct->image)}}" 
                                                                            alt="Product Image" height="90px">
                                                                        <br>
                                                                    @endif
                                                                </div>
                                                                <div class="card-body-values"> 
                                                                    <h3>{{$featuredProduct->name}}</h3>
                                                                    <p>{{ Str::limit($featuredProduct->description, 60, '...') }}</p>
                                                                    <p>{{ number_format(($featuredProduct->price / 100), 2) }}AKZ</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="card-body-right">   
                                                                <div class="product-edit-remove-section">
                                                                    <div id="pen">
                                                                        <a href="{{ route('products.edit', ['product' => $featuredProduct] ) }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                                <g id="edit" transform="translate(-14083 330)">
                                                                                  <g id="edit-2" data-name="edit" transform="translate(14085 -328)" opacity="0.3">
                                                                                    <g id="Group_13730" data-name="Group 13730" transform="translate(0)">
                                                                                      <path id="Path_6490" data-name="Path 6490" d="M15.063.938a3.2,3.2,0,0,0-4.527,0L1.589,9.884a.625.625,0,0,0-.16.274L.023,15.207a.625.625,0,0,0,.773.769l5.049-1.434A.625.625,0,0,0,6.117,13.5L2.934,10.307,10.35,2.891l2.758,2.758L7.43,11.311a.625.625,0,0,0,.883.885l6.749-6.731a3.2,3.2,0,0,0,0-4.527ZM4.481,13.63l-2.955.839L2.354,11.5Zm9.7-9.049-.186.186L11.234,2.007l.186-.186a1.951,1.951,0,0,1,2.76,2.759Z" transform="translate(0)" fill="#072a40"/>
                                                                                    </g>
                                                                                  </g>
                                                                                  <rect id="Rectangle_8726" data-name="Rectangle 8726" width="20" height="20" transform="translate(14083 -330)" fill="none"/>
                                                                                </g>
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                    <div id="trash">
                                                                        <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $featuredProduct->id }}"  
                                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                                <g id="apagar" transform="translate(-14154 334)">
                                                                                  <g id="trash" transform="translate(14109 -332.5)" opacity="0.3">
                                                                                    <path id="Path_6491" data-name="Path 6491" d="M60.383,2.108h-2.9V1.581A1.583,1.583,0,0,0,55.9,0H53.8a1.583,1.583,0,0,0-1.581,1.581v.527h-2.9A1.319,1.319,0,0,0,48,3.425V5.269a.527.527,0,0,0,.527.527h.288l.455,9.56a1.579,1.579,0,0,0,1.579,1.506h8a1.579,1.579,0,0,0,1.579-1.506l.455-9.56h.288a.527.527,0,0,0,.527-.527V3.425A1.319,1.319,0,0,0,60.383,2.108Zm-7.114-.527a.528.528,0,0,1,.527-.527H55.9a.528.528,0,0,1,.527.527v.527H53.269ZM49.054,3.425a.264.264,0,0,1,.263-.263H60.383a.264.264,0,0,1,.263.263V4.742H49.054ZM59.377,15.306a.526.526,0,0,1-.526.5h-8a.526.526,0,0,1-.526-.5L49.87,5.8h9.96Z" fill="#072a40"/>
                                                                                    <path id="Path_6492" data-name="Path 6492" d="M240.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,240.527,215.9Z" transform="translate(-185.677 -201.15)" fill="#072a40"/>
                                                                                    <path id="Path_6493" data-name="Path 6493" d="M320.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,320.527,215.9Z" transform="translate(-263.042 -201.15)" fill="#072a40"/>
                                                                                    <path id="Path_6494" data-name="Path 6494" d="M160.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,160.527,215.9Z" transform="translate(-108.312 -201.15)" fill="#072a40"/>
                                                                                  </g>
                                                                                  <rect id="Rectangle_8725" data-name="Rectangle 8725" width="20" height="20" transform="translate(14154 -334)" fill="none"/>
                                                                                </g>
                                                                            </svg> 
                                                                        </a>
                                                                    </div>
                                                                </div> 
                                                                {{-- <div class="product-add-section">
                                                                    <div id="plus">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68" height="68" viewBox="0 0 68 68">
                                                                            <defs>
                                                                              <filter id="Ellipse_186" x="0" y="0" width="68" height="68" filterUnits="userSpaceOnUse">
                                                                                <feOffset dx="2" dy="2" input="SourceAlpha"/>
                                                                                <feGaussianBlur stdDeviation="4" result="blur"/>
                                                                                <feFlood flood-opacity="0.161"/>
                                                                                <feComposite operator="in" in2="blur"/>
                                                                                <feComposite in="SourceGraphic"/>
                                                                              </filter>
                                                                            </defs>
                                                                            <g id="ver_mais" transform="translate(-192 -769)">
                                                                              <g transform="matrix(1, 0, 0, 1, 192, 769)" filter="url(#Ellipse_186)">
                                                                                <circle id="Ellipse_186-2" data-name="Ellipse 186" cx="22" cy="22" r="22" transform="translate(10 10)" fill="#ffe414"/>
                                                                              </g>
                                                                              <g id="Group_10978" data-name="Group 10978" transform="translate(-39 15)">
                                                                                <path id="MAPA" d="M.067-5.426H-5.149V-8.812H.067v-5.17H3.6v5.17H8.836v3.386H3.6V.018H.067Z" transform="translate(261.149 792.982)" fill="#072a40"/>
                                                                                <rect id="Rectangle_8299" data-name="Rectangle 8299" width="14" height="14" transform="translate(256 779)" fill="none"/>
                                                                              </g>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </div> --}}
                                                            </div>    

                                                        </div>
                                                    </div>
                                                @endif
                                                @empty
                                                    Sem produtos destacados
                                                @endforelse
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                                {{-- Featured item--}}
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFeatured">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFeatured" aria-expanded="false" aria-controls="collapseFeatured">
                                            Destaques
                                        </button>
                                    </h2>
                                    <div id="collapseFeatured" class="accordion-collapse collapse" aria-labelledby="headingFeatured" data-bs-parent="#accordionProducts">
                                        <div class="accordion-body"> --}}
                                            {{-- List of Featured Products --}}
                                            {{-- @forelse ($products as $featuredProduct)
                                                @if (isset($featuredProduct->featured->created_at))
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div style="float: left;">
                                                                @if ($featuredProduct->image)
                                                                    <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$featuredProduct->image)}}" 
                                                                        alt="Product Image" height="90px">
                                                                    <br>
                                                                @endif
                                                                <strong>{{$featuredProduct->name}}</strong>
                                                                <p>{{ Str::limit($featuredProduct->description, 60, '...') }}</p>
                                                                <p>{{$featuredProduct->price}}€</p>
                                                            </div>
                                                            <div style="float: right;">
                                                                
                                                                <div id="pen">
                                                                    <a href="{{ route('products.edit', ['product' => $featuredProduct] ) }}">
                                                                        pen
                                                                    </a>
                                                                </div>

                                                                <div id="trash">
                                                                    <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $featuredProduct->id }}"  
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        trash
                                                                    </a>
                                                                </div>
                                                                <div id="plus">
                                                                    plus
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                Sem produtos destacados
                                            @endforelse
                                        
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- List Product Categories --}}
                                @foreach ($products->unique('category')->pluck('category') as $productCategory)
                                    {{-- Product Categories --}}
                                    <div class="accordion-item products-cerification">
                                        <button class="accordion-button" type="button">
                                            <h3><strong>{{$productCategory->name}}</strong></h3>
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
                                        <div class="accordion-content">
                                            <div id='{{"collapse".$productCategory->slug}}' class="accordion-collapse collapse" aria-labelledby='{{"heading".$productCategory->slug}}' data-bs-parent="#accordionProducts">
                                                <div class="accordion-body">
                                                    {{-- List Products --}}
                                                    @foreach ($products->where('category_id', $productCategory->id) as $product)
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <div class="card-body-left">
                                                                    <div class="card-body-image" >
                                                                        @if ($product->image)
                                                                            <img src="{{url('/storage/images/partner/'.$partner->id. '/products/' .$product->image)}}" alt="Product Image">
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body-values">   
                                                                        <h3>{{$product->name}}</h3>
                                                                        <p>{{ Str::limit($product->description, 60, '...') }}</p>
                                                                        <p>{{ number_format(($product->price / 100), 2) }}AKZ</p>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="card-body-right">
                                                                    <div class="product-edit-remove-section">
                                                                        <div id="pen">
                                                                            <a href="{{ route('products.edit', ['product' => $product] ) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                                    <g id="edit" transform="translate(-14083 330)">
                                                                                      <g id="edit-2" data-name="edit" transform="translate(14085 -328)" opacity="0.3">
                                                                                        <g id="Group_13730" data-name="Group 13730" transform="translate(0)">
                                                                                          <path id="Path_6490" data-name="Path 6490" d="M15.063.938a3.2,3.2,0,0,0-4.527,0L1.589,9.884a.625.625,0,0,0-.16.274L.023,15.207a.625.625,0,0,0,.773.769l5.049-1.434A.625.625,0,0,0,6.117,13.5L2.934,10.307,10.35,2.891l2.758,2.758L7.43,11.311a.625.625,0,0,0,.883.885l6.749-6.731a3.2,3.2,0,0,0,0-4.527ZM4.481,13.63l-2.955.839L2.354,11.5Zm9.7-9.049-.186.186L11.234,2.007l.186-.186a1.951,1.951,0,0,1,2.76,2.759Z" transform="translate(0)" fill="#072a40"/>
                                                                                        </g>
                                                                                      </g>
                                                                                      <rect id="Rectangle_8726" data-name="Rectangle 8726" width="20" height="20" transform="translate(14083 -330)" fill="none"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
        
                                                                        <div id="trash">
                                                                            <a class="ml-1 openDeleteDialog" href="#" data-product-id="{{ $product->id }}"  
                                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                                    <g id="apagar" transform="translate(-14154 334)">
                                                                                      <g id="trash" transform="translate(14109 -332.5)" opacity="0.3">
                                                                                        <path id="Path_6491" data-name="Path 6491" d="M60.383,2.108h-2.9V1.581A1.583,1.583,0,0,0,55.9,0H53.8a1.583,1.583,0,0,0-1.581,1.581v.527h-2.9A1.319,1.319,0,0,0,48,3.425V5.269a.527.527,0,0,0,.527.527h.288l.455,9.56a1.579,1.579,0,0,0,1.579,1.506h8a1.579,1.579,0,0,0,1.579-1.506l.455-9.56h.288a.527.527,0,0,0,.527-.527V3.425A1.319,1.319,0,0,0,60.383,2.108Zm-7.114-.527a.528.528,0,0,1,.527-.527H55.9a.528.528,0,0,1,.527.527v.527H53.269ZM49.054,3.425a.264.264,0,0,1,.263-.263H60.383a.264.264,0,0,1,.263.263V4.742H49.054ZM59.377,15.306a.526.526,0,0,1-.526.5h-8a.526.526,0,0,1-.526-.5L49.87,5.8h9.96Z" fill="#072a40"/>
                                                                                        <path id="Path_6492" data-name="Path 6492" d="M240.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,240.527,215.9Z" transform="translate(-185.677 -201.15)" fill="#072a40"/>
                                                                                        <path id="Path_6493" data-name="Path 6493" d="M320.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,320.527,215.9Z" transform="translate(-263.042 -201.15)" fill="#072a40"/>
                                                                                        <path id="Path_6494" data-name="Path 6494" d="M160.527,215.9a.527.527,0,0,0,.527-.527v-6.85a.527.527,0,0,0-1.054,0v6.85A.527.527,0,0,0,160.527,215.9Z" transform="translate(-108.312 -201.15)" fill="#072a40"/>
                                                                                      </g>
                                                                                      <rect id="Rectangle_8725" data-name="Rectangle 8725" width="20" height="20" transform="translate(14154 -334)" fill="none"/>
                                                                                    </g>
                                                                                </svg> 
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="product-add-section">
                                                                        <div id="plus">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68" height="68" viewBox="0 0 68 68">
                                                                                <defs>
                                                                                  <filter id="Ellipse_186" x="0" y="0" width="68" height="68" filterUnits="userSpaceOnUse">
                                                                                    <feOffset dx="2" dy="2" input="SourceAlpha"/>
                                                                                    <feGaussianBlur stdDeviation="4" result="blur"/>
                                                                                    <feFlood flood-opacity="0.161"/>
                                                                                    <feComposite operator="in" in2="blur"/>
                                                                                    <feComposite in="SourceGraphic"/>
                                                                                  </filter>
                                                                                </defs>
                                                                                <g id="ver_mais" transform="translate(-192 -769)">
                                                                                  <g transform="matrix(1, 0, 0, 1, 192, 769)" filter="url(#Ellipse_186)">
                                                                                    <circle id="Ellipse_186-2" data-name="Ellipse 186" cx="22" cy="22" r="22" transform="translate(10 10)" fill="#ffe414"/>
                                                                                  </g>
                                                                                  <g id="Group_10978" data-name="Group 10978" transform="translate(-39 15)">
                                                                                    <path id="MAPA" d="M.067-5.426H-5.149V-8.812H.067v-5.17H3.6v5.17H8.836v3.386H3.6V.018H.067Z" transform="translate(261.149 792.982)" fill="#072a40"/>
                                                                                    <rect id="Rectangle_8299" data-name="Rectangle 8299" width="14" height="14" transform="translate(256 779)" fill="none"/>
                                                                                  </g>
                                                                                </g>
                                                                            </svg>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                @endforeach
                                <div class="add-product-btn">
                                    <div class="button-next-container">
                                        <a class="button button-primary" href="{{ route('products.create') }}">
                                            Adicionar
                                        </a>
                                    </div>
                                </div>
                            </div>   
                            <div class="nav-menu-fixed">
                                @include('backoffice-partner.layouts.sidebar') 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    {{-- Modal de confirmação de remoção --}}
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Deseja remover este produto?</p>
                    
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formDelete', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.close'), ['type' => 'button', 'class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.remove'), ['type' => 'submit', 'class' => 'btn btn-danger'   , 'form' => 'formDelete']) !!}
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@section('jquery')
    <script type="text/javascript">
        // Seta action do modal de confirmação de remoção de produto
        jQuery(document).on("click", ".openDeleteDialog", function (event) {
            event.preventDefault();

            var productId = jQuery(this).data('product-id');
            var action   = `/partner/products/jQuery{productId}`;

            jQuery('#formDelete').attr('action', action );
        });
        
    </script>
@endsection