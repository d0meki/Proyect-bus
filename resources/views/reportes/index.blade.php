@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Reportes</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Ventas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET" action="{{ route('reportes.index') }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-normal">Fecha de Inicial</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" class="form-control" name="fecha_inicial" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-normal">Fecha de Inicial</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" class="form-control" name="fecha_final" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-normal">-</label>
                                            <div class="input-group date">
                                                <button type="submit" class="btn btn-primary ">Filtrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="GET" action="{{ route('reportes.index') }}">
                                    <div class="row">
                                        <input type="hidden" class="form-control" name="ayer" value="filtrar_ayer">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary ">Filtrar ayer <i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <form method="GET" action="{{ route('reportes.index') }}">
                                    <div class="row mt-2">
                                        <input type="hidden" class="form-control" name="semanal" value="filtrar_semanal">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary ">Filtrar una semana antes <i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                        <th>Metodo Pago</th>
                                        <th>Fecha del pago</th>
                                        <th>Hora del pago</th>
                                        <th>Total</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_ventas = 0;

                                    @endphp
                                    @foreach ($ventas as $venta)
                                        @php
                                            $total_ventas += $venta->total;
                                        @endphp
                                        <tr class="gradeX">
                                            <td>{{ $venta->id }}</td>
                                            <td>{{ $venta->metodo_pago }}</td>
                                            <td>{{ $venta->fecha_pago }}</td>
                                            <td>{{ $venta->hora_pago }}</td>
                                            <td>{{ $venta->total }}</td>
                                            <td><a href="{{ route('pagos.show', $venta->id) }}"
                                                    class="btn btn-dark btn-sm">Ver Detalle <i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th>{{ $total_ventas }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
