@extends('backoffice-partner.layouts.app')

@php
    if(Auth::user()->partner) {
        $partner = Auth::user()->partner;
    
        // $partnerTest = App\Models\Partner::where('id', Auth::user()->partner->id)->get();
    }
@endphp

{{-- @dump($partner->subCategories) --}}
{{-- @dump($partner->mainCategory->name) --}}

@section('navbar')
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand float-left pl-3" href="#">
            <h3>iGO</h3>
        </a>
        <a class="navbar-brand float-right" href="#">
            <small>{{ $partner->company_name ?? null}} </small>
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets-backoffice/dist/img/store.png')}}"
                alt="User profile picture" width="45px">
        </a>
    </nav>
@endsection

@section('content')
<div class="container">
    
    <h4>Business data</h4>
    {!! Form::open(['class' => '',  'id' => 'formBusinessData', 'route' => 'partner.storeBusiness.data', 'method' => 'post']) !!}
        @csrf
        <div class="accordion" id="accordionBusinessData">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <strong>Categoria:</strong> &nbsp; {{$partner->mainCategory->name}}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionBusinessData">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Subcategorias*
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBusinessData">
                    <div class="accordion-body">
                        @foreach ($categories as $category)
                            <div class="form-check">
                                {!! Form::checkbox($category->slug, null, ['class' => 'form-check-input']) !!}
                                {!! Form::label($category->slug, $category->name, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Horários*
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionBusinessData">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-4">
                                Dias:
                            </div>
                            <div class="col-8">
                                Horário:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Segunda
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Terça
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Quarta
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Quinta
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Sexta
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Sábado
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Domingo
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="burger">
                                    <label class="form-check-label" for="burger">
                                        Feriados
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Manhã
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Tarde
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="burger">
                                            <label class="form-check-label" for="burger">
                                                Noite
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-10 ">
                                        <div class="form-inline">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            às
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Tempo médio de preparação do pedido*
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionBusinessData">
                    <div class="accordion-body">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">0 - 30 minutos</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">30 - 45 minutos</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">45 - 60 minutos</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Imagens*
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionBusinessData">
                    <div class="accordion-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fotografia capa</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fotografia #1</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fotografia #2</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fotografia #3</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
    {!! Form::submit('Seguinte', ['type' => 'submit', 'class' => 'btn btn-primary' , 'form' => 'formBusinessData'   ]) !!}

</div>
@endsection
