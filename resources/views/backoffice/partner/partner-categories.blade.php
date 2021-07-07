@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/partners.partnerCategory') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/partners.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">{{ __('backoffice/partners.partners') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/partners.categories') }}</li>

                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('backoffice/partners.createCategoryCard.cardTitle') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('category.store') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">{{ __('backoffice/partners.createCategoryCard.name') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('backoffice/partners.createCategoryCard.categoryName') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">{{ __('backoffice/partners.createCategoryCard.description') }}</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control"></textarea>                                
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="active" name="active"
                                        {{ (isset($content->active) && $content->active == 1) ? 'checked' : null }}>
                                    <label class="form-check-label" for="active">{{ __('backoffice/partners.createCategoryCard.activeContent') }}</label>
                                </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">{{ __('backoffice/partners.createCategoryCard.saveButton') }}</button>
                                </div>
                            </div>
                        </form>
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
                                        <th>{{ __('backoffice/partners.categoryListCard.description') }}</th>
                                        <th>{{ __('backoffice/partners.categoryListCard.status')      }}</th>
                                        <th>{{ __('backoffice/partners.categoryListCard.actions')     }}</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @foreach ($partnerCategories as $category)
                                    <tr>
                                        <td>{{ $category->id ?? null}}</td>
                                        <td>{{ $category->name ?? null}}</td>
                                        <td>{{ $category->description ?? null}}</td>
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
                                            
                                            {{-- <a href="{{ route('category.edit', ['category' => $category] ) }}">
                                                <i class="far fa-edit"></i>
                                            </a> --}}
                                            <a class="ml-1 openDeleteDialog" href="#" data-category-id="{{ $category->id }}" 
                                                data-toggle="modal" 
                                                data-target="#modal-confirm">
                                                
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            {{-- hidden form for updating status --}}
                            <form id="form-update-status" class="form-horizontal" method="POST" action="">
                                @csrf
                                {{ method_field('PATCH') }}
                                
                                <input type="hidden" name="active" id="update-active">
                            </form>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{-- <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg">
                            Criar registo
                        </button> --}}
                        {{-- <a href="{{ route('partner.create') }}" class="btn btn-primary btn-sm float-right"> Criar registo</a> --}}
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
                    <form class="form-horizontal" id="formDelete" method="POST" action="{{-- route('partner.destroy', ['partner' => $partner] ) --}}">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('backoffice/partners.modalRemove.close')  }} </button>
                    <button type="submit" class="btn btn-danger"  form="formDelete">   {{ __('backoffice/partners.modalRemove.remove') }} </button>
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
        
    </script>
@endsection