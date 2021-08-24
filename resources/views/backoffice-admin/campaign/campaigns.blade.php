@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Campanhas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item active"> Campanhas </li>
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
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (isset($campaigns) && $campaigns->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Lista de campanhas </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Campanha </th>
                                        <th> Descrição </th>
                                        <th> Status </th>
                                        <th> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($campaigns as $campaign)
                                        <tr>
                                            <td> {{ $campaign->id          ?? null}} </td>
                                            <td> {{ $campaign->name        ?? null}} </td>
                                            <td> {{ $campaign->description ?? null}} </td>
                                            <td> {{ !$campaign->active ? 'Inativa' : 'Ativa' }}</td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" data-campaign-id="{{ $campaign->id }} "
                                                    data-campaign-active="{{ $campaign->active }} ">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="{{ route('campaign.edit', ['campaign' => $campaign] ) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a class="ml-1 openDeleteDialog" href="#" data-campaign-id="{{ $campaign->id }}" 
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
                                        
                                        {{-- @if (is_null($partner->approved_at))
                                            {!! Form::hidden('approved_at', date('Y/m/d H:i:s') ) !!}
                                        @endif --}}
                                        
                                        {!! Form::hidden('active', 0, ['id' => 'active'] ) !!}
                                       
                                    {!! Form::close() !!}

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            
                            {{-- Button for creation --}}
                            <div class="float-right">
                                {!! Form::submit(__('backoffice/partners.createUser'),  ['type' => 'button', 'class' => 'btn btn-primary btn-sm float-right', 
                                                                                         'data-toggle' => 'modal', 'data-target' => '#modal-lg']) !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="callout callout-info">
                        <i class="far fa-frown"></i>
                        {{ __('backoffice/partners.noData') }} <a href="#" data-toggle="modal" data-target="#modal-lg"> {{ __('backoffice/partners.clickAddData') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal de pré-registo --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('backoffice/partners.modalCreate.modalTitle') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 'route' => 'partner.store', 'method' => 'post' ]) !!}
                        @csrf
                        <div class="form-group row">
                            {!! Form::label('company_name', __('backoffice/partners.modalCreate.company'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('company_name', null,  ['class' => 'form-control', 'required', 'placeholder' =>  __('backoffice/partners.modalCreate.company') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('name', __('backoffice/partners.modalCreate.responsible'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>  __('backoffice/partners.modalCreate.responsible') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', __('backoffice/partners.modalCreate.email'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' =>  __('backoffice/partners.modalCreate.email') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('category_id', __('backoffice/partners.modalCreate.category'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {{-- @if (count($partnerCategories) > 0)
                                    {!! Form::select('category_id', $partnerCategories->pluck('name', 'id'), null, ['placeholder' => __('backoffice/partners.modalCreate.category'), 'class' => 'form-control', 'required']) !!}
                                @endif --}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    </div>

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
        
        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".openDeleteDialog", function () {
            var partnerId = $(this).data('partner-id');
            var action = `/admin/partner/${partnerId}`;
            $('#formDelete').attr('action', action );
        });

        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();
            var partnerId = $(this).data('partner-id');
            var active = $(this).data('partner-active');
            var action = `/admin/partner/${partnerId}`;
            $('#active').val(active == 1 ? 0 : 1);
            $('#form-update-status').attr('action', action ).submit();
        });
        
    </script>
@endsection