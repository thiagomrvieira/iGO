@extends('backoffice.layouts.app')

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
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('assets-backoffice/dist/img/deliveryman02.png')}}"
                                alt="User profile picture">
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
                            <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                @if (is_null($deliveryman->approved_at))
                                    <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                @endif

                                <input type="hidden" name="active" value="1">
                                <button type="submit"class="btn btn-primary btn-block"><b>{{ __('backoffice/deliverymen.activeAccount')  }}</b></button>
                            </form>
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="active" value="0">
                                <button type="submit" class="btn btn-danger btn-block"><b>{{ __('backoffice/deliverymen.deactiveAccount')  }}</b></button>
                            </form>
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
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    {{-- Input de controle para o metodo update --}}
                                    <input type="hidden" name="personalData" value="true">

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.personalDataTab.name')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $deliveryman->name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birth_date" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.personalDataTab.birthDate')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $deliveryman->birth_date ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nacionality" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.personalDataTab.nacionality')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nacionality" placeholder="{{ __('backoffice/deliverymen.personalDataTab.nacionality')  }}" name="nacionality" value="{{ $deliveryman->nacionality ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.personalDataTab.email')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('backoffice/deliverymen.personalDataTab.email')  }}" value="{{ $deliveryman->email ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile_phone_number" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.personalDataTab.mobilePhone')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mobile_phone_number" name="mobile_phone_number" placeholder="987 654 321" value="{{ $deliveryman->mobile_phone_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/deliverymen.saveButton')  }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB DOCUMENTS --}}
                            <div class="tab-pane" id="documents">
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="identity_card_number" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.docDataTab.idCardNumber')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="identity_card_number" name="identity_card_number" placeholder="L123456" value="{{ $deliveryman->identity_card_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tax_number" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.docDataTab.taxNumber')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="M98754" value="{{ $deliveryman->tax_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_insurance_number" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.docDataTab.socialInsurance')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="social_insurance_number" name="social_insurance_number" placeholder="654987" value="{{ $deliveryman->social_insurance_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="driving_license_name" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.docDataTab.drivingLicense')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="driving_license_name" name="driving_license_name" placeholder="{{ __('backoffice/deliverymen.docDataTab.name')  }}" value="{{ $deliveryman->driving_license_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="driving_license_number" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="driving_license_number" name="driving_license_number" placeholder="{{ __('backoffice/deliverymen.docDataTab.number')  }}" value="{{ $deliveryman->driving_license_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank_account_name" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.docDataTab.bankAccount')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bank_account_name"  name="bank_account_name" placeholder="{{ __('backoffice/deliverymen.docDataTab.name')  }}" value="{{ $deliveryman->bank_account_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank_account_number" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="{{ __('backoffice/deliverymen.docDataTab.number')  }}" value="{{ $deliveryman->bank_account_number ?? null}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/deliverymen.saveButton')  }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB ADDRESS --}}
                            <div class="tab-pane" id="address">
                                <form class="form-horizontal" method="POST" action="{{ route('deliveryman.update', ['deliveryman' => $deliveryman]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    {{-- Input de controle para o metodo update --}}
                                    <input type="hidden" name="addressData" value="true">

                                    <div class="form-group row">
                                        <label for="line_1" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.addressDataTab.address')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="line_1" name="line_1" placeholder="{{ __('backoffice/deliverymen.addressDataTab.lineOne')  }}" value="{{ $deliveryman->address->line_1 ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="line_2" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="line_2" name="line_2" placeholder="{{ __('backoffice/deliverymen.addressDataTab.lineTwo')  }}" value="{{ $deliveryman->address->line_2 ?? null}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="county" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.addressDataTab.county')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="county" name="county" placeholder="{{ __('backoffice/deliverymen.addressDataTab.county')  }}" value="{{ $deliveryman->address->county ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.addressDataTab.city')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="{{ __('backoffice/deliverymen.addressDataTab.city')  }}" value="{{ $deliveryman->address->city ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="post_code" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.addressDataTab.postalCode')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="post_code" name="post_code" placeholder="{{ __('backoffice/deliverymen.addressDataTab.postalCode')  }}" value="{{ $deliveryman->address->post_code ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm-2 col-form-label">{{ __('backoffice/deliverymen.addressDataTab.country')  }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="country" name="country" placeholder="{{ __('backoffice/deliverymen.addressDataTab.country')  }}" value="{{ $deliveryman->address->country ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/deliverymen.saveButton')  }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection