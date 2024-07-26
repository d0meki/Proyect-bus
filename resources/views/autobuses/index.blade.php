@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Autobuses</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Buses</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('autobuses.create') }}" class="btn btn-success">Nueva Autobus</a>
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
                                        <th>Placa</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $bus)
                                        <tr class="gradeX">
                                            <td>{{ $bus->id }}</td>
                                            <td><img style="width=50px; height: 50px;" src="{{ asset('img/bus.png') }}"
                                                    alt=""></td>
                                            <td>{{ $bus->placa }}</td>
                                            <td>{{ $bus->marca }}</td>
                                            <td>{{ $bus->modelo }}</td>
                                            <td>{{ $bus->estado }}</td>
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
