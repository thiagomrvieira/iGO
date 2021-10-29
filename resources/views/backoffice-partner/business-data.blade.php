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

{{-- @dump($partner->subCategories) --}}
{{-- @dump($partner->mainCategory->name) --}}

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
                        {!! Form::open(['class'  => '', 'id' => 'formBusinessData', 'route' => 'partner.storeBusiness.data', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @csrf
                            <div class="" id="accordionBusinessData">
                                
                                {{-- Category item--}}
                                <div class="accordion-item">
                                    <button class="accordion-button" type="button" disabled>
                                        <h3><strong>Categoria:</strong> &nbsp; {{$partner->mainCategory->name}}</h3>
                                    </button>
                                    <div class="accordion-content">
                                        
                                    </div>
                                </div>    

                                {{-- Subcategory item--}}

                                <div class="accordion-item sub-categories">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Sub-categorias*</strong></h3>
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
                                        @foreach ($categories as $category)
                                        <div class="form-check">
                                            {!! Form::checkbox($category->slug, null, ($partner->subCategories->where('id', $category->id)->first() != null ) ? true : false, 
                                                ['class' => 'form-check-input']) !!}
                                            {!! Form::label($category->slug, $category->name, ['class' => 'form-check-label']) !!}
                                        </div>
                                    @endforeach
                                    </div>
                                </div> 

                                {{-- <div class="accordion-item"> 
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Subcategorias*
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBusinessData">
                                        <div class="accordion-body">
                                            @foreach ($categories as $category)
                                                <div class="form-check">
                                                    {!! Form::checkbox($category->slug, null, ($partner->subCategories->where('id', $category->id)->first() != null ) ? true : false, 
                                                        ['class' => 'form-check-input']) !!}
                                                    {!! Form::label($category->slug, $category->name, ['class' => 'form-check-label']) !!}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> --}}

                                {{--  Schedules item --}}

                                <div class="accordion-item">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Horários*</strong></h3>
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
                                        <div class="accordion-body">
                                            <div class="partner-business-header">
                                                <div class="partner-business-days">
                                                    <h3>Dias:</h3>
                                                </div>
                                                <div class="partner-business-timer">
                                                    <h3>Horário:</h3>
                                                </div>
                                            </div> 
                                            <div class="partner-business-times">
                                                @php $schedule = $partner->schedule @endphp
                                                @foreach ($workDays as $workday)
                                                    <div>
                                                        {{-- DAYS --}}
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                {!! Form::checkbox($workday, null, $schedule->where('day', $workday)->count() > 0 ? true : false, ['class' => 'form-check-input checkDay', 'data-day' => $workday]) !!}
                                                                {!! Form::label($workday, $workday, ['class' => 'form-check-label']) !!}
                                                            </div>
                                                        </div>
                                                       
                                                        {{-- PERIODS --}}
                                                        <div class="col-8">
                                                            {{-- Morning --}}
                                                            <div class="row">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Morning', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday, 'id' => $workday.'Morning']) !!}
                                                                    {!! Form::label($workday.'Morning', 'Manhã', ['class' => 'form-check-label']) !!}
                                                                </div>                                                            
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'MorningOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Morning input'.$workday]) }}
                                                                    <span>Às</span> 
                                                                    {{ Form::time($workday.'MorningClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Morning input'.$workday]) }}
                                                                </div>
                                                            </div>

                                                            {{-- Afternoon --}}
                                                            <div class="row">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Afternoon', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday , 'id' => $workday.'Afternoon']) !!}
                                                                    {!! Form::label($workday.'Afternoon', 'Tarde', ['class' => 'form-check-label']) !!}
                                                                </div>
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'AfternoonOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Afternoon input'.$workday]) }}
                                                                    <span>Às</span> 
                                                                    {{ Form::time($workday.'AfternoonClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Afternoon input'.$workday]) }}
                                                                </div>
                                                            </div>
                                                            {{-- Evening --}}
                                                            <div class="row">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Evening', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday, 'id' => $workday.'Evening']) !!}
                                                                    {!! Form::label($workday.'Evening', 'Noite', ['class' => 'form-check-label']) !!}
                                                                </div>
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'EveningOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Evening input'.$workday]) }}
                                                                    <span>Às</span> 
                                                                    {{ Form::time($workday.'EveningClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Evening input'.$workday]) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Horários*
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionBusinessData">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    Dias:
                                                </div>
                                                <div class="col-8">
                                                    Horário:
                                                </div>
                                            </div>
                                            
                                            @php $schedule = $partner->schedule @endphp
                                            
                                            @foreach ($workDays as $workday)
                                                <div class="row"> --}}
                                                    {{-- DAYS --}}
                                                    {{-- <div class="col-4">
                                                        <div class="form-check">
                                                            {!! Form::checkbox($workday, null, $schedule->where('day', $workday)->count() > 0 ? true : false, 
                                                                            ['class' => 'form-check-input checkDay', 'data-day' => $workday]) !!}
                                                            {!! Form::label($workday, $workday, ['class' => 'form-check-label']) !!}
                                                        </div>
                                                    </div> --}}

                                                    {{-- PERIODS --}}
                                                    {{-- <div class="col-8"> --}}
                                                        {{-- Morning --}}
                                                        {{-- <div class="row">
                                                            <div class="col-2">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Morning', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday, 'id' => $workday.'Morning']) !!}
                                                                    {!! Form::label($workday.'Morning', 'Manhã', ['class' => 'form-check-label']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-10 ">
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'MorningOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Morning input'.$workday]) }}
                                                                    às
                                                                    {{ Form::time($workday.'MorningClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'morning')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Morning input'.$workday]) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- Afternoon --}}
                                                        {{-- <div class="row">
                                                            <div class="col-2">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Afternoon', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday , 'id' => $workday.'Afternoon']) !!}
                                                                    {!! Form::label($workday.'Afternoon', 'Tarde', ['class' => 'form-check-label']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-10 ">
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'AfternoonOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Afternoon input'.$workday]) }}
                                                                    às
                                                                    {{ Form::time($workday.'AfternoonClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'afternoon')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Afternoon input'.$workday]) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- Evening --}}
                                                        {{-- <div class="row">
                                                            <div class="col-2">
                                                                <div class="form-check">
                                                                    {!! Form::checkbox($workday.'Evening', null, $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->count() > 0 ? true : false, ['class' => 'form-check-input checkPeriod check'.$workday, 'id' => $workday.'Evening']) !!}
                                                                    {!! Form::label($workday.'Evening', 'Noite', ['class' => 'form-check-label']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-10 ">
                                                                <div class="form-inline">
                                                                    {{ Form::time($workday.'EveningOpening', $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->pluck('open')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Evening input'.$workday]) }}
                                                                    às
                                                                    {{ Form::time($workday.'EveningClosing', $schedule->where('day', $workday)
                                                                        ->where('period', 'evening')->pluck('close')->first() ?? null, ['class' => 'custom-select my-1 mr-sm-2 input'.$workday.'Evening input'.$workday]) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    {{-- </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> --}}
                                
                                {{--  Average time item --}}
                                <div class="accordion-item avegare-time">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Tempo médio de preparação do pedido*</strong> </h3>
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
                                        <div class="average-time-check">
                                            {!! Form::radio('avgtime', '0-30', $partner->average_order_time == '0-30' ? true : false, ['class' => 'form-check-input']) !!}
                                            {!! Form::label('avgtime', '0 - 30 minutos', ['class' => 'form-check-label']) !!}
                                        </div>
                                        <div class="average-time-check">
                                            {!! Form::radio('avgtime', '30-45', $partner->average_order_time == '30-45' ? true : false, ['class' => 'form-check-input']) !!}
                                            {!! Form::label('avgtime', '30 - 45 minutos', ['class' => 'form-check-label']) !!}
                                        </div>
                                        <div class="average-time-check">
                                            {!! Form::radio('avgtime', '45-60', $partner->average_order_time == '45-60' ? true : false, ['class' => 'form-check-input']) !!}
                                            {!! Form::label('avgtime', '45 - 60 minutos', ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>
                                </div>  

                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Tempo médio de preparação do pedido*
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionBusinessData">
                                        <div class="accordion-body">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {!! Form::radio('avgtime', '0-30', $partner->average_order_time == '0-30' ? true : false, ['class' => 'form-check-input']) !!}
                                                {!! Form::label('avgtime', '0 - 30 minutos', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {!! Form::radio('avgtime', '30-45', $partner->average_order_time == '30-45' ? true : false, ['class' => 'form-check-input']) !!}
                                                {!! Form::label('avgtime', '30 - 45 minutos', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {!! Form::radio('avgtime', '45-60', $partner->average_order_time == '45-60' ? true : false, ['class' => 'form-check-input']) !!}
                                                {!! Form::label('avgtime', '45 - 60 minutos', ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{--  Images item --}}
                                <div class="accordion-item image-items">
                                    <button class="accordion-button" type="button">
                                        <h3><strong>Imagens*</strong> </h3>
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
                                        @if (isset($partner->images->image_cover))
                                            <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" alt="" height="90px">
                                        @endif
                                        <div class="form-group">
                                            {!! Form::label('image-cover', 'Fotografia capa', ['class' => 'form-check-label']) !!}
                                            {!! Form::file ('image-cover', null, false,       ['class' => 'form-check-input']) !!}
                                        </div>

                                        @if (isset($partner->images->image_01))
                                            <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_01)}}" alt="" height="90px">
                                        @endif
                                        <div class="form-group">
                                            {!! Form::label('image-01', 'Fotografia #1', ['class' => 'form-check-label']) !!}
                                            {!! Form::file ('image-01', null, false,     ['class' => 'form-check-input']) !!}
                                        </div>

                                        @if (isset($partner->images->image_02))
                                            <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_02)}}" alt="" height="90px">
                                        @endif
                                        <div class="form-group">
                                            {!! Form::label('image-02', 'Fotografia #2', ['class' => 'form-check-label']) !!}
                                            {!! Form::file ('image-02', null, false,     ['class' => 'form-check-input']) !!}
                                        </div>

                                        @if (isset($partner->images->image_03))
                                            <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_03)}}" alt="" height="90px">
                                        @endif
                                        <div class="form-group">
                                            {!! Form::label('image-03', 'Fotografia #3', ['class' => 'form-check-label']) !!}
                                            {!! Form::file ('image-03', null, false,     ['class' => 'form-check-input']) !!}
                                        </div>
                                    </div>
                                </div> 
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Imagens*
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionBusinessData">
                                        <div class="accordion-body">
                                            @if (isset($partner->images->image_cover))
                                                <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" alt="" height="90px">
                                            @endif
                                            <div class="form-group">
                                                {!! Form::label('image-cover', 'Fotografia capa', ['class' => 'form-check-label']) !!}
                                                {!! Form::file ('image-cover', null, false,       ['class' => 'form-check-input']) !!}
                                            </div>

                                            @if (isset($partner->images->image_01))
                                                <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_01)}}" alt="" height="90px">
                                            @endif
                                            <div class="form-group">
                                                {!! Form::label('image-01', 'Fotografia #1', ['class' => 'form-check-label']) !!}
                                                {!! Form::file ('image-01', null, false,     ['class' => 'form-check-input']) !!}
                                            </div>

                                            @if (isset($partner->images->image_02))
                                                <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_02)}}" alt="" height="90px">
                                            @endif
                                            <div class="form-group">
                                                {!! Form::label('image-02', 'Fotografia #2', ['class' => 'form-check-label']) !!}
                                                {!! Form::file ('image-02', null, false,     ['class' => 'form-check-input']) !!}
                                            </div>

                                            @if (isset($partner->images->image_03))
                                                <img src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_03)}}" alt="" height="90px">
                                            @endif
                                            <div class="form-group">
                                                {!! Form::label('image-03', 'Fotografia #3', ['class' => 'form-check-label']) !!}
                                                {!! Form::file ('image-03', null, false,     ['class' => 'form-check-input']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                            </div>
                            {!! Form::submit($partner->first_login ? 'Seguinte' : 'Salvar', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formBusinessData'   ]) !!}
                            {!! Form::close() !!}
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
        // Uncheck checkboxes for period if checkbox for DAY is unchecked
        $(document).on("click", ".checkDay", function () {
            var day = $(this).data('day');
            $('.check' + day).prop('checked', false).removeAttr('checked');
            $('.input' + day).val('');
        });
        // Remove values from inputs if checkbox for PERIOD is unchecked
        $(document).on("click", ".checkPeriod", function () {
            var id = $(this).attr('id');
            if (!$('#' + id).is(":checked")) {
                $('.input' + id).val('');
            };
        });
    </script>
@endsection