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
                    <li class="breadcrumb-item active"></li>
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
                                            <td>{{ substr($faq->content, strpos($faq->content,'">') + 2, 40) . '...' ?? null}}</td>
                                            <td>{{ !$faq->active ? 'Inativa' : 'Ativa'}}</td>
                                            <td>
                                                <a class="mr-1 updateStatus" href="#" 
                                                    data-faq-id="{{ $faq->id }}"
                                                    data-faq-title="{{ $faq->title }}"
                                                    data-faq-content="{{ $faq->content }}"
                                                    data-faq-status="{{ $faq->active }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="{{ route('deliveryman.edit', ['deliveryman' => $faq] ) }}">
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
                                        
                                        {{-- @if (is_null($delMan->approved_at))
                                            <input type="hidden" name="approved_at" value="{{date('Y/m/d H:i:s')}}">
                                        @endif --}}
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
                            {{-- <a href="{{ route('deliveryman.create') }}" class="btn btn-primary btn-sm float-right"> Criar registo</a> --}}
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
@endsection

@section('jquery')
    <script type="text/javascript">
        
        // Seta action do modal de confirmação de remoção de utilizador
        // $(document).on("click", ".openDeleteDialog", function () {
        //     var delManId = $(this).data('delman-id');
        //     var action = `/admin/deliveryman/${delManId}`;
        //     $('#formDelete').attr('action', action );
        // });

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
        
    </script>
@endsection