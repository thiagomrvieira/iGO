@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        {{-- Breadcrumbs --}}
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/partners.editPartner') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }} ">{{ __('backoffice/partners.partners') }}</a></li>
                    <li class="breadcrumb-item active">{{ $partner->company_name ?? null}}</li>
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
                            @if (isset($partner->images->image_cover))
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{url('/images/partner/'.$partner->id. '/' .$partner->images->image_cover)}}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('assets-backoffice/dist/img/store.png')}}" alt="User profile picture">
                            @endif
                        </div>
                        
                        <h3 class="profile-username text-center">{{ $partner->company_name ?? null}}</h3>
                        <p class="text-muted text-center">Alguma informação adicional</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>{{ __('backoffice/partners.createdAt') }}</b> <a class="float-right">{{ date('d-m-Y', strtotime($partner->created_at))  ?? 'Pendente'}}</a>
                            </li>
                            <li class="list-group-item">
                                @if (is_null($partner->approved_at))
                                    <b>{{ __('backoffice/partners.pendingApproval') }}</b>
                                @else
                                    <b>{{ __('backoffice/partners.approvedAt') }}</b> <a class="float-right">{{ date('d-m-Y', strtotime($partner->approved_at))  ?? 'Pendente'}}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('backoffice/partners.totalOrders') }}</b> <a class="float-right">0</a>
                            </li>
                        </ul>

                        {{-- Button activate account --}}
                        @if ($partner->active == false)
                            {!! Form::open(['class' => 'form-horizontal', 'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}
                                @csrf
                                {{ method_field('PATCH') }}
                                @if (is_null($partner->approved_at))
                                    {{-- {!! Form::hidden('approved_at', date('Y/m/d H:i:s') ) !!}  --}}
                                    {!! Form::hidden('approved_at', Carbon::now() ) !!} 
                                @endif
                                {!! Form::hidden('active', 1 ) !!}
                                {!! Form::submit(__('backoffice/partners.activeAccount'),  ['type' => 'submit', 'class' => 'btn btn-primary btn-block' ]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['class' => 'form-horizontal', 'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}
                                @csrf
                                {{ method_field('PATCH') }}
                                {!! Form::hidden('active', 0 ) !!}
                                {!! Form::submit(__('backoffice/partners.deactiveAccount'),  ['type' => 'submit', 'class' => 'btn btn-danger btn-block' ]) !!}
                            {!! Form::close() !!}
                        @endif

                        {{-- Button activate premium account --}}
                        {!! Form::open(['class' => 'form-horizontal mt-1', 'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}
                            @csrf
                            {{ method_field('PATCH') }}
                            {!! Form::hidden('premium', $partner->premium == 0 ? 1 : 0) !!}
                            {!! Form::submit( $partner->premium == 0 ? 'Ativar premium' : 'Desativar premium',  
                                                ['type' => 'submit', 'class' =>  ' ' . $partner->premium == 0 ? 
                                                                                                'btn btn-primary btn-block' : 
                                                                                                'btn btn-danger btn-block ' ]) !!}
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#company"   data-toggle="tab">{{ __('backoffice/partners.companyDataTab.tabTitle') }} </a></li>
                            <li class="nav-item"><a class="nav-link"        href="#documents" data-toggle="tab">{{ __('backoffice/partners.docDataTab.tabTitle')     }} </a></li>
                            <li class="nav-item"><a class="nav-link"        href="#address"   data-toggle="tab">{{ __('backoffice/partners.addressDataTab.tabTitle') }} </a></li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            
                            {{-- TAB COMPANY --}}
                            <div class="active tab-pane" id="company">
                                {!! Form::open(['class' => 'form-horizontal', 'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}      
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    <div class="form-group row">
                                        {!! Form::label('company_name', __('backoffice/partners.companyDataTab.company'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('company_name', $partner->company_name ?? null, ['class' => 'form-control', 
                                                                                                            'placeholder' => __('backoffice/partners.companyDataTab.companyName')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('category_id', __('backoffice/partners.companyDataTab.category'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::select('category_id', $partnerCategories->pluck('name', 'id'), $partner->category_id, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('name', $partner->name ?? null, ['class' => 'form-control', 
                                                                                                    'placeholder' => __('backoffice/partners.companyDataTab.name')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('email',__('backoffice/partners.companyDataTab.email'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('email', $partner->email ?? null, ['class' => 'form-control', 
                                                                                              'placeholder' => __('backoffice/partners.companyDataTab.email') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('phone_number',__('backoffice/partners.companyDataTab.phone'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('phone_number', $partner->phone_number ?? null, ['class' => 'form-control', 
                                                                                                            'placeholder' => __('backoffice/partners.companyDataTab.phone') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('mobile_phone_number',__('backoffice/partners.companyDataTab.mobilePhone'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('mobile_phone_number', $partner->mobile_phone_number ?? null, ['class' => 'form-control', 
                                                                                                                          'placeholder' => __('backoffice/partners.companyDataTab.mobilePhone') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/partners.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            
                            {{-- TAB DOCUMENTS --}}
                            <div class="tab-pane" id="documents">
                                {!! Form::open(['class' => 'form-horizontal', 'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}      
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        {{-- <label for="tax_number" class="col-sm-2 col-form-label">{{ __('backoffice/partners.docDataTab.taxNumber') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="L123456" value="{{ $partner->tax_number ?? null}}">
                                        </div> --}}
                                        {!! Form::label('tax_number',__('backoffice/partners.docDataTab.taxNumber'), ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('tax_number', $partner->tax_number ?? null, ['class' => 'form-control', 'placeholder' => 'L123456' ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/partners.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            
                            {{-- TAB ADDRESS --}}
                            <div class="tab-pane" id="address">
                                {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 
                                                'route' => array('partner.update', ['partner' => $partner]), 'method' => 'post' ]) !!}  
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    {{-- Input de controle para o metodo update --}}
                                    {!! Form::hidden('addressData', true ) !!}
                                    {!! Form::hidden('user_id', $partner->user->id ?? null ) !!}

                                    <div class="form-group row">
                                        {!! Form::label('line_1', __('backoffice/partners.addressDataTab.address'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('line_1', $partner->address->line_1 ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/partners.addressDataTab.lineOne') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('line_2', ' ',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('line_2', $partner->address->line_2 ?? null, ['class' => 'form-control', 'placeholder' => __('backoffice/partners.addressDataTab.lineTwo') ]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        {!! Form::label('county',  __('backoffice/partners.addressDataTab.county'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('county_id', $partner->address->county_id ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/partners.addressDataTab.county') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('locality', 'Bairro',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('locality', $partner->address->locality ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/partners.addressDataTab.locality') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('post_code',  __('backoffice/partners.addressDataTab.postalCode'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('post_code', $partner->address->post_code ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/partners.addressDataTab.postalCode') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('country',  __('backoffice/partners.addressDataTab.country'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('country', $partner->address->country ?? null, ['class' => 'form-control', 'placeholder' =>  __('backoffice/partners.addressDataTab.country') ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/partners.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
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