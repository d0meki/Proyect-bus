@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registrar Nuevo Destino</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Destinos</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <form class="m-t" role="form" action="{{ route('destinos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Destino" required>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control m-b" name="estado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrar Destino</button>
            </form>
        </div>
    </div>
@endsection
