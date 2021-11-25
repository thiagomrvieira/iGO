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

                            {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => (isset($product) ? array('products.update', ['product' => $product]) : 'products.store'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @csrf

                            {{ isset($product) ? method_field('PATCH') : null}}
                            {!! Form::hidden('partner_id', $partner->id ) !!} 

                            <div class="accordionProductData" id="accordionProductData">
                                
                                {{-- Product name item--}}
                                <div class="accordion-item name-product">
                                    <button class="accordion-button is-open" type="button">
                                        <h3><strong>Nome do produto*</strong></h3>
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

                                        <div class="profile-image-cover product-cover">
                                            {!! Form::file ('image', null, false, ['class' => 'form-check-input']) !!}
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

                                        <div class="form-group">
                                            {!! Form::text('name', (isset($product) && $product->name) ? $product->name : null, 
                                                        ['class' => 'form-control', 'placeholder' => 'Nome do produto*']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::textarea('description', (isset($product) && $product->description) ? $product->description : null, 
                                                            ['class' => 'form-control', 'placeholder' => 'Descrição do produto*']) !!}
                                        </div>
                                        <div class="form-group product-price">
                                            {!! Form::number('price', (isset($product) && $product->price) ? number_format($product->price,2) : null, 
                                                            ['class' => 'form-control', 'placeholder' => 'Custo*', 'min' => 1, 'step' => 'any']) !!}
                                        </div>
                                        <div class="menu-label-radio">
                                            {!! Form::label('available', 'Produto disponível?', ['class' => 'form-check-label']) !!}
                                            <div class="product-checks">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    {!! Form::radio('available', 1, ( isset($product) && $product->available == 0 ? false : true) ?? true,      
                                                                    ['class' => 'form-check-input']) !!}
                                                    {!! Form::label('available', 'Sim', ['class' => 'form-check-label']) !!}
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    {!! Form::radio('available', 0, ( isset($product) && $product->available == 0 ? true : false) ?? false,  
                                                                    ['class' => 'form-check-input']) !!}
                                                    {!! Form::label('available', 'Não', ['class' => 'form-check-label']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                {{-- Product Categories --}}
                                <div class="accordion-item product-categories">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>{{ $partner->mainCategory->slug == 'restaurantes' ? 'Ementa(categorias)*' : 'Categoria' }}</strong></h3>
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
                                        {{-- List product categories --}}
                                        @if (isset($productCategories))
                                            <div class="col-checkbox">
                                                <div class="form-check">
                                                    @foreach ($productCategories as $prodCategory)
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            {!! Form::radio('category_id', $prodCategory->id, ( isset($product) && $product->category_id == $prodCategory->id ? true : false) ?? false, ['class' => 'form-check-input', 'id' => $prodCategory->slug]) !!}
                                                            {!! Form::label('category_id', $prodCategory->name,      ['class' => 'form-check-label']) !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        {{-- Featured Product --}}
                                        <div class="menu-label-radio">
                                            {!! Form::label('featured', 'Deseja colocar o produto na secção de destaques?', ['class' => 'form-check-label menu-label']) !!}
                                            <div class="product-checks">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    {!! Form::radio('featured', 1, ( isset($product) && $product->featured ? true : false) ?? false, ['class' => 'form-check-input']) !!}
                                                    {!! Form::label('featured', 'Sim', ['class' => 'form-check-label']) !!}
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    {!! Form::radio('featured', 0, ( isset($product) && $product->featured ? false : true) ?? true, ['class' => 'form-check-input']) !!}
                                                    {!! Form::label('featured', 'Não', ['class' => 'form-check-label']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                @if ($partner->mainCategory->slug == 'restaurantes')
                                    {{--  Side Product item --}}
                                    <div class="accordion-item side-product">
                                        <button class="accordion-button" type="button">
                                            <h3><strong>Acompanhamentos*</strong></h3>
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
                                            @forelse ($sides as $side)
                                                @php
                                                    $checked = false;
                                                    if (isset($product)) {
                                                        $checked = in_array($side->id, $product->sides->pluck('id')->toArray()) ? true : false;
                                                    }
                                                @endphp

                                                <div class="custom-control custom-control-inline">
                                                    {!! Form::checkbox($side->slug, null, $checked,     ['class' => 'form-check-input', 'id' => 'side' . $side->slug]) !!}
                                                    {!! Form::label($side->slug, ucfirst($side->name),  ['class' => 'form-check-label']) !!}
                                                </div>
                                            @empty
                                                Sem side
                                            @endforelse
                                        </div>
                                    </div> 
                                    {{--  Sauce item --}}
                                    <div class="accordion-item sauce-product">
                                        <button class="accordion-button" type="button">
                                            <h3><strong>Molhos*</strong></h3>
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
                                            @forelse ($sauces as $sauce)
                                                {{-- Set 'checked' for checkboxes --}}
                                                @php
                                                    $checked = false;
                                                    if (isset($product)) {
                                                        $checked = in_array($sauce->id, $product->sauces->pluck('id')->toArray()) ? true : false;
                                                    }
                                                @endphp
                                                
                                                @unless ($sauce->slug == 'picante')
                                                    <div class="custom-control custom-control-inline">
                                                        {!! Form::checkbox($sauce->slug, null, $checked,     ['class' => 'form-check-input', 'id' => 'sauce' . $sauce->slug]) !!}
                                                        {!! Form::label($sauce->slug, ucfirst($sauce->name), ['class' => 'form-check-label']) !!}
                                                    </div>
                                                @endunless
                                                
                                            @empty
                                                Sem Sauce
                                            @endforelse

                                            {{-- Set the value of 'Picante' input --}}
                                            @php
                                                $pepper = false;
                                                if (isset($product)) {
                                                    $pepper = $product->sauces->where('slug', 'picante')->count() > 0 ? true : false;
                                                }
                                            @endphp
                                            <div class="menu-label-radio">
                                                {!! Form::label('picante', 'O seu prato tem picante?', ['class' => 'form-check-label']) !!}
                                                <div class="product-checks">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        {!! Form::radio('picante', 1, $pepper,  ['class' => 'form-check-input']) !!}
                                                        {!! Form::label('picante', 'Sim',       ['class' => 'form-check-label']) !!}
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        {!! Form::radio('picante', 0, !$pepper, ['class' => 'form-check-input']) !!}
                                                        {!! Form::label('picante', 'Não',       ['class' => 'form-check-label']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                    {{--  Allergens item --}}
                                    <div class="accordion-item allergens-product">
                                        <button class="accordion-button" type="button">
                                            <h3><strong>Alergénios*</strong></h3>
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
                                                @forelse ($allergens as $allergen)
                                                {{-- Set 'checked' for checkboxes --}}
                                                @php
                                                    $checked = false;
                                                    if (isset($product)) {
                                                        $checked = in_array($allergen->id, $product->allergens->pluck('id')->toArray()) ? true : false;
                                                    }
                                                @endphp
                                                <div class="custom-control custom-control-inline">
                                                    {!! Form::checkbox($allergen->slug, null, $checked, ['class' => 'form-check-input inputAllergen', 'id' => 'allergen' . $allergen->slug]) !!}
                                                    {!! Form::label($allergen->slug, $allergen->name,   ['class' => 'form-check-label']) !!}
                                                </div>
                                            @empty
                                                Sem allergen
                                            @endforelse
                                            <div class="custom-control custom-control-inline">
                                                {!! Form::checkbox('no-allergen', null, ( isset($product) && $product->allergens->count() > 0 ) ? false : true, 
                                                                                        ['class' => 'form-check-input', 'id' => 'removeAllergens']) !!}
                                                {!! Form::label('no-allergen', 'Não tem', ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                                

                                {{--  Extras item --}}

                                <div class="accordion-item extra-products">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Extras</strong></h3>
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
                                        {!! Form::hidden('extras', null, ['id' => 'extras'] ) !!} 
                                        <div id="extrasContent">
                                            @if (isset($product) && count($product->extras) > 0 )
                                                @foreach ($product->extras as $extra)
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            {!! Form::text('extraName1', $extra->name, ['class' => 'form-control inputExtraName', 'placeholder' => 'Extra #1', 'disabled']) !!}
                                                        </div>
                                                        <div class="col-4">
                                                            {!! Form::number('extraPrice1', number_format($extra->price,2), ['class' => 'form-control inputExtraPrice', 'placeholder' => 'Custo*', 'min' => 1, 'step' => 'any', 'disabled']) !!}
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="#" class="removeExtra" data-product-id="{{ $product->id }}" data-extra-id="{{ $extra->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                    <g id="Group_13732" data-name="Group 13732" transform="translate(-14154 334)">
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
                                                @endforeach    
                                            @else
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        {!! Form::text('extraName1', null, ['class' => 'form-control inputExtraName', 'placeholder' => 'Extra #1']) !!}
                                                    </div>
                                                    <div class="col-4">
                                                        {!! Form::number('extraPrice1', null , ['class' => 'form-control inputExtraPrice ', 'placeholder' => 'Custo*', 'min' => 1, 'step' => 'any']) !!}
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="#" class="removeExtra">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                <g id="Group_13732" data-name="Group 13732" transform="translate(-14154 334)">
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
                                            @endif
                                        </div>
                                        <a href="#" id="addExtra">Adicionar Extra</a>
                                    </div>
                                </div> 


                                {{--  Campaign item --}}

                                <div class="accordion-item campaign-product">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Campanhas</strong></h3>
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
                                        @forelse ($campaigns as $campaign)
                                            <div class="custom-control custom-control-inline">
                                                {!! Form::radio('campaign_id', $campaign->id, ( isset($product) && $product->campaign_id == $campaign->id ? true : false) ?? false,      ['class' => 'form-check-input']) !!}
                                                {!! Form::label('campaign_id', $campaign->name, ['class' => 'form-check-label']) !!}
                                            </div>
                                        @empty
                                            SEM CAMPANHAS
                                        @endforelse
                                    </div>
                                </div> 
                            
                                {{--  Notes item --}}

                                <div class="accordion-item notes-products">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Notas especiais</strong></h3>
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
                                        {!! Form::textarea('note', (isset($product) && $product->note) ? $product->note : null, ['class' => 'form-control', 'placeholder' => 'Indique-nos informações que não estejam previstas no dados acima e que possam ser úteis para os seus clientes']) !!}
                                    </div>
                                </div> 
                                <h3 class="page-bottom-message">*Dados de preenchimento obrigatório.</h3>
                            </div>
                            {!! Form::close() !!}
                            <div class="button-next-container">
                                @if (isset($product))
                                    {!! Form::submit('Salvar', ['type' => 'submit', 'class' => 'button button-primary' , 'form' => 'formProductData', 'id' => 'submitFormProductData'   ]) !!}
                                @else
                                    {!! Form::submit('Próximo', ['type' => 'submit', 'class' => 'button button-primary' , 'form' => 'formProductData', 'id' => 'submitFormProductData'   ]) !!}
                                @endif
                            </div>
                            <div class="nav-menu-fixed">
                                @include('backoffice-partner.layouts.sidebar') 
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
        
        var count = "{{isset($product->extras) ? $product->extras->count() : 1}}";

        // Add new extra item
        jQuery(document).on("click", "#addExtra", function (event) {
            event.preventDefault();
            count++;
            var newInputExtra = `<div class="row mb-2">
                                    <div class="col-6">
                                        {!! Form::text('extraName${count}', null, ['class' => 'form-control inputExtraName', 'placeholder' => 'Extra #${count}']) !!}
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('extraPrice${count}', null , ['class' => 'form-control inputExtraPrice', 'placeholder' => 'Custo*', 'min' => 1, 'step' => 'any']) !!}
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="removeExtra">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <g id="Group_13732" data-name="Group 13732" transform="translate(-14154 334)">
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
                                </div> `;
            
            jQuery("#extrasContent").append(newInputExtra);
        });

        // Prepare data after submit
        jQuery(document).on("click", "#submitFormProductData", function (event) {
            event.preventDefault();
            getExtraInputs();
            jQuery("#formProductData").submit();
        });

        // Get extra items and send them to an input as an array
        function getExtraInputs() {
            var extras  = [];
            var key     = [];
            var val     = [];

            jQuery('.inputExtraName').each(function() { 
                key.push( jQuery(this).val() );
            });
            
            jQuery('.inputExtraPrice').each(function() { 
                val.push( jQuery(this).val() );
            });

            for (let i = 0; i < key.length; i++) {
                extras.push({
                    name:  key[i], 
                    price: val[i]
                });
                
            }

            jQuery('.inputExtraName').prop('disabled', true);
            jQuery('.inputExtraPrice').prop('disabled', true);

            jQuery('#extras').val(JSON.stringify(extras));
        }
        
        // Remove disabled property from inputs
        jQuery(document).on("click", ".editExtra", function (event) {    
            event.preventDefault();
            jQuery(this).closest('.row').find('input').removeAttr("disabled");
        });

        // Seta action do modal de confirmação de remoção de Extra
        jQuery(document).on("click", ".removeExtra", function (event) {
            event.preventDefault();
            
            var extra        = {};
            extra.id         = jQuery(this).data('extra-id');
            extra.product_id = jQuery(this).data('product-id');
            extra._token     = '{{ csrf_token() }}',
            
            jQuery.ajax({
                url: '{{ route("extra.remove") }}',
                type: 'POST',
                data: extra,
                cache: false,
                context: this,
                success: function (data) {
                    jQuery(this).closest('.row').remove();
                    return data;
                },
                error: function () {
                    alert('error handing here');
                }
            });
            
        });

        // Remove check e desabilita checkboxes de alergênios
        jQuery(document).on("click", "#removeAllergens", function (event) {
            jQuery('.inputAllergen').prop('checked', false).removeAttr('checked');
            jQuery('.inputAllergen').val('');
        });

        // Remove check de removeAllergens
        jQuery(document).on("click", ".inputAllergen", function (event) {
            jQuery('#removeAllergens').prop('checked', false).removeAttr('checked');
            jQuery('#removeAllergens').val('');
        });




    </script>
@endsection