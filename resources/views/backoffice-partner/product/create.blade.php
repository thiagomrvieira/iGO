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
<div class="container">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => ($product ? array('products.update', ['product' => $product]) : 'products.store'), 
                    'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf

        {{ $product ? method_field('PATCH') : null}}
        {!! Form::hidden('partner_id', $partner->id ) !!} 

        <div class="accordion" id="accordionProductData">
            
            {{-- Product name item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingProduct">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                    Nome do prato*
                    </button>
                </h2>
                <div id="collapseProduct" class="accordion-collapse collapse show" aria-labelledby="headingProduct" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="form-group">
                            @if ($product->image)
                                <img src="{{url('/images/partner/'.$partner->id. '/products/' .$product->image)}}" 
                                    alt="Product Image" height="90px">
                                <br>
                            @endif
                            {!! Form::label('image', $product->image ? 'Alterar foto*' : 'Inserir foto*', ['class' => 'form-check-label']) !!}
                            {!! Form::file ('image', null, false,     ['class' => 'form-check-input']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('name', $product->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome do prato*']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('description', $product->description ?? null, ['class' => 'form-control', 'placeholder' => 'Descrição do prato*']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::number('price', number_format($product->price,2) ?? null, ['class' => 'form-control', 'placeholder' => 'Custo*', 
                                                             'min' => 1, 'step' => 'any']) !!}
                        </div>
                        
                        {!! Form::label('available', 'Produto disponível?', ['class' => 'form-check-label']) !!}

                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, ($product->available == 1 ? true : false) ?? false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Sim', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 0, ($product->available == 0 ? true : false) ?? false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Não', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product category item--}}
            <div class="accordion-item"> 
                <h2 class="accordion-header" id="headingCategory">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                        Ementa(categorias)*
                    </button>
                </h2>
                <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Entradas', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Bebidas', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Pratos principais', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Sobremesas', ['class' => 'form-check-label']) !!}
                        </div>

                        {!! Form::label('available', 'Deseja colocar o prato na secção de destaques?', 
                                                                        ['class' => 'form-check-label']) !!}
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Sim', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 0, false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Não', ['class' => 'form-check-label']) !!}
                        </div>

                    </div>
                </div>
            </div>

            {{--  Side dishes item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSide">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSide" aria-expanded="false" aria-controls="collapseSide">
                        Acompanhamentos*
                    </button>
                </h2>
                <div id="collapseSide" class="accordion-collapse collapse" aria-labelledby="headingSide" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Arroz', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Salada', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Legumes', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>
                </div>
            </div>
            
            {{--  Souce item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSouce">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSouce" aria-expanded="false" aria-controls="collapseSouce">
                        Molhos*
                    </button>
                </h2>
                <div id="collapseSouce" class="accordion-collapse collapse" aria-labelledby="headingSouce" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Maionese', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Pesto', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Vinagrete', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Mostarda', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Holandês', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('available', 1, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Ketchup', ['class' => 'form-check-label']) !!}
                        </div>

                        {!! Form::label('available', 'O seu prato tem picante?', 
                                                                        ['class' => 'form-check-label']) !!}
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 1, false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Sim', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            {!! Form::radio('available', 0, false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('available', 'Não', ['class' => 'form-check-label']) !!}
                        </div>


                    </div>
                </div>
            </div>

            {{--  Allergens item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingAllergen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAllergen" aria-expanded="false" aria-controls="collapseAllergen">
                        Alergénios*
                    </button>
                </h2>
                <div id="collapseAllergen" class="accordion-collapse collapse" aria-labelledby="headingAllergen" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '0-30', false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Glúten', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '30-45', false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Peixe', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Lactose', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Mostarda', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Tremoço', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Amendoins', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Frutos de casca rija', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Sementes sésamo', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Moluscos', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Ovos', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Soja', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Aipo', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Dióxido de enxofre e sulfitos', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::checkbox('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Não tem', ['class' => 'form-check-label']) !!}
                        </div>

                    </div>
                </div>
            </div>

            {{--  Extras item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingExtra">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtra" aria-expanded="false" aria-controls="collapseExtra">
                        Extras
                    </button>
                </h2>
                <div id="collapseExtra" class="accordion-collapse collapse" aria-labelledby="headingExtra" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            <div class="row">
                                @if (count($product->extras) > 0 )
                                    @foreach ($product->extras as $extra)
                                        <div class="col-6">
                                            {!! Form::text('extraName', $extra->name, ['class' => 'form-control', 'placeholder' => 'Extra #1']) !!}
                                        </div>
                                        <div class="col-4">
                                            {!! Form::number('extraPrice', number_format($extra->price,2), ['class' => 'form-control', 'placeholder' => 'Custo*', 
                                                                                                            'min' => 1, 'step' => 'any']) !!}
                                        </div>
                                        <div class="col-2">
                                            Icon 1
                                            Icon 2
                                        </div>
                                    @endforeach    
                                    <a href="#">Adicionar Extra</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Campaign item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCampaign">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCampaign" aria-expanded="false" aria-controls="collapseCampaign">
                        Campanhas
                    </button>
                </h2>
                <div id="collapseCampaign" class="accordion-collapse collapse" aria-labelledby="headingCampaign" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            {!! Form::radio('avgtime', '0-30', false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', 'Novidade', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::radio('avgtime', '30-45', false,      ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', '30% de desconto', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::radio('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', '2 por 1', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::radio('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', '50% de desconto', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="custom-control custom-control-inline">
                            {!! Form::radio('avgtime', '45-60', false,       ['class' => 'form-check-input']) !!}
                            {!! Form::label('avgtime', '20% de desconto', ['class' => 'form-check-label']) !!}
                        </div>

                    </div>
                </div>
            </div>

            {{--  Notes item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingNote">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNote" aria-expanded="false" aria-controls="collapseNote">
                        Notas especiais
                    </button>
                </h2>
                <div id="collapseNote" class="accordion-collapse collapse" aria-labelledby="headingNote" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            {!! Form::textarea('note',  $product->note ?? null, ['class' => 'form-control', 
                                                               'placeholder' => 'Indique-nos informações que não estejam previstas no dados acima e que possam ser úteis para os seus clientes']) !!}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @if ($product)
        {!! Form::submit('Salvar', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProductData'   ]) !!}
    @else
        {!! Form::submit('Próximo', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProductData'   ]) !!}
    @endif

</div>
@endsection
