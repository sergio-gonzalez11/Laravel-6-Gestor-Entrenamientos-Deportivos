@extends('layouts.app')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px;
        /* margin: 30px 0; */
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        font-size: 15px;
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-height: 45px;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title select {
        border-color: #ddd;
        border-width: 0 0 1px 0;
        padding: 3px 10px 3px 5px;
        margin: 0 5px;
    }

    .table-title .show-entries {
        margin-top: 7px;
    }

    .search-box {
        position: relative;
        float: right;
    }

    .search-box .input-group {
        min-width: 200px;
        position: absolute;
        right: 0;
    }

    .search-box .input-group-addon,
    .search-box input {
        border-color: #ddd;
        border-radius: 0;
    }

    .search-box .input-group-addon {
        border: none;
        border: none;
        background: transparent;
        position: absolute;
        z-index: 9;
    }

    .search-box input {
        height: 34px;
        padding-left: 28px;
        box-shadow: none !important;
        border-width: 0 0 1px 0;
    }

    .search-box input:focus {
        border-color: #3FBAE4;
    }

    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 2px;
        left: -10px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child {
        width: 130px;
    }

    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }

    table.table td a.view {
        color: #03A9F4;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }

    table.table td i {
        font-size: 19px;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }


    /* .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        padding: 0 10px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    } 

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    } */

</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        // Animate select box length
        var searchInput = $(".search-box input");
        var inputGroup = $(".search-box .input-group");
        var boxWidth = inputGroup.width();
        searchInput.focus(function () {
            inputGroup.animate({
                width: "300"
            });
        }).blur(function () {
            inputGroup.animate({
                width: boxWidth
            });
        });
    });

</script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span
                        aria-hidden="true">x</span></button>
                {{ Session::get('mensaje') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="text-center">Gestión de <b>Entrenamientos</b></h2>
                </div>
                <div class="col-sm-4">
                    <div class="search-box">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>nº</th>
                    <th>Entrenamiento</th>
                    <th>Ejercicio</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrenamiento as $dato)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dato->tipo_entrenamiento }}</td>
                    <td>{{ $dato->nombre_ejercicio }}</td>
                    <td>{{ $dato->descripcion }}</td>
                    <td><img class=" img-fluid" src="{{ asset('storage'). '/' .$dato->foto }}" alt="card image"></td>
                    <td>
                        <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                class="material-icons">&#xE417;</i></a>

                        <a href="{{ route('entrenamiento.edit', $dato->id) }}" class="edit" title="Edit"
                            data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <!-- <form action="{{ route('entrenamiento.destroy', $dato->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Estas seguro de borrar este empleado?')"
                                class="btn btn-danger" type="submit">Borrar</button>
                        </form> -->
                        <a href="{{ route('entrenamiento.destroy', $dato->id) }}" class="delete" title="Delete"
                            data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $entrenamiento->links() }}

    </div>
</div>
@endsection
