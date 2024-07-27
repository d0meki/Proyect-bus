@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Rol</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Roles</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <form class="m-t" role="form" action="{{ route('roles.update',$role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control" name="rol" value="{{ $role->rol }}">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Editar Rol</button>
            </form>
        </div>
    </div>
@endsection
