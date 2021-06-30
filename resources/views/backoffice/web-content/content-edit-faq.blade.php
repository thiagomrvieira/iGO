@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editor de conteúdo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Editor de conteúdo</li>
                    <li class="breadcrumb-item active">FAQs</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (isset($content) && count($content) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">FAQs</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Conteúdo</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($content as $faq)
                                        <tr>
                                            <td>{{ $faq->id ?? null}}</td>
                                            <td>{{ $faq->title ?? null}}</td>
                                            {{-- <td>{{ substr($faq->content, strpos($faq->content,'">') + 2, 40) . '...' ?? null}}</td> --}}
                                            <td>
                                                <a class="openEditDialog" href="#"
                                                    data-toggle="modal" data-target="#modal-lg"
                                                    data-faq-id="{{ $faq->id }}"
                                                    data-faq-title="{{ $faq->title }}"
                                                    data-faq-content="{{ $faq->content }}"
                                                    data-faq-status="{{ $faq->active }}">
                                                    Ver conteúdo
                                                </a>
                                            </td>
                                            <td>{{ !$faq->active ? 'Inativo' : 'Ativo'}}</td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" 
                                                    data-faq-id="{{ $faq->id }}"
                                                    data-faq-title="{{ $faq->title }}"
                                                    data-faq-content="{{ $faq->content }}"
                                                    data-faq-status="{{ $faq->active }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a class="openEditDialog" href="#"
                                                    data-toggle="modal" data-target="#modal-lg"
                                                    data-faq-id="{{ $faq->id }}"
                                                    data-faq-title="{{ $faq->title }}"
                                                    data-faq-content="{{ $faq->content }}"
                                                    data-faq-status="{{ $faq->active }}">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <a class="ml-1 openDeleteDialog" href="#" data-faq-id="{{ $faq->id }}" 
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
                                        <input type="hidden" name="active"  id="statusUpdate">
                                        <input type="hidden" name="title"   id="titleUpdate">
                                        <input type="hidden" name="content" id="contentUpdate">
                                    </form>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg">
                                Criar registo
                            </button>
                        </div>
                    </div>
                @else
                    <div class="callout callout-info">
                        <i class="far fa-frown"></i>
                        Parece que não temos o que exibir por aqui. <a href="#" data-toggle="modal" data-target="#modal-lg"> Clique para criar um novo item de FAQ</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    {{-- Modal de criação de conteúdo --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FAQs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formCreation" method="POST" action="{{ route('content.store') }}">
                        @csrf
                        
                        <input type="hidden" name="content_area" value="{{$content_area ?? null}}">

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="titleEdit" name="title" placeholder="Título da área" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Conteúdo</label>
                            <div class="col-sm-10">
                                <textarea id="summernote" name="content">
                                    
                                </textarea>                                
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="statusEdit" name="active">
                                <label class="form-check-label" for="active">Conteúdo ativo</label>
                            </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" form="formCreation">Criar</button>
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
                    <p>Deseja remover este conteúdo?</p>
                    <form class="form-horizontal" id="formDelete" method="POST" action="">
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
        
        // Seta action do modal de confirmação de remoção de FAQ
        $(document).on("click", ".openDeleteDialog", function () {
            var faqId = $(this).data('faq-id');
            var action = `/admin/content/${faqId}`;
            $('#formDelete').attr('action', action );
        });

        // Atualiza o status do FAQ
        $(document).on("click", ".updateStatus", function () {
            event.preventDefault();
            var faqId = $(this).data('faq-id');
            var faqTitle = $(this).data('faq-title');
            var faqContent = $(this).data('faq-content');
            var faqStatus = $(this).data('faq-status') == 1 ? 'off' : 'on';

            var action = `/admin/content/${faqId}`;

            $('#titleUpdate').val(faqTitle);
            $('#contentUpdate').val(faqContent);
            $('#statusUpdate').val(faqStatus);
            $('#form-update-status').attr('action', action ).submit();
        });

        // Carrega conteúdo e seta action do modal edição de FAQ
        $(document).on("click", ".openEditDialog", function () {
            var faqId = $(this).data('faq-id');
            var faqTitle = $(this).data('faq-title');
            var faqContent = $(this).data('faq-content');
            var faqStatus = $(this).data('faq-status') == 1 ? true : false;
            var action = `/admin/content/${faqId}`;

            $('#titleEdit').val(faqTitle);
            $('#summernote').summernote('pasteHTML', faqContent);

            (faqStatus == true) ? $('#statusEdit').prop('checked', true) : $('#statusEdit').removeAttr('checked');
            
            $('#formCreation').attr('action', action );
            $('#formCreation').append('{{ method_field("PATCH") }}');    


        });

        // Limpa dados do modal
        $('#modal-lg').on('hidden.bs.modal', function () {
            $('#summernote').summernote('reset');
            $(this).find('form').trigger('reset');
            $(this).removeData();
        })
        
    </script>
@endsection