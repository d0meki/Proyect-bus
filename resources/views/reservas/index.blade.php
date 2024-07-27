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
                                            <th>Estado</th>
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
                                            @if ($reserva->estado == 'pendiente de pago')
                                                <td>{{ $reserva->estado }} <a
                                                        href="{{ route('reservas.index_pagar', $reserva->id) }}"
                                                        target="_blank" class="btn btn-warning btn-ms">Pagar</a></td>
                                            @else
                                                <td>{{ $reserva->estado }}</td>
                                            @endif
                                            @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                                                <form class="formulario-eliminar"
                                                    action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <td>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </form>
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
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/sweetalert/sweetalert.min.js') !!}"></script>
    <script>
        $(document).ready(function() {
            $('.formulario-eliminar').submit(function(e) {
                e.preventDefault()
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function() {
                        e.target.submit();
                    });
            });
        });
    </script>
@endsection
