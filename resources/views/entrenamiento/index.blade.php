
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        @foreach ($entrenamiento as $dato)
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../storage/app/public/{{$dato->foto}}" alt="card image"></p>
                                    <h4 class="card-title">Entrenamiento de {{$dato->tipo_entrenamiento}}</h4>
                                    <p class="card-text">{{$dato->nombre_ejercicio}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{$dato->nombre_ejercicio}}</h4>
                                    <p class="card-text">{{$dato->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection