@extends('backoffice.layouts.app')

@section('content-header')
    <div class="container-fluid">
        {{-- Breadcrumbs --}}
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('backoffice/webContent.contentEditor')  }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('backoffice/webContent.home')  }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backoffice/webContent.contentEditor')  }}</li>
                    <li class="breadcrumb-item active">{{ $content->title ?? null}}</li>
                </ol>
            </div>
        </div>

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
                        <h3 class="card-title float-left">
                            {{ $content->title ?? null}}
                        </h3>
                        <ul class="nav nav-pills float-right">
                            <li class="nav-item btn-xs"><a class="nav-link active" href="#portuguese"  data-toggle="tab"> PT </a> </li>
                            <li class="nav-item btn-xs"><a class="nav-link"        href="#english" data-toggle="tab"> EN </a> </li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            
                            {{-- TAB PORTUGUESE --}}
                            <div class="active tab-pane" id="portuguese">
                                @if (isset($content))
                                    {!! Form::open(['class' => 'form-horizontal', 'route' => array('content.update', ['content' => $content]), 'method' => 'post' ]) !!}
                                        {{ method_field('PATCH') }}
                                @else
                                    {!! Form::open(['class' => 'form-horizontal', 'route' => 'content.store', 'method' => 'post' ]) !!}
                                @endif
                                    @csrf
                                    {!! Form::hidden('content_area', $content_area ?? null ) !!}
                                    {!! Form::hidden('language', 'pt' ) !!}

                                    <div class="form-group row">
                                        {!! Form::label('title',  __('backoffice/webContent.title'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('title', isset($content) ? 
                                                                        $content->translate('pt')->title ?? null : 
                                                                        null, 
                                                            ['class' => 'form-control', 'placeholder' =>  __('backoffice/webContent.areaTitle') ]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        {!! Form::label('content',  __('backoffice/webContent.content'),  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::textarea('content', isset($content) ?  
                                                                            $content->translate('pt')->content ?? null : 
                                                                            null, 
                                                                ['class' => 'form-control summernote', 'placeholder' =>  __('backoffice/webContent.areaTitle') ]) !!}
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                                {!! Form::checkbox('active', null, isset($content) ? 
                                                                                      ($content->translate('pt')->active && $content->translate('pt')->active == 1) ? 'checked' : false : 
                                                                                      null, 
                                                                    ['class' => 'form-check-input']) !!}
                                                {!! Form::label('active',  __('backoffice/partners.createCategoryCard.activeContent'),  ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {!! Form::submit(__('backoffice/webContent.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                            
                            {{-- TAB ENGLISH --}}
                            <div class="tab-pane" id="english">
                                @if (isset($content))
                                    {!! Form::open(['class' => 'form-horizontal', 'route' => array('content.update', ['content' => $content]), 'method' => 'post' ]) !!}
                                        {{ method_field('PATCH') }}
                                @else
                                    {!! Form::open(['class' => 'form-horizontal', 'route' => 'content.store', 'method' => 'post' ]) !!}
                                @endif
                                    @csrf
                                    {!! Form::hidden('content_area', $content_area ?? null ) !!}
                                    {!! Form::hidden('language', 'en' ) !!}

                                    <div class="form-group row">
                                        {{-- {!! Form::label('title',  __('backoffice/webContent.title'),  ['class' => 'col-sm-2 col-form-label']) !!} --}}
                                        {!! Form::label('title',  'Title',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('title', isset($content) ?
                                                                        $content->translate('en')->title ?? null :
                                                                        null,
                                                                    ['class' => 'form-control', 'placeholder' =>  __('backoffice/webContent.areaTitle') ]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        {!! Form::label('content',  'Content',  ['class' => 'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::textarea('content', isset($content) ?
                                                                            $content->translate('en')->content ?? null : 
                                                                            null,
                                                                ['class' => 'form-control summernote', 'placeholder' =>  __('backoffice/webContent.areaTitle') ]) !!}
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                                {!! Form::checkbox('active', null, isset($content) ?
                                                                                        $content->translate('en')->active && $content->translate('en')->active == 1 ? 'checked' : false :
                                                                                        null, 
                                                                    ['class' => 'form-check-input']) !!}
                                                {!! Form::label('active',  'Active content',  ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            {{-- {!! Form::submit(__('backoffice/webContent.saveButton'), ['type' => 'submit', 'class' => 'btn btn-danger']) !!} --}}
                                            {!! Form::submit('Save', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
@endsection