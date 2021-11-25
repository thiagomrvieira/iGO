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
                                        <th style="text-align: center"> Ações   </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($shippingFees as $shipping) 
                                        <tr>
                                            <td> {{ $shipping->id                              ?? null }} </td>
                                            <td> {{ $shipping->from->name                      ?? null }} </td>
                                            <td> {{ $shipping->to->name                        ?? null }} </td>
                                            <td> {{ number_format(($shipping->price / 100), 2) ?? null }} </td>
                                            <td style="text-align: center">
                                                <a class="editShippingFee" href="#" data-toggle="modal" data-target="#modal-md"
                                                    data-shipping-id="{{ $shipping->id }}"
                                                    data-shipping-from="{{ $shipping->from->name }}"
                                                    data-shipping-to="{{ $shipping->to->name }}"
                                                    data-shipping-price="{{ $shipping->price / 100 }}">
                                                    <i class="far fa-edit"></i>
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

    {{-- Modal de edição do valor da taxa de entrega --}}
    <div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alterar valor da entrega</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formShipping', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            {!! Form::label('partner', 'Origem', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('deliveryFrom', null,  ['class' => 'form-control', 'disabled', 'id' => 'deliveryFrom']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product', 'Destino', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('deliveryTo', null,  ['class' => 'form-control', 'disabled', 'id' => 'deliveryTo']) !!}
                            </div>
                        </div>
                        {{-- Price --}}
                        <div class="form-group row">
                            {!! Form::label('label-campaign', 'Valor', ['class' => 'col-sm-2 col-form-label', 'id' => 'label-campaign']) !!}
                            <div class="col-sm-10">
                                {!! Form::number('price', null, ['class' => 'form-control', 'required', 'id' => 'price']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    </div>

                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/partners.modalCreate.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Salvar', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formShipping']) !!}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    

@endsection
    
@section('jquery')
    <script type="text/javascript">
        
        // Seta action do form edição de valores de entrega
        $(document).on("click", ".editShippingFee", function () {
            event.preventDefault();

            var shippingId   = $(this).data('shipping-id');
            var shippingFrom = $(this).data('shipping-from');
            var shippingTo   = $(this).data('shipping-to');
            var price        = $(this).data('shipping-price');
            var action       = `/admin/shippingfee/${shippingId}`;

            $('#deliveryFrom').val(shippingFrom);   
            $('#deliveryTo').val(shippingTo);   
            $('#price').val(parseFloat(price).toFixed(2));   

            $('#formShipping').attr('action', action );
        });

        
    </script>
@endsection