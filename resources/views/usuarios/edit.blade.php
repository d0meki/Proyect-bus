@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Usuario</h2>
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
            <form class="m-t" role="form" action="{{ route('usuarios.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $user->nombre }}" name="nombre" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $user->ci }}" name="ci" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $user->telefono }}" name="telefono" >
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control m-b" name="rol">
                            <option value="{{ $user->roles[0]->role->id }}">{{ $user->roles[0]->role->rol }}</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection
