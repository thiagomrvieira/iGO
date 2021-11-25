@extends('backoffice-admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        {{-- Breadcrumbs --}}
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/partners.Category') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">{{ __('backoffice/partners.partners') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/partners.categories') }}</li>
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
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('backoffice/partners.createCategoryCard.cardTitle') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['class' => 'form-horizontal', 'route' => 'category.store', 'method' => 'post' ]) !!}  
                            @csrf
                            <div class="form-group row">
                                {!! Form::label('name',  __('backoffice/partners.createCategoryCard.name'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('backoffice/partners.createCategoryCard.categoryName'), 'required' ]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('parent_id', 'Categoria pai', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('parent_id', $partnerCategories->where('parent_id', null)->pluck('name', 'id'), null, 
                                                    ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'Seleciona uma categoria']) !!}
                                </div> 
                            </div>
                        
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        {!! Form::checkbox('isMain', null, true,   ['class' => 'form-check-input', 'id' => 'isMain']) !!}
                                        {!! Form::label('active',  'É principal',  ['class' => 'form-check-label']) !!}
                                    </div>
                                </div>
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        {!! Form::checkbox('active', null, false, ['class' => 'form-check-input']) !!}
                                        {!! Form::label('active',  __('backoffice/partners.createCategoryCard.activeContent'),  ['class' => 'form-check-label']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    {!! Form::submit(__('backoffice/partners.createCategoryCard.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('backoffice/partners.categoryListCard.cardTitle') }}</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            
                            @if (isset($partnerCategories) && count($partnerCategories) > 0)
                                <thead>
                                    <tr>
                                        <th>{{ __('backoffice/partners.categoryListCard.id')          }}</th>
                                        <th>{{ __('backoffice/partners.categoryListCard.name')        }}</th>
                                        <th>{{ 'Categoria pai' }}</th>
                                        <th>{{ __('backoffice/partners.categoryListCard.status')      }}</th>
                                        <th>{{ __('backoffice/partners.categoryListCard.actions')     }}</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @foreach ($partnerCategories as $category)
                                    <tr>
                                        <td>{{ $category->id ?? null}}</td>
                                        <td>{{ $category->name ?? null}}</td>
                                        <td>{!! $category->parent->name ?? '<b>É principal</b>'!!}</td>
                                        <td>{{ !$category->active ?
                                                __('backoffice/partners.categoryListCard.inactive') : 
                                                __('backoffice/partners.categoryListCard.active'  ) 
                                            }}
                                        </td>
                                        <td>
                                            <a class="mr-1 updateStatus" href="#" 
                                                data-category-id="{{ $category->id }}" 
                                                data-category-status="{{ $category->active }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a class="ml-1 openDeleteDialog" href="#" data-category-id="{{ $category->id }}" 
                                                data-toggle="modal"  data-target="#modal-confirm">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            {{-- hidden form for updating status --}}
                            {!! Form::open(['class' => 'form-horizontal', 'id' => 'form-update-status', 'method' => 'post' ]) !!}  
                                @csrf
                                {{ method_field('PATCH') }}
                                {!! Form::hidden('active', null, ['id' => 'update-active'] ) !!} 
                            {!! Form::close() !!}

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">

                    </div>
                </div>
               
            </div>
        </div>
    </div>

    
    {{-- Modal de confirmação de remoção --}}
    <div class="modal fade" id="modal-confirm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>{{ __('backoffice/partners.modalRemove.modalTitle') }}</p>
                    {{-- <form class="form-horizontal" id="formDelete" method="POST" action="route('partner.destroy', ['partner' => $partner] )"> --}}
                    {!! Form::open(['class' => 'form-horizontal', 'id' => 'formDelete', 'method' => 'post' ]) !!}  
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}
                    </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/partners.modalRemove.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/partners.modalRemove.remove'), ['type' => 'submit', 'class' => 'btn btn-danger',  'form' => 'formDelete']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection
    
@section('jquery')
    <script type="text/javascript">
        
        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".openDeleteDialog", function () {
            var categoryId = $(this).data('category-id');
            var action = `/admin/category/${categoryId}`;
            $('#formDelete').attr('action', action );
        });

        // Seta action do modal de confirmação de remoção de utilizador
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();
            
            var categoryId = $(this).data('category-id');
            var categoryStatus = $(this).data('category-status');
            var action = `/admin/category/${categoryId}`;

            // Altera o valor do input
            categoryStatus == 1 ? $('#update-active').val(0) : $('#update-active').val(1);

            $('#form-update-status').attr('action', action ).submit();
        });
        
        // Ativa o select para seleção de categoria pai
        $(document).on("click", "#isMain", function () {
            if ($('#isMain').is(":checked")) {
                $('#parent_id').attr('disabled', 'disabled');
            }else {
                $('#parent_id').removeAttr('disabled');
            }
        });
    </script>
@endsection