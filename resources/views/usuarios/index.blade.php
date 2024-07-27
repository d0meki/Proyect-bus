@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Auth</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Usuarios</strong>
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
                                        <th>avatar</th>
                                        <th>Nombre y Apellido</th>
                                        <th>CI</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Roles</th>
                                        <th>Dirección</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $user)
                                        <tr class="gradeX">
                                            <td>{{ $user->id }}</td>
                                            <td><img src="{{ asset('img/profile_small.jpg') }}" alt="avatar"></td>
                                            <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                            <td>{{ $user->ci }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($user->roles as $role)
                                                        <li>{{ $role->role->rol }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>{{ $user->direccion }}</td>
                                            <form class="formulario-eliminar"
                                                action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('usuarios.edit', $user->id) }}"><i
                                                            class="fa fa-pencil-square-o"></i></a>

                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </td>
                                            </form>
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
