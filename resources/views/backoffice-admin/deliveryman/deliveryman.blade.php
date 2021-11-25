@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        {{-- Breadcrumbs --}}
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/deliverymen.deliverymen') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/deliverymen.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/deliverymen.deliverymen') }}</li>
                </ol>
            </div>
        </div>
        
        {{-- Show errors --}}
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
                @if (isset($deliveryMen) && count($deliveryMen) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('backoffice/deliverymen.preDeliverymenList') }}</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('backoffice/deliverymen.id') }}</th>
                                        <th>{{ __('backoffice/deliverymen.name') }}</th>
                                        <th>{{ __('backoffice/deliverymen.email') }}</th>
                                        <th>{{ __('backoffice/deliverymen.mobilePhoneNumber') }}</th>
                                        <th>{{ __('backoffice/deliverymen.status') }}</th>
                                        <th>{{ __('backoffice/deliverymen.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deliveryMen as $delMan)
                                        <tr>
                                            <td>{{ $delMan->id ?? null}}</td>
                                            <td>{{ $delMan->name ?? null}}</td>
                                            <td>{{ $delMan->email ?? null}}</td>
                                            <td>{{ $delMan->mobile_phone_number ?? null}}</td>
                                            <td>{{ !$delMan->active ? __('backoffice/deliverymen.inactive') : __('backoffice/deliverymen.active') }} </td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" data-delman-id="{{ $delMan->id }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="{{ route('deliveryman.edit', ['deliveryman' => $delMan] ) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a class="ml-1 openDeleteDialog" href="#" data-delman-id="{{ $delMan->id }}" 
                                                    data-toggle="modal" data-target="#modal-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- hidden form for updating status --}}
                                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'form-update-status', 'method' => 'post' ]) !!}
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        
                                        @if (is_null($delMan->approved_at))
                                            {!! Form::hidden('approved_at', date('Y/m/d H:i:s') ) !!}
                                        @endif
                                        {!! Form::hidden('active', 1 ) !!}
                                    {!! Form::close() !!}
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer clearfix">
                            {{-- Pagination --}}
                            <div class="float-left">
                                {{ $deliveryMen->links() }}
                            </div>
                            {{-- Button for creation --}}
                            <div class="float-right">
                                {!! Form::submit(__('backoffice/deliverymen.createUser'),  ['type' => 'button', 'class' => 'btn btn-primary btn-sm float-right', 
                                                                                            'data-toggle' => 'modal', 'data-target' => '#modal-lg']) !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="callout callout-info">
                        <i class="far fa-frown"></i>
                        {{ __('backoffice/deliverymen.noData') }} <a href="#" data-toggle="modal" data-target="#modal-lg">{{ __('backoffice/deliverymen.clickAddData') }}</a>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

    {{-- Modal de précadastro --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('backoffice/deliverymen.modalCreate.modalTitle') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formCreation', 'route' => 'deliveryman.store', 'method' => 'post' ]) !!}
                        @csrf
                        <div class="form-group row">
                            {!! Form::label('name', __('backoffice/deliverymen.modalCreate.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', $deliveryman->name ?? null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.name') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', __('backoffice/deliverymen.modalCreate.email'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('email', $deliveryman->email ?? null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.email')] ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('mobile_phone_number', __('backoffice/deliverymen.modalCreate.mobilePhoneNumber'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('mobile_phone_number', $deliveryman->email ?? null, ['class' => 'form-control', 'required', 'placeholder' => __('backoffice/deliverymen.modalCreate.mobilePhoneNumber')]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/deliverymen.modalCreate.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/deliverymen.modalCreate.create'), ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formCreation']) !!}
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
                    <p>{{ __('backoffice/deliverymen.modalRemove.modalTitle') }}</p>
                    
                    {!! Form::open(['class' => 'form-horizontal',  'id' => 'formDelete', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/deliverymen.modalRemove.remove'), ['type' => 'submit', 'class' => 'btn btn-danger' , 'form' => 'formDelete'   ]) !!}
                </div>
            </div>
        </div>
    </div>

@endsection
    
@section('jquery')
    <script type="text/javascript">
        
        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".openDeleteDialog", function () {
            var delManId = $(this).data('delman-id');
            var action   = `/admin/deliveryman/${delManId}`;
            $('#formDelete').attr('action', action );
        });

        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();
            var delManId = $(this).data('delman-id');
            var action   = `/admin/deliveryman/${delManId}`;
            $('#form-update-status').attr('action', action ).submit();
        });
        
    </script>
@endsection