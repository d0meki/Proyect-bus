@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Usuarios</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Choferes</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('usuarios.create') }}" class="btn btn-success">Nuevo Chofer</a>
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
                                        <th>Nombre y Apellido</th>
                                        {{-- <th>Apellido</th> --}}
                                        <th>CI</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($choferes as $chofer)
                                    <tr class="gradeX">
                                        <td>{{$chofer->id}}</td>
                                        <td>{{$chofer->nombre}}</td>
                                        {{-- <td>{{$chofer->apellido}}</td> --}}
                                        <td>{{$chofer->ci}}</td>
                                        <td>{{$chofer->email}}</td>
                                        <td>{{$chofer->telefono}}</td>
                                        <td>{{$chofer->rol}}</td>
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
