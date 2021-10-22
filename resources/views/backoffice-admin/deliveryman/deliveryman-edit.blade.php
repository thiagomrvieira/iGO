@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/deliverymen.editDeliverymen')  }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/deliverymen.home')  }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('deliveryman.index') }} ">{{ __('backoffice/deliverymen.deliverymen')  }}</a></li>
                    <li class="breadcrumb-item active">{{ $deliveryman->name ?? null}}</li>
                </ol>
            </div>
        </div>

        {{-- Show alerts --}}
        @if(session()->has('message'))
            <div class="alert {{session('alert') ?? 'alert-info'}} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('message') }}
            </div>
        @endif

    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" alt="User profile picture"
                                src="{{ asset('assets-backoffice/dist/img/profile.png')}}">
                        </div>
                        
                        <h3 class="profile-username text-center">{{ $deliveryman->name ?? null}}</h3>
                        <p class="text-muted text-center">Alguma informação adicional</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>{{ __('backoffice/deliverymen.createdAt')  }}</b> <a class="float-right">{{ date('d-m-Y', strtotime($deliveryman->created_at))  ?? 'Pendente'}}</a>
                            </li>
                            <li class="list-group-item">
                                @if (is_null($deliveryman->approved_at))
                                    <b>{{ __('backoffice/deliverymen.pendingApproval')  }}</b>
                                @else
                                    <b>{{ __('backoffice/deliverymen.approvedAt')  }}</b> <a class="float-right">{{ date('d-m-Y', strtotime($deliveryman->approved_at))  ?? 'Pendente'}}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('backoffice/deliverymen.totalDelivers')  }}</b> <a class="float-right">0</a>
                            </li>
                        </ul>
                        
                        @if ($deliveryman->active == false)
                            {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                            'route' => array('deliveryman.update', ['deliveryman' => $deliveryman]), 'method' => 'post' ]) !!}
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                @if (is_null($deliveryman->approved_at))
                                    {!! Form::hidden('approved_at', date('Y/m/d H:i:s') ) !!} 
                                @endif
                                {!! Form::hidden('active', 1 ) !!}
                                {!! Form::submit(__('backoffice/deliverymen.activeAccount'),  ['type' => 'submit', 'class' => 'btn btn-primary btn-block' ]) !!}

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                            'route' => array('deliveryman.update', ['deliveryman' => $deliveryman]), 'method' => 'post' ]) !!}  
                                @csrf
                                {{ method_field('PATCH') }}

                                {!! Form::hidden('active', 0 ) !!}
                                {!! Form::submit(__('backoffice/deliverymen.deactiveAccount'),  ['type' => 'submit', 'class' => 'btn btn-danger btn-block' ]) !!}

                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#personal"  data-toggle="tab">{{ __('backoffice/deliverymen.personalDataTab.tabTitle') }} </a> </li>
                            <li class="nav-item"><a class="nav-link"        href="#documents" data-toggle="tab">{{ __('backoffice/deliverymen.docDataTab.tabTitle')      }} </a> </li>
                            <li class="nav-item"><a class="nav-link"        href="#address"   data-toggle="tab">{{ __('backoffice/deliverymen.addressDataTab.tabTitle')  }} </a> </li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            
                            {{-- TAB PERSONAL --}}
                            <div class="active tab-pane" id="personal">
                                
                                {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                                'route' => array('deliveryman.update', ['deliveryman' => $deliveryman]), 'method' => 'post' ]) !!}  
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    {{-- Input de controle para o metodo update --}}
                                    {!! Form::hidden('personalData', true ) !!}

                                    <div class="form-group row">
                                        {!! Form::label('name', __('backoffice/deliverymen.personalDataTab.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('name', $deliveryman->name ?? null, ['class' => 'form-control', 
                                                                                                'placeholder' => __('backoffice/deliverymen.personalDataTab.name')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('birth_date', __('backoffice/deliverymen.personalDataTab.birthDate'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::date('birth_date', $deliveryman->birth_date ?? null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.mobilePhoneNumber')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('nacionality', __('backoffice/deliverymen.personalDataTab.nacionality'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('nacionality', $deliveryman->nacionality ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.personalDataTab.nacionality')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('email', __('backoffice/deliverymen.personalDataTab.email'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('email', $deliveryman->email ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.personalDataTab.email')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('mobile_phone_number', __('backoffice/deliverymen.modalCreate.mobilePhoneNumber'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('mobile_phone_number', $deliveryman->mobile_phone_number ?? null, ['class' => 'form-control', 'placeholder' => '987 654 321'] ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/deliverymen.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                            
                            {{-- TAB DOCUMENTS --}}
                            <div class="tab-pane" id="documents">
                                {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                                'route' => array('deliveryman.update', ['deliveryman' => $deliveryman]), 'method' => 'post' ]) !!}  
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        {!! Form::label('identity_card_number', __('backoffice/deliverymen.docDataTab.idCardNumber'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('identity_card_number', $deliveryman->identity_card_number ?? null, ['class' => 'form-control', 'placeholder' => 'L1234561'] ) !!}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        {!! Form::label('tax_number', __('backoffice/deliverymen.docDataTab.taxNumber'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('tax_number', $deliveryman->tax_number ?? null, ['class' => 'form-control', 'placeholder' => 'M98754'] ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('social_insurance_number', __('backoffice/deliverymen.docDataTab.socialInsurance'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('social_insurance_number', $deliveryman->social_insurance_number ?? null, ['class' => 'form-control', 'placeholder' => '654987'] ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('driving_license_name', __('backoffice/deliverymen.docDataTab.drivingLicense'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('driving_license_name', $deliveryman->driving_license_name ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.docDataTab.name')] ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('driving_license_number', ' ', ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('driving_license_number', $deliveryman->driving_license_number ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.docDataTab.number') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('bank_account_name', __('backoffice/deliverymen.docDataTab.bankAccount'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('bank_account_name', $deliveryman->bank_account_name ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.docDataTab.name') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('bank_account_number', ' ',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('bank_account_number', $deliveryman->bank_account_number ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.docDataTab.number') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/deliverymen.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                            
                            {{-- TAB ADDRESS --}}
                            <div class="tab-pane" id="address">
                                {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                                'route' => array('deliveryman.update', ['deliveryman' => $deliveryman]), 'method' => 'post' ]) !!}  
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    {{-- Input de controle para o metodo update --}}
                                    {!! Form::hidden('addressData', true ) !!}
                                    {!! Form::hidden('user_id', $deliveryman->user->id ) !!}

                                    <div class="form-group row">
                                        {!! Form::label('line_1', __('backoffice/deliverymen.addressDataTab.address'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('line_1', $deliveryman->address->line_1 ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.addressDataTab.lineOne') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('line_2', ' ',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('line_2', $deliveryman->address->line_2 ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/deliverymen.addressDataTab.lineTwo') ]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        {!! Form::label('county',  __('backoffice/deliverymen.addressDataTab.county'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {{-- {!! Form::text('county', $deliveryman->address->county->id ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/deliverymen.addressDataTab.county') ]) !!} --}}
                                            {!! Form::select('county_id', $counties->pluck('name', 'id'), $deliveryman->address->county_id ?? null, 
                                                    ['class' => 'form-control', 'placeholder' => 'Seleciona uma província']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('locality',  'Bairro',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('locality', $deliveryman->address->locality ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/deliverymen.addressDataTab.locality') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('post_code',  __('backoffice/deliverymen.addressDataTab.postalCode'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('post_code', $deliveryman->address->post_code ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/deliverymen.addressDataTab.postalCode') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('country',  __('backoffice/deliverymen.addressDataTab.country'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('country', $deliveryman->address->country ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/deliverymen.addressDataTab.country') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/deliverymen.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection