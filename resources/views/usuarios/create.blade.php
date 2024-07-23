@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registrar Nuevo Usuario</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Usuarios</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="ci" placeholder="Nro de Carnet" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="telefono" placeholder="+591 700XX00X" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control m-b" name="rol">
                            <option value="0">Selecciones un rol</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
            </form>
        </div>
    </div>
@endsection
