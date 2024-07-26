@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Rutas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Destinos</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('destinos.create') }}" class="btn btn-success">Nuevo Destino</a>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destinos as $destino)
                                        <tr class="gradeX">
                                            <td>{{ $destino->id }}</td>
                                            <td><img style="width=50px; height: 50px;" src="{{ asset('img/river.png') }}"
                                                alt=""></td>
                                            <td>{{ $destino->nombre }}</td>
                                            <td>{{ $destino->estado }}</td>
                                            <td>{{ $destino->latitud }}</td>
                                            <td>{{ $destino->longitud }}</td>
                                            <td><a class="btn btn-info btn-sm" href=""><i
                                                        class="fa fa-pencil-square-o"></i></a> <a
                                                    class="btn btn-danger btn-sm" href=""><i
                                                        class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection