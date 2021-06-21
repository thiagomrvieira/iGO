@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categoria de Aderentes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">Aderentes</a></li>
                    <li class="breadcrumb-item active">Categorias</li>

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
                            Criar categoria
                        </h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('category.store') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome da categoria">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control"></textarea>                                
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="active" name="active"
                                        {{ (isset($content->active) && $content->active == 1) ? 'checked' : null }}>
                                    <label class="form-check-label" for="active">Conteúdo ativo</label>
                                </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Salvar</button>
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
                        <h3 class="card-title">Lista categoria de aderentes</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            
                            @if (isset($partnerCategories) && count($partnerCategories) > 0)
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @foreach ($partnerCategories as $category)
                                    <tr>
                                        <td>{{ $category->id ?? null}}</td>
                                        <td>{{ $category->name ?? null}}</td>
                                        <td>{{ $category->description ?? null}}</td>
                                        <td>{{ !$category->active ? 'Inativa' : 'Ativa'}}</td>
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
                    <p>Deseja remover esta categoria?</p>
                    <form class="form-horizontal" id="formDelete" method="POST" action="{{-- route('partner.destroy', ['partner' => $partner] ) --}}">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" form="formDelete">Remover</button>
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