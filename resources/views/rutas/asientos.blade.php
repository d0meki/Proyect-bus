@extends('layouts.myLayout')

@section('content')
    <style>
        button {
            cursor: none;
        }
    </style>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Rutas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Rutas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Asientos del bus {{ $asientos[0]->ruta->bus->placa }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    @foreach ($asientos as $asiento)
                                        @if ($asiento->numero_asiento <= 10)
                                            <td>
                                                @if (isset($asiento->reserva_id))
                                                    <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                @else
                                                    <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                @endif
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($asientos as $asiento)
                                        @if ($asiento->numero_asiento > 10 && $asiento->numero_asiento <= 20)
                                            <td>
                                                @if (isset($asiento->reserva_id))
                                                    <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                @else
                                                    <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                @endif
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    @foreach ($asientos as $asiento)
                                        @if ($asiento->numero_asiento > 20 && $asiento->numero_asiento <= 29)
                                            @if ($asiento->numero_asiento == 28)
                                                <td>
                                                    <button disabled style="width: 50px; height: 50px;"
                                                        class="btn btn-white text-white"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                </td>
                                                <td>
                                                    @if (isset($asiento->reserva_id))
                                                        <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @else
                                                        <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @endif
                                                </td>
                                            @else
                                                <td>
                                                    @if (isset($asiento->reserva_id))
                                                        <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @else
                                                        <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @endif
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($asientos as $asiento)
                                        @if ($asiento->numero_asiento > 29 && $asiento->numero_asiento <= 38)
                                            @if ($asiento->numero_asiento == 37)
                                                <td>
                                                    <button disabled style="width: 50px; height: 50px;"
                                                        class="btn btn-white text-white"
                                                        onclick="seleccionar('{{ $asiento->id }}')">
                                                        {{ $asiento->numero_asiento }}
                                                    </button>
                                                </td>
                                                <td>
                                                    @if (isset($asiento->reserva_id))
                                                        <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @else
                                                        <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @endif
                                                </td>
                                            @else
                                                <td>
                                                    @if (isset($asiento->reserva_id))
                                                        <button style="width: 50px; height: 50px;" class="btn btn-danger"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @else
                                                        <button style="width: 50px; height: 50px;" class="btn btn-primary"
                                                            onclick="seleccionar('{{ $asiento->id }}')">
                                                            {{ $asiento->numero_asiento }}
                                                        </button>
                                                    @endif
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Código JavaScript para manejar la selección de dientes y cuadrantes -->
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>

@endsection
