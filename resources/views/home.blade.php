@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Estas dentro del sistema, {{ Auth::user()->nombre }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                    <tr>
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->nombre}}</td>
                        <td>{{$dato->apellidos}}</td>
                        <td>{{$dato->email}}</td>
                        <td>{{$dato->ciudad}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
