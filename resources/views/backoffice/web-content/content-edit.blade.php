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
                    <li class="breadcrumb-item active">{{ $content->title ?? null}}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $content->title ?? null}}
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('content.update', ['content' => $content]) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da área" value="{{$content->title ?? null}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Conteúdo</label>
                                <div class="col-sm-10">
                                    <textarea id="summernote" name="content">
                                        {!! $content->content !!}
                                    </textarea>                                
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="active" name="active"
                                        {{ $content->active == 1 ? 'checked' : null }}>
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
    </div>
@endsection