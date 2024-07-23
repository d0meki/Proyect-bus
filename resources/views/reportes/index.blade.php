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
                        <h5>Basic Data Tables example with responsive plugin</h5>
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
                                        <th>Ruta</th>
                                        <th>Bus</th>
                                        <th>Asiento</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total_ventas = 0;

                                    @endphp
                                    @foreach($ventas as $venta)
                                    @php
                                    $total_ventas += $venta->ruta->costo;
                                    @endphp
                                    <tr class="gradeX">
                                        <td>{{$venta->id}}</td>
                                        <td>{{$venta->ruta->nombre}}</td>
                                        <td>{{$venta->ruta->bus->placa}}</td>
                                        <td>{{$venta->numero_asiento}}</td>
                                        <td>{{$venta->reserva->user->nombre}}</td>
                                        <td>{{$venta->ruta->costo}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th>{{$total_ventas}}</th>
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
