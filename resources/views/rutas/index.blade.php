@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Rutas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Rutas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('rutas.create') }}" class="btn btn-success">Nuevas Rutas</a>
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
                                        <th>Fecha de Salida</th>
                                        <th>Hora de Salida</th>
                                        <th>Costo</th>
                                        <th>Destino</th>
                                        <th>Bus</th>
                                        <th class="text-center">Asientos</th>
                                        <th class="text-center">Chofer</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr class="gradeX">
                                            <td>{{ $ruta->id }}</td>
                                            <td>{{ $ruta->fecha_salida }}</td>
                                            <td>{{ $ruta->hora_salida }}</td>
                                            <td>{{ $ruta->costo }}</td>
                                            <td>{{ $ruta->destino->nombre }}</td>
                                            <td>{{ $ruta->bus->placa }}</td>
                                            <td class="text-center"><a class="btn btn-dark btn-sm"
                                                    href="{{ route('reservas.show_detalle', $ruta->id) }}"><i
                                                        class="fa fa-eye"></i></a> </td>
                                            <td>{{ $ruta->chofer->nombre ?? "Chofer no asignado" }}</td>            
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
