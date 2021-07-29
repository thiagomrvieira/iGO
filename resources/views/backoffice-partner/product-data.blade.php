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
    
    <h4>Product data</h4>
    {!! Form::open(['class'  => '', 'id' => 'formProductData', 'route' => 'partner.storeProduct.data', 
                    'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        
        {!! Form::hidden('partner_id', $partner->id ) !!} 

        <div class="accordion" id="accordionProductData">
            
            {{-- Product name item--}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Nome do prato*
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="form-group">
                            {!! Form::label('image', 'Inserir foto*', ['class' => 'form-check-label']) !!}
                            {!! Form::file ('image', null, false,     ['class' => 'form-check-input']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do prato*']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição do prato*']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Custo*', 
                                                             'min' => 1, 'step' => 'any']) !!}
                        </div>
                        
                        {!! Form::label('available', 'Produto disponível?', ['class' => 'form-check-label']) !!}

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

            {{-- Product category item--}}
            <div class="accordion-item"> 
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Ementa(categorias)*
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProductData">
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
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Acompanhamentos*
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProductData">
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
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Molhos*
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionProductData">
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
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Alergénios*
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionProductData">
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

            {{--  Campaign item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Campanhas
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionProductData">
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

            {{--  Campaign item --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        Notas especiais
                    </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionProductData">
                    <div class="accordion-body">
                        <div class="custom-control custom-control-inline">
                            {!! Form::textarea('avgtime',  NULL, ['class' => 'form-control', 
                                                                  'placeholder' => 'Indique-nos informações que não estejam previstas no dados acima e que possam ser úteis para os seus clientes']) !!}
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
    {!! Form::submit('Seguinte', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formProductData'   ]) !!}

</div>
@endsection
