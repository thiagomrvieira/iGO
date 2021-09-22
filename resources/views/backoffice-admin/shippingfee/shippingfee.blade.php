@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Taxas de entrega</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item active"> Taxas de entrega </li>
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
                @if (isset($shippingFees) && $shippingFees->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Lista de Taxas de entrega </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th> ID      </th>
                                        <th> Origem  </th>
                                        <th> Destino </th>
                                        <th> Valor   </th>
                                        <th> Ações   </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($shippingFees as $shipping) 
                                        <tr>
                                            <td> {{ $shipping->id         ?? null }} </td>
                                            <td> {{ $shipping->from->name ?? null }} </td>
                                            <td> {{ $shipping->to->name   ?? null }} </td>
                                            <td> {{ $shipping->price      ?? null }} </td>
                                            <td>
                                                <a class="ml-1 openDeleteDialog" href="#" 
                                                    data-toggle="modal"  data-target="#modal-confirm"
                                                    data-shipping-id="{{ $shipping->id }}" >
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        SEM TAXAS DE ENTREGA                                        
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
                           {{-- Footer --}}
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

    {{-- Modal de ativação de estaque --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ativar destaque</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formFeatured', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            {!! Form::label('partner', 'Parceiro', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('partner', null,  ['class' => 'form-control', 'disabled' ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product', 'Produto', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('product', null,  ['class' => 'form-control', 'disabled' ]) !!}
                            </div>
                        </div>
                         {{-- Start and Finish date --}}
                         <div class="form-group row">
                            {!! Form::label('label-campaign', 'Validade', ['class' => 'col-sm-2 col-form-label', 'id' => 'label-campaign']) !!}
                            <div class="col-sm-5">
                                {!! Form::date('start_date', null, ['class' => 'form-control', 'required', 'id' => 'start_date']) !!}
                            </div>
                            <div class="col-sm-5">
                                {!! Form::date('finish_date', null, ['class' => 'form-control', 'required', 'id' => 'finish_date']) !!}
                            </div>
                            {!! Form::hidden('active', 1) !!}

                        </div>
                        
                    {!! Form::close() !!}
                    </div>

                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/partners.modalCreate.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/partners.modalCreate.create'), ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formFeatured']) !!}
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
        
        // Seta action do modal de confirmação de remoção do featured
        $(document).on("click", ".openDeleteDialog", function () {
            var featuredId = $(this).data('featured-id');
            var action     = `/admin/featured/${featuredId}`;

            $('#formDelete').attr('action', action );
        });

        // Seta action do form de update de status de featured
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();

            var partner    = $(this).data('featured-partner');
            var product    = $(this).data('featured-product');
            var startDate  = $(this).data('featured-start' );
            var finishDate = $(this).data('featured-finish');
            var featuredId = $(this).data('featured-id');
            var action     = `/admin/featured/${featuredId}`;
            
            $('#partner').val(partner);
            $('#product').val(product);

            $('#start_date').val(startDate   != '1970-01-01' ? startDate  : null);   
            $('#finish_date').val(finishDate != '1970-01-01' ? finishDate : null);   

            $('#active').val(1);

            $('#formFeatured').attr('action', action );
        });

        
    </script>
@endsection