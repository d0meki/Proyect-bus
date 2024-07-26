@extends('layouts.myLayout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Pagos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <strong>Pagos de Reservas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="row">
            <div class="col-md-4">
                <div class="payment-card">
                    <i class="fa fa-cc-visa payment-icon-big text-success"></i>
                    <h2>
                        **** **** **** 1060
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <small>
                                <strong>Expiry date:</strong> 10/16
                            </small>
                        </div>
                        <div class="col-sm-6 text-right">
                            <small>
                                <strong>Name:</strong> David Williams
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-card">
                    <i class="fa fa-cc-mastercard payment-icon-big text-warning"></i>
                    <h2>
                        **** **** **** 7002
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <small>
                                <strong>Expiry date:</strong> 10/16
                            </small>
                        </div>
                        <div class="col-sm-6 text-right">
                            <small>
                                <strong>Name:</strong> Anna Smith
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-card">
                    <i class="fa fa-cc-discover payment-icon-big text-danger"></i>
                    <h2>
                        **** **** **** 3466
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <small>
                                <strong>Expiry date:</strong> 10/16
                            </small>
                        </div>
                        <div class="col-sm-6 text-right">
                            <small>
                                <strong>Name:</strong> Morgan Stanch
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        Metodos de Pago
                    </div>
                    <div class="ibox-content">
                        <div class="panel-group payments-method" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="float-right">
                                        <i class="fa fa-cc-paypal text-success"></i>
                                    </div>
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">PayPal</a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <form action="{{ route('reservas.pagar') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="metodo_pago" value="paypal">
                                                <input type="hidden" name="reserva_id" value="{{ $reserva->id }}">
                                                <div class="col-md-10">
                                                    <h2>Resumen</h2>
                                                    <strong>Producto:</strong>: Asientos Vaiaje a
                                                    {{ $reserva->ruta->destino->nombre }}<br />
                                                    <strong>Reserva # :</strong>: {{ $reserva->id }} <br />
                                                    <strong>----detalle----</strong><br />
                                                    <table>
                                                        <thead>
                                                            <th> Asiento # </th>
                                                            <th> Precio </th>
                                                            <th> Cantidad </th>
                                                            <th> Subtotal </th>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $precio = $reserva->ruta->costo;
                                                            @endphp
                                                            @foreach ($reserva->detalleReserva as $detalle)
                                                                <tr>
                                                                    <td>{{ $detalle->numero_asiento }}</td>
                                                                    <td>{{ $precio }}</td>
                                                                    <td>1</td>
                                                                    <td>{{ $precio }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <strong>Total a Pagar:</strong>: <span class="text-navy">$
                                                        {{ count($reserva->detalleReserva) * $precio }}</span>
                                                    <p class="m-t">
                                                        PayPal es un proveedor de servicios de pago y actúa como tal
                                                        mediante la
                                                        creación, el hospedaje, el mantenimiento y la provisión de servicios
                                                        de
                                                        PayPal a través de Internet. Nuestros servicios le permiten enviar
                                                        pagos
                                                        a cualquier persona que tenga una cuenta de PayPal y, donde el
                                                        servicio
                                                        esté disponible, recibir pagos. La disponibilidad de nuestros
                                                        servicios
                                                        varía según el país o región. Inicie sesión en su cuenta de PayPal
                                                        para
                                                        ver qué servicios están disponibles en su país o región.
                                                    </p>
                                                    <button type="submit" class="btn btn-success" href="">
                                                        <i class="fa fa-cc-paypal"> </i> Pagar con PayPal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="float-right">
                                        <i class="fa fa-cc-amex text-success"></i>
                                        <i class="fa fa-cc-mastercard text-warning"></i>
                                        <i class="fa fa-cc-discover text-danger"></i>
                                    </div>
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit
                                            Card</a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h2>Resumen</h2>
                                                <strong>Producto:</strong>: Asientos Vaiaje a
                                                {{ $reserva->ruta->destino->nombre }}<br />
                                                <strong>Reserva # :</strong>: {{ $reserva->id }} <br />
                                                <strong>----detalle----</strong><br />
                                                <table>
                                                    <thead>
                                                        <th> Asiento # </th>
                                                        <th> Precio </th>
                                                        <th> Cantidad </th>
                                                        <th> Subtotal </th>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $precio = $reserva->ruta->costo;
                                                        @endphp
                                                        @foreach ($reserva->detalleReserva as $detalle)
                                                            <tr>
                                                                <td>{{ $detalle->numero_asiento }}</td>
                                                                <td>{{ $precio }}</td>
                                                                <td>1</td>
                                                                <td>{{ $precio }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <strong>Total a Pagar:</strong>: <span class="text-navy">$
                                                    {{ count($reserva->detalleReserva) * $precio }}</span>
                                                <p class="m-t">
                                                    Tener una tarjeta Visa Classic Crédito o Visa Classic Débito significa
                                                    aceptación mundial y valiosos beneficios con la facilidad y seguridad
                                                    que ofrece Visa.
                                                    Tu tarjeta Visa Classic Crédito te brinda grandes beneficios y
                                                    servicios: seguros de compra, membresias sin cargo y más para que solo
                                                    te ocupes de disfrutar.
                                                </p>
                                                <p>
                                                    Los beneficios de viaje y seguros que necesitas para viajar con
                                                    tranquilidad
                                                </p>
                                            </div>
                                            <div class="col-md-8">

                                                <form role="form" action="{{ route('reservas.pagar') }}"
                                                    id="payment-form" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="metodo_pago" value="tarjeta">
                                                    <input type="hidden" name="reserva_id" value="{{ $reserva->id }}">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>CARD NUMBER</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="Number" placeholder="Valid Card Number"
                                                                        required />
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-credit-card"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>EXPIRATION DATE</label>
                                                                <input type="text" class="form-control" name="Expiry"
                                                                    placeholder="MM / YY" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-5 col-md-5 float-right">
                                                            <div class="form-group">
                                                                <label>CV CODE</label>
                                                                <input type="text" class="form-control" name="CVC"
                                                                    placeholder="CVC" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>NAME OF CARD</label>
                                                                <input type="text" class="form-control"
                                                                    name="nameCard" placeholder="NAME AND SURNAME" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit">Realizar
                                                                Pago</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
