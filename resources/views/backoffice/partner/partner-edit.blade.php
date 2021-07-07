@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
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
                                src="{{ asset('assets-backoffice/dist/img/burger.jpg')}}"
                                alt="User profile picture">
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
                        @if ($partner->active == false)
                            <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                @if (is_null($partner->approved_at))
                                    <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                @endif

                                <input type="hidden" name="active" value="1">
                                <button type="submit"class="btn btn-primary btn-block"><b>{{ __('backoffice/partners.activeAccount') }}</b></button>
                            </form>
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="active" value="0">
                                <button type="submit" class="btn btn-danger btn-block"><b>{{ __('backoffice/partners.deactiveAccount') }}</b></button>
                            </form>
                        @endif
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
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    
                                    <div class="form-group row">
                                        <label for="company_name" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.company') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="{{ __('backoffice/partners.companyDataTab.companyName') }}" value="{{ $partner->company_name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.category') }}</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="category_id" name="category_id">
                                                @if (isset($partnerCategories) && count($partnerCategories) > 0)
                                                    @foreach ($partnerCategories as $category)
                                                        <option value="{{ $category->id}}" 
                                                            {{ $partner->category_id == $category->id ? 'selected': ''}}> 
                                                            {{ $category->name}} 
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option disabled selected value="0"> {{ __('backoffice/partners.companyDataTab.noCategories') }} </option>
                                                @endif
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.responsible') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('backoffice/partners.companyDataTab.name') }}" value="{{ $partner->name ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.email') }}</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('backoffice/partners.companyDataTab.email') }}" value="{{ $partner->email ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.phone') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="345 567 678" value="{{ $partner->phone_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile_phone_number" class="col-sm-2 col-form-label">{{ __('backoffice/partners.companyDataTab.mobilePhone') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mobile_phone_number" name="mobile_phone_number" placeholder="987 654 321" value="{{ $partner->mobile_phone_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/partners.saveButton') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB DOCUMENTS --}}
                            <div class="tab-pane" id="documents">
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="form-group row">
                                        <label for="tax_number" class="col-sm-2 col-form-label">{{ __('backoffice/partners.docDataTab.taxNumber') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="L123456" value="{{ $partner->tax_number ?? null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/partners.saveButton') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- TAB ADDRESS --}}
                            <div class="tab-pane" id="address">
                                <form class="form-horizontal" method="POST" action="{{ route('partner.update', ['partner' => $partner]) }}">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    {{-- Input de controle para o metodo update --}}
                                    <input type="hidden" name="addressData" value="true">

                                    <div class="form-group row">
                                        <label for="line_1" class="col-sm-2 col-form-label">{{ __('backoffice/partners.addressDataTab.tabTitle') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="line_1" name="line_1" placeholder="{{ __('backoffice/partners.addressDataTab.lineOne') }}" value="{{ $partner->address->line_1 ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="line_2" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="line_2" name="line_2" placeholder="{{ __('backoffice/partners.addressDataTab.lineTwo') }}" value="{{ $partner->address->line_2 ?? null}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="county" class="col-sm-2 col-form-label">{{ __('backoffice/partners.addressDataTab.county') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="county" name="county" placeholder="{{ __('backoffice/partners.addressDataTab.county') }}" value="{{ $partner->address->county ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">{{ __('backoffice/partners.addressDataTab.city') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="{{ __('backoffice/partners.addressDataTab.city') }}" value="{{ $partner->address->city ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="post_code" class="col-sm-2 col-form-label">{{ __('backoffice/partners.addressDataTab.postalCode') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="post_code" name="post_code" placeholder="{{ __('backoffice/partners.addressDataTab.postalCode') }}" value="{{ $partner->address->post_code ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm-2 col-form-label">{{ __('backoffice/partners.addressDataTab.country') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="country" name="country" placeholder="{{ __('backoffice/partners.addressDataTab.country') }}" value="{{ $partner->address->country ?? null}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">{{ __('backoffice/partners.saveButton') }}</button>
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