@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
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
                                            <td>{{ !$delMan->active ? __('backoffice/deliverymen.active') : __('backoffice/deliverymen.inactive') }} </td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" data-delman-id="{{ $delMan->id }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                
                                                <a href="{{ route('deliveryman.edit', ['deliveryman' => $delMan] ) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a class="ml-1 openDeleteDialog" href="#" data-delman-id="{{ $delMan->id }}" 
                                                    data-toggle="modal" 
                                                    data-target="#modal-confirm">
                                                    
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach

                                        {{-- hidden form for updating status --}}
                                        <form id="form-update-status" class="form-horizontal" method="POST" action="">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            
                                            @if (is_null($delMan->approved_at))
                                                <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                            @endif
                                            <input type="hidden" name="active" value="1">
                                        </form>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg">
                                {{ __('backoffice/deliverymen.createUser') }}
                            </button>
                            {{-- <a href="{{ route('deliveryman.create') }}" class="btn btn-primary btn-sm float-right"> Criar registo</a> --}}
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
                    <form class="form-horizontal" id="formCreation" method="POST" action="{{ route('deliveryman.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.modalCreate.name') }}</label>
                            <div class="col-sm-10">
                                <input  type="text" required class="form-control" id="name" name="name" placeholder="Nome" value="{{ $deliveryman->name ?? null}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.modalCreate.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" required class="form-control" id="email" name="email" placeholder="Email" value="{{ $deliveryman->email ?? null}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_phone_number" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.modalCreate.mobilePhoneNumber') }}</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="mobile_phone_number" name="mobile_phone_number" placeholder="987 654 321" value="{{ $deliveryman->mobile_phone_number ?? null}}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('backoffice/deliverymen.modalCreate.close') }}</button>
                    <button type="submit" class="btn btn-primary" form="formCreation">{{ __('backoffice/deliverymen.modalCreate.create') }}</button>
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
                    <form class="form-horizontal" id="formDelete" method="POST" action="{{-- route('deliveryman.destroy', ['deliveryman' => $delMan] ) --}}">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('backoffice/deliverymen.modalRemove.close') }}</button>
                    <button type="submit" class="btn btn-danger" form="formDelete">{{ __('backoffice/deliverymen.modalRemove.remove') }}</button>
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