@extends('layouts.myLayout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Reservas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Nueva reserva</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-3 text-center loginscreen   animated fadeInDown">
                <div class="col-lg-6">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div>
                                <select class="chosen-select" name="cliente" id="select_cliente" tabindex="2">
                                    <option value="0">Selecciones Cliente</option>
                                    @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente }}">{{ $cliente->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ Auth::user() }}">{{ Auth::user()->nombre }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="ci" placeholder="Nro de Carnet" required
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group">
                            <input type="text" class="form-control" name="telefono" placeholder="+591 700XX00X" required
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-sm-12">
                        <select class="chosen-select" name="ruta" id="ruta_select">
                            <option value="0">Selecciones Ruta</option>
                            @foreach ($rutas as $ruta)
                                <option style="z-index: 999" value="{{ $ruta->destino }}">{{ $ruta->destino->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <button class="btn btn-primary block full-width m-b" onclick="registrarReserva()">Registrar
                        Reserva</button>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <table class="table" id="table_bus_uno">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <table class="table" id="table_bus_dos">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <!-- Sweet alert -->
    <script src="{!! asset('js/plugins/sweetalert/sweetalert.min.js') !!}"></script>
    <script>
        const asientos_seleccionados = [];
        $(document).ready(function() {
            $('#select_cliente').on('change', function() {
                const cliente = JSON.parse($(this).val());
                $('input[name="nombre"]').val(cliente.nombre);
                $('input[name="ci"]').val(cliente.ci);
                $('input[name="telefono"]').val(cliente.telefono);
            });
            $('#ruta_select').on('change', function() {
                const ruta = JSON.parse($(this).val());
                const id = ruta.id;
                const url_get_asientos = '{{ route('reservas.get_asientos') }}';
                $.ajax({
                    url: url_get_asientos,
                    type: "GET",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        pintarAsientos(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            function pintarAsientos(asientos) {
                // Limpiar las tablas antes de agregar nuevas filas
                $('#table_bus_uno tbody').empty();
                $('#table_bus_dos tbody').empty();

                // Inicializar filas
                let rowBusUno1 = $('<tr></tr>');
                let rowBusUno2 = $('<tr></tr>');
                let rowBusDos1 = $('<tr></tr>');
                let rowBusDos2 = $('<tr></tr>');

                asientos.forEach(function(asiento) {
                    let buttonClass = asiento.reserva_id ? 'btn btn-danger' : 'btn btn-primary';
                    let propertyDisabled = asiento.reserva_id ? 'disabled' : '';
                    let buttonHtml =
                        `<button type"button" ${propertyDisabled} style="width: 50px; height: 50px;" class="${buttonClass}" onclick="seleccionar(this,'${asiento.id}')">${asiento.numero_asiento}</button>`;

                    if (asiento.numero_asiento <= 10) {
                        rowBusUno1.append(`<td>${buttonHtml}</td>`);
                    } else if (asiento.numero_asiento > 10 && asiento.numero_asiento <= 20) {
                        rowBusUno2.append(`<td>${buttonHtml}</td>`);
                    } else if (asiento.numero_asiento > 20 && asiento.numero_asiento <= 29) {
                        if (asiento.numero_asiento == 28) {
                            rowBusDos1.append(
                                `<td><button disabled style="width: 50px; height: 50px;" class="btn btn-white text-white">${asiento.numero_asiento}</button></td>`
                            );
                        }
                        rowBusDos1.append(`<td>${buttonHtml}</td>`);
                    } else if (asiento.numero_asiento > 29 && asiento.numero_asiento <= 38) {
                        if (asiento.numero_asiento == 37) {
                            rowBusDos2.append(
                                `<td><button disabled style="width: 50px; height: 50px;" class="btn btn-white text-white">${asiento.numero_asiento}</button></td>`
                            );
                        }
                        rowBusDos2.append(`<td>${buttonHtml}</td>`);
                    }
                });
                // Agregar filas a las tablas
                $('#table_bus_uno tbody').append(rowBusUno1);
                $('#table_bus_uno tbody').append(rowBusUno2);
                $('#table_bus_dos tbody').append(rowBusDos1);
                $('#table_bus_dos tbody').append(rowBusDos2);
            }

        });

        function seleccionar(button, id) {
            $(button).toggleClass('btn-primary btn-warning');
            if ($(button).hasClass('btn-primary')) {
                asientos_seleccionados.splice(asientos_seleccionados.indexOf(id), 1);
            } else {
                asientos_seleccionados.push(id);
            }
        }

        function registrarReserva() {
            const url_registrar_reserva = '{{ route('reservas.store') }}';
            const url_reserva_index = '{{ route('reservas.index') }}';
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const data = {
                cliente: JSON.parse($('#select_cliente').val()).id ?? null,
                ruta: JSON.parse($('#ruta_select').val()).id,
                asientos: asientos_seleccionados
            };
            console.log(data);
            $.ajax({
                url: url_registrar_reserva,
                type: "POST",
                dataType: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                success: function(data) {
                    console.log(data);
                    if (data.success) {
                        swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            type: "success",
                        }, );
                        window.location.assign(url_reserva_index);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
