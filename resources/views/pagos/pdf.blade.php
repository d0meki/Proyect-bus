<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        body {
            padding: 50px;
        }

        * {
            box-sizing: border-box;
        }

        .receipt-main {
            display: inline-block;
            width: 100%;
            padding: 15px;
            font-size: 12px;
            border: 1px solid #000;
        }

        .receipt-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .receipt-label {
            font-weight: 600;
        }

        .text-large {
            font-size: 16px;
        }

        .receipt-section {
            margin-top: 10px;
        }

        .receipt-footer {
            text-align: center;
            background: #ff0000;
        }

        .receipt-signature {
            height: 80px;
            margin: 50px 0;
            padding: 0 50px;
            background: #fff;

            .receipt-line {
                margin-bottom: 10px;
                border-bottom: 1px solid #000;
            }

            p {
                text-align: center;
                margin: 0;
            }
        }
        table{
            width: 100%;
            border: #000 1px solid;
        }
    </style>
</head>

<body>
    <div class="receipt-main">
        <div class="receipt-section pull-left">
            <h2>EL DORADO SRL</h2>
        </div>
        <p class="receipt-title">Recibo</p>

        <div class="receipt-section pull-left">
            <span class="receipt-label text-large">Número: {{ rand(50000,100000) }} </span>
        </div>
        <div class="receipt-section pull-left">
            <span class="receipt-label text-large">Fecha:</span>
            <span class="text-large">{{ date('d-m-y') }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Nombre/Razon Social: </span>
            <span class="text-large">{{ $data['nombre'] }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Codigo del Cliente: </span>
            <span class="text-large">{{ $data['codigo_clliente'] }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">NIT/CI/CEX: </span>
            <span class="text-large">{{ $data['ci'] }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Reserva #: </span>
            <span class="text-large">{{ $data['numero_reserva'] }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Destino: </span>
            <span class="text-large">{{ $data['destino'] }}</span>
        </div>
        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Autobus: </span>
            <span class="text-large">{{ $data['bus'] }}</span>
        </div>
        <div class="clearfix"></div>

        <div class="receipt-section">
            <table>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($data['detalle_ventas'] as $detalle)
                        @php
                            $total += $detalle['subtotal'];
                        @endphp
                        <tr>
                            <td>{{ $detalle['detalle'] }}</td>
                            <td  style="text-align: center" >{{ $detalle['cantidad'] }}</td>
                            <td  style="text-align: center" >{{ $detalle['precio_unitario'] }}</td>
                            <td  style="text-align: center" >{{ $detalle['subtotal'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Total</td>
                        <td style="text-align: center">{{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="clearfix"></div>

        <div class="receipt-signature col-xs-6">
            <p class="receipt-line"></p>
            <p>Casa Matriz</p>
            <p>Telf: 3625489</p>
            <p>TERMINAL BIMODAL SANTA CRUZ</p>
            <p>Venta de pasajes, recepción de encomiendas y equipajes.</p>
        </div>
    </div>

</body>

</html>
