@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/webContent.contentEditor')  }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/webContent.home')  }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/webContent.contentEditor')  }}</li>
                    <li class="breadcrumb-item active">{{ __('backoffice/webContent.contentType.faqs')  }}</li>
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
                            <h3 class="card-title">{{ __('backoffice/webContent.contentType.faqs')  }}</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('backoffice/webContent.id')      }}</th>
                                        <th>{{ __('backoffice/webContent.title')   }}</th>
                                        <th>{{ __('backoffice/webContent.content') }}</th>
                                        <th>{{ __('backoffice/webContent.status')  }}</th>
                                        <th>{{ __('backoffice/webContent.actions') }}</th>
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
                                                    {{ __('backoffice/webContent.seeContent') }}
                                                </a>
                                            </td>
                                            <td>{{ !$faq->active ? 
                                                    __('backoffice/webContent.inactive') : 
                                                    __('backoffice/webContent.active')
                                                }}
                                            </td>
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
                                    {!! Form::open(['id' => 'form-update-status', 'class' => 'form-horizontal', 'method' => 'post']) !!}
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('active',  null, ['id' => 'statusUpdate'])  !!}
                                        {!! Form::hidden('title',   null, ['id' => 'titleUpdate'])   !!}
                                        {!! Form::hidden('content', null, ['id' => 'contentUpdate']) !!}
                                    {!! Form::close() !!}


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {!! Form::submit(__('backoffice/webContent.createFaq'), ['type' => 'button', 'class' => 'btn btn-primary btn-sm float-right',
                                                                                     'data-toggle' => 'modal',  'data-target' => '#modal-lg']) !!}
                        </div>
                    </div>
                @else
                    <div class="callout callout-info">
                        <i class="far fa-frown"></i>
                        {{ __('backoffice/webContent.noData') }} <a href="#" data-toggle="modal" data-target="#modal-lg">{{ __('backoffice/webContent.clickAddData') }}</a>
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
                    <h4 class="modal-title">{{ __('backoffice/webContent.contentType.faqs') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal', 'id' => 'formCreation', 'route' => 'content.store', 'method' => 'post' ]) !!}
                        @csrf
                        {!! Form::hidden('content_area', $content_area ?? null ) !!}
                        <div class="form-group row">
                            {!! Form::label('title',  __('backoffice/webContent.title'),  ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('title', null, ['id' => 'titleEdit', 'class' => 'form-control', 'required', 
                                                               'placeholder' =>  __('backoffice/webContent.title') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('content',  __('backoffice/webContent.content'),  ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('content',  null, ['id' => 'summernote', 'class' => 'form-control', 'placeholder' =>  __('backoffice/webContent.areaTitle') ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <div class="form-check">
                                    {!! Form::checkbox('active', null, false, ['id' => 'statusEdit', 'class' => 'form-check-input']) !!}
                                    {!! Form::label('active',  __('backoffice/partners.createCategoryCard.activeContent'),  ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/webContent.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/webContent.create'), ['type' => 'submit', 'class' => 'btn btn-primary', 'form' => 'formCreation' ]) !!}
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
                    <p>{{ __('backoffice/webContent.modalRemove.modalTitle') }}</p>
                    {!! Form::open(['class' => 'form-horizontal', 'id' => 'formDelete', 'method' => 'post' ]) !!}
                        @csrf
                        {{ method_field('DELETE') }}
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer justify-content-between">
                    {!! Form::submit(__('backoffice/webContent.modalRemove.close'),  ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('backoffice/webContent.modalRemove.remove'),  ['type' => 'submit', 'class' => 'btn btn-danger', 'form' => 'formDelete']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
        // Seta action do modal de confirmação de remoção de FAQ
        $(document).on("click", ".openDeleteDialog", function () {
            var faqId  = $(this).data('faq-id');
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
            var faqId      = $(this).data('faq-id');
            var faqTitle   = $(this).data('faq-title');
            var faqContent = $(this).data('faq-content');
            var faqStatus  = $(this).data('faq-status') == 1 ? true : false;
            var action     = `/admin/content/${faqId}`;

            $('#titleEdit').val(faqTitle);
            $('#summernote').summernote('code', faqContent);

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