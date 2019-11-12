
@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">x</span></button>
                        {{ Session::get('mensaje') }}	
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Editar Ejercicio</div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br/>
                                @endif

                            <form method="POST" action="{{ route('entrenamiento.update', $entrenamiento->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ @method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de entrenamiento') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tipo_entrenamiento" value="{{ $entrenamiento->tipo_entrenamiento }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del ejercicio') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nombre_ejercicio" value="{{ $entrenamiento->nombre_ejercicio }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" value="{{ $entrenamiento->descripcion }}">{{ $entrenamiento->descripcion }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row" style="padding-left: 255px;">
                                    <img class=" img-fluid" src="{{ asset('storage'). '/' .$entrenamiento->foto }}" alt="card image" style="height: 200px; margin-bottom: 10px;">
                                    <input type="file" class="form-control-file" name="foto" value="{{ $entrenamiento->foto }}">
                                </div> 

                                    <div class="col-md-12 d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Actualizar Ejercicio') }}
                                        </button>
                                        <a href="{{ url('/entrenamiento/show') }}" type="button" class="btn btn-warning btn-lg">
                                        {{ __('Volver') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
@endsection