@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/partners.partners') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/partners.partners') }}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (isset($partners) && count($partners) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('backoffice/partners.prePartnerList') }}</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('backoffice/partners.id') }}</th>
                                        <th>{{ __('backoffice/partners.company') }}</th>
                                        <th>{{ __('backoffice/partners.responsible') }}</th>
                                        <th>{{ __('backoffice/partners.email') }}</th>
                                        <th>{{ __('backoffice/partners.mobilePhoneNumber') }}</th>
                                        <th>{{ __('backoffice/partners.status') }}</th>
                                        <th>{{ __('backoffice/partners.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>{{ $partner->id ?? null}}</td>
                                            <td>{{ $partner->company_name ?? null}}</td>
                                            <td>{{ $partner->name ?? null}}</td>
                                            <td>{{ $partner->email ?? null}}</td>
                                            <td>{{ $partner->mobile_phone_number ?? null}}</td>
                                            <td>{{ !$partner->active ? __('backoffice/partners.active') : __('backoffice/partners.inactive') }}</td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" data-partner-id="{{ $partner->id }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                
                                                <a href="{{ route('partner.edit', ['partner' => $partner] ) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a class="ml-1 openDeleteDialog" href="#" data-partner-id="{{ $partner->id }}" 
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
                                            
                                            @if (is_null($partner->approved_at))
                                                <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                            @endif
                                            <input type="hidden" name="active" value="1">
                                        </form>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg">
                                {{ __('backoffice/partners.createUser') }}
                            </button>
                            {{-- <a href="{{ route('partner.create') }}" class="btn btn-primary btn-sm float-right"> Criar registo</a> --}}
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
                    <form class="form-horizontal" id="formCreation" method="POST" action="{{ route('partner.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="company_name" class="col-sm-2 col-form-label">{{ __('backoffice/partners.modalCreate.company') }}</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="company_name" name="company_name" placeholder="{{ __('backoffice/partners.modalCreate.company') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('backoffice/partners.modalCreate.responsible') }}</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="name" name="name" placeholder="{{ __('backoffice/partners.modalCreate.responsible') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">{{ __('backoffice/partners.modalCreate.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" required class="form-control" id="email" name="email" placeholder="{{ __('backoffice/partners.modalCreate.email') }}" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">{{ __('backoffice/partners.modalCreate.category') }}</label>
                            <div class="col-sm-10">
                                <select required class="form-control" id="category_id" name="category_id">
                                    @if (isset($partnerCategories) && count($partnerCategories) > 0)
                                        <option selected value="0"> {{ __('backoffice/partners.modalCreate.selectCategory') }} </option>
                                        @foreach ($partnerCategories as $category)
                                            <option value="{{ $category->id}}"> {{ $category->name}} </option>
                                        @endforeach
                                    @else
                                        <option selected value="0"> {{ __('backoffice/partners.modalCreate.noCategory') }} </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('backoffice/partners.modalCreate.close') }}</button>
                    <button type="submit" class="btn btn-primary" form="formCreation">{{ __('backoffice/partners.modalCreate.create') }}</button>
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
                    <form class="form-horizontal" id="formDelete" method="POST" action="{{-- route('partner.destroy', ['partner' => $partner] ) --}}">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('backoffice/partners.modalRemove.close') }}</button>
                    <button type="submit" class="btn btn-danger" form="formDelete">{{ __('backoffice/partners.modalRemove.remove') }}</button>
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
            var action = `/admin/partner/${partnerId}`;
            $('#form-update-status').attr('action', action ).submit();
        });
        
    </script>
@endsection