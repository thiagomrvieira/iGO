@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produtos destacados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item active"> Destaques </li>
                </ol>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

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
            <div class="col-12">
                @if (isset($productFeatured) && $productFeatured->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Lista de campanhas </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Loja </th>
                                        <th> Produto </th>
                                        <th> Solicitado em </th>
                                        <th> Status </th>
                                        <th> Início </th>
                                        <th> Término </th>
                                        <th> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productFeatured as $featured) 
                                        <tr>
                                            <td> {{ $featured->id            ?? null }} </td>
                                            <td> {{ $featured->partner->name ?? null }} </td>
                                            <td> {{ $featured->product->name ?? null }} </td>
                                            <td> {{ $featured->created_at    ?? null }} </td>
                                            <td> {{ !$featured->active ? 'Inativa' : 'Ativa' }} </td>
                                            <td> {{ $featured->start_date  ? date('d-m-Y', strtotime($featured->start_date)) : 'Inativa' }} </td>
                                            <td> {{ $featured->finish_date ? date('d-m-Y', strtotime($featured->start_date)) : 'Inativa' }} </td>

                                            <td>
                                                <a class="mr-1 updateStatus" href="#" data-campaign-id="{{ $featured->id }} "
                                                    data-campaign-active="{{ $featured->active }} ">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                {{-- <a href="{{ route('campaign.edit', ['campaign' => $featured] ) }}">
                                                    <i class="far fa-edit"></i>
                                                </a> --}}
                                                <a class="ml-1 openDeleteDialog" href="#" data-campaign-id="{{ $featured->id }}" 
                                                    data-toggle="modal"  data-target="#modal-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        SEM CAMPANHAS                                        
                                    @endforelse
                                       
                                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'form-update-status', 'method' => 'post' ]) !!}
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('active', 0, ['id' => 'active'] ) !!}
                                    {!! Form::close() !!}

                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Button for creation --}}
                        <div class="card-footer clearfix">
                            <div class="float-right">
                                {!! Form::submit(__('backoffice/partners.createUser'),  ['type' => 'button', 'class' => 'btn btn-primary btn-sm float-right', 
                                                                                         'data-toggle' => 'modal', 'data-target' => '#modal-lg']) !!}
                            </div>
                        </div>

                    </div>
                @else
                    <div class="callout callout-info">
                        <i class="far fa-frown"></i>
                        {{ __('backoffice/partners.noData') }} 
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal de criação de campanhas --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro de campanha</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 'route' => 'campaign.store', 'method' => 'post' ]) !!}
                        @csrf
                        
                        {{-- Campaign name --}}
                        <div class="form-group row">
                            {!! Form::label('name', 'Título', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null,  ['class' => 'form-control', 'required', 'placeholder' =>  'Nome da campanha' ]) !!}
                            </div>
                        </div>
                        
                        {{-- Campaign description --}}
                        <div class="form-group row">
                            {!! Form::label('description', 'Descrição', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'rows' => 3, 
                                                                         'placeholder' =>  'Descrição da campanha' ]) !!}
                            </div>
                        </div>

                        {{-- Type of campaign - Radios --}}
                        <div class="form-group row">
                            {!! Form::label('', 'Tipo de campanha', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10" style="margin: auto;">
                                <div class="custom-control custom-radio custom-control-inline">
                                    {!! Form::radio('type', 'percentage-item', true, ['class' => 'form-check-input']) !!}
                                    {!! Form::label('type', 'Porcentagem no item',   ['class' => 'form-check-label']) !!}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    {!! Form::radio('type', 'percentage-purchase', false,   ['class' => 'form-check-input']) !!}
                                    {!! Form::label('type', 'Porcentagem em toda a compra', ['class' => 'form-check-label']) !!}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    {!! Form::radio('type', 'delivery', false, ['class' => 'form-check-input']) !!}
                                    {!! Form::label('type', 'Taxa de entrega', ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>
                        
                        {{-- Percentage --}}
                        <div class="form-group row">
                            {!! Form::label('label-campaign', 'Porcentagem', ['class' => 'col-sm-2 col-form-label', 'id' => 'label-campaign']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('percentage', null,  ['class' => 'form-control', 'required', 
                                                                       'placeholder' =>  'Porcentagem', 'id' => 'percentage']) !!}
                            </div>
                        </div>

                        {{-- Code --}}
                        <div class="form-group row" >
                            {!! Form::label('label-campaign', 'Código', ['class' => 'col-sm-2 col-form-label', 'id' => 'label-campaign']) !!}
                            <div class="col-sm-10" style="margin: auto;">
                                {!! Form::text('code', null,  ['class' => 'form-control', 'required',
                                                               'placeholder' =>  'Código promocional', 'id' => 'code']) !!}
                            </div>
                        </div>

                        {{-- Start and Finish date --}}
                        <div class="form-group row">
                            {!! Form::label('label-campaign', 'Validade', ['class' => 'col-sm-2 col-form-label', 'id' => 'label-campaign']) !!}
                            <div class="col-sm-5">
                                {!! Form::date('start_date', null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.mobilePhoneNumber')]) !!}
                            </div>
                            <div class="col-sm-5">
                                {!! Form::date('finish_date', null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.mobilePhoneNumber')]) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
                
                {{-- Buttons --}}
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/partners.modalCreate.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/partners.modalCreate.create'), ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formCreation']) !!}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    {{-- Modal de confirmação de remoção --}}
    <div class="modal fade" id="modal-confirm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>{{ __('backoffice/partners.modalRemove.modalTitle') }}</p>
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formDelete', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/partners.modalRemove.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/partners.modalRemove.remove'), ['type' => 'submit', 'class' => 'btn btn-danger' , 'form' => 'formDelete'   ]) !!}
                </div>
            </div>
        </div>
    </div>

@endsection
    
@section('jquery')
    <script type="text/javascript">
        
        // Seta action do modal de confirmação de remoção da campanha
        $(document).on("click", ".openDeleteDialog", function () {
            var campaignId = $(this).data('campaign-id');
            var action     = `/admin/campaign/${campaignId}`;

            $('#formDelete').attr('action', action );
        });

        // Seta action do form de update de status da campanha
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();

            var campaignId = $(this).data('campaign-id');
            var active     = $(this).data('campaign-active');
            var action     = `/admin/campaign/${campaignId}`;

            $('#active').val(active == 1 ? 0 : 1);
            $('#form-update-status').attr('action', action ).submit();
        });

        // $('input[type=radio][name=campaign-type]').change(function() {
        //     if (this.value == 'percentage') {
        //         $('#code').hide().attr('disabled', 'disabled');
        //         $('#percentage').removeAttr('hidden').removeAttr('disabled').show();
        //         $('#label-campaign').text("Porcentagem");
        //     } else if (this.value == 'code') {
        //         $('#percentage').hide().attr('disabled', 'disabled');
        //         $('#code').removeAttr('disabled').removeAttr('hidden').show();
        //         $('#label-campaign').text("Código promocional");
        //     }
        // });
        
    </script>
@endsection