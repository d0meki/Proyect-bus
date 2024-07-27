@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registrar Nuevo Rol</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Roles</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <form class="m-t" role="form" action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="rol" placeholder="Nombre Rol" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrar Rol</button>
            </form>
        </div>
    </div>
@endsection
