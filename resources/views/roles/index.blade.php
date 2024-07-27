@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Auth</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Roles</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a href="{{ route('roles.create') }}" class="btn btn-success">Nuevo Rol</a>
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
                                        <th>Rol</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="gradeX">
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->rol }}</td>
                                            <form class="formulario-eliminar"
                                                action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('roles.edit', $role->id) }}"><i
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
