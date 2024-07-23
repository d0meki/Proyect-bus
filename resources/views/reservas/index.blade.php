@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Reservas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Reservar pasajes</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('reservas.create') }}" class="btn btn-success">Nueva Reserva</a>
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
                                        <th>Fecha de Reserva</th>
                                        <th>Hora de Reserva</th>
                                        <th>Bus</th>
                                        <th>Destino</th>
                                        <th>Cliente</th>
                                        <th># Asientos reservados</th>
                                        <th>Total a Pagar</th>
                                        @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                                        <th>Opciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr class="gradeX">
                                            <td>{{ $reserva->id }}</td>
                                            <td>{{ $reserva->fecha_reserva }}</td>
                                            <td>{{ $reserva->hora_reserva }}</td>
                                            <td>{{ $reserva->ruta->bus->placa }}</td>
                                            <td>{{ $reserva->ruta->destino->nombre }}</td>
                                            <td>{{ $reserva->user->nombre }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($reserva->detalleReserva as $detalle)
                                                        <li>{{ $detalle->numero_asiento }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $reserva->total }}</td>
                                            @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                                                <td><a class="btn btn-info btn-sm" href=""><i
                                                            class="fa fa-pencil-square-o"></i></a> <a
                                                        class="btn btn-danger btn-sm" href=""><i
                                                            class="fa fa-trash-o"></i></a></td>
                                            @endif
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