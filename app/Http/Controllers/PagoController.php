<?php

namespace App\Http\Controllers;

use App\Models\Autobus;
use App\Models\DetallePago;
use App\Models\Pago;
use App\Models\Reservas;
use App\Models\Rutas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use PDF;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function home()
    {
        $cantidad_reservas = Reservas::all()->count();
        $cantidad_buses = Autobus::all()->count();
        $cantidad_rutas = Rutas::all()->count();
        $clientes = User::selectRaw('users.id, users.nombre, users.apellido, users.ci, users.telefono,users.direccion, roles.rol')
        ->join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
        ->join('roles', 'usuario_roles.rol_id', '=', 'roles.id')
        ->where('roles.rol', 'cliente')
        ->get();
        $choferes = User::selectRaw('users.id, users.nombre, users.apellido, users.ci, users.telefono,users.direccion, roles.rol')
        ->join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
        ->join('roles', 'usuario_roles.rol_id', '=', 'roles.id')
        ->where('roles.rol', 'Chofer')
        ->get();
        $cantidad_clientes = $clientes->count();
        $cantidad_choferes = $choferes->count();
        $total_ventas = Pago::sum('total');

        $data = [
            'cantidad_reservas' => $cantidad_reservas,
            'cantidad_buses' => $cantidad_buses,
            'cantidad_rutas' => $cantidad_rutas,
            'cantidad_clientes' => $cantidad_clientes,
            'cantidad_choferes' => $cantidad_choferes,
            'total_ventas' => $total_ventas,
        ];

        return view('home', compact('data'));
    }
    public function pagarView($id)
    {
        $reserva = Reservas::find($id);
        return view('pagos.index', compact('reserva'));
    }

    public function viewPDF($id)
    {
        $pago = Pago::find($id);
        $reserva = $pago->reserva;
        $usuario = $reserva->user;
        $data = [
            'nombre' => $usuario->nombre . ' ' . $usuario->apellido,
            'numero_reserva' => $reserva->id,
            'destino' => $reserva->ruta->destino->nombre,
            'bus' => $reserva->ruta->bus->modelo . ' con placa ' . $reserva->ruta->bus->placa,
            'ci' => $usuario->ci,
            'codigo_clliente' => $usuario->id,
            'detalle_ventas' => $pago->detallePagos,
        ];
        $pdf = PDF::loadView('pagos.pdf', array('data' =>  $data))
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = Reservas::find($request->reserva_id);
        $costo = $reserva->ruta->costo;
        $total = count($reserva->detalleReserva) * $costo;
        $pago = Pago::create([
            'fecha_pago' => Carbon::now()->format('Y-m-d'),
            'hora_pago' => Carbon::now()->format('H:i:s'),
            'metodo_pago' => $request->metodo_pago,
            'total' => $total,
            'reserva_id' => $request->reserva_id,
        ]);
        foreach ($reserva->detalleReserva as $key => $detalle) {
            $detalle_pago = new DetallePago();
            $detalle_pago->detalle = 'Asiento # ' . $detalle->numero_asiento;
            $detalle_pago->precio_unitario = $costo;
            $detalle_pago->cantidad = 1;
            $detalle_pago->subtotal = $costo;
            $detalle_pago->pago_id = $pago->id;
            $detalle_pago->save();
        }
        $reserva->estado = 'pagado';
        $reserva->save();
        return redirect()->route('view-pdf', $pago->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle_ventas = DetallePago::where('pago_id', $id)->get();
        return view('reportes.show', compact('detalle_ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
