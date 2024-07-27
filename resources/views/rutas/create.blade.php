@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registrar Nueva Ruta</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Rutas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-5">
                <div class="col-lg-12 loginscreen  animated fadeInDown">
                    <form role="form" action="{{ route('rutas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="data_1">
                                    <label class="font-normal">Fecha de Salida</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="date" class="form-control" name="fecha_salida" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="data_2">
                                    <label class="font-normal">Hora de Salida</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="time" class="form-control" name="hora_salida" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-normal">Precio del Pasaje</label>
                                    <input type="number" class="form-control" name="costo" placeholder="0.00"
                                        step="any" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-normal">Autobus</label>
                                    <div>
                                        <select class="chosen-select" name="buses_id" tabindex="2">
                                            <option value="0" readonly>Seleccione un bus</option>
                                            @foreach ($autobuses as $bus)
                                                <option value="{{ $bus->id }}">{{ $bus->placa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-normal">Destino</label>
                                    <div>
                                        <select class="chosen-select" name="destino_id" tabindex="2">
                                            <option value="0" readonly>Seleccione un destino</option>
                                            @foreach ($destinos as $destino)
                                                <option value="{{ $destino->id }}">{{ $destino->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-normal">Chofer</label>
                                    <div>
                                        <select class="chosen-select" name="chofer_id" tabindex="2">
                                            <option value="0" readonly>Seleccione un chofer</option>
                                            @foreach ($choferes as $chofer)
                                                <option value="{{ $chofer->id }}">{{ $chofer->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
