<?php

namespace App\Http\Controllers;

use App\Models\DetalleReserva;
use App\Models\Reservas;
use App\Models\Rutas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Auth::user()->roles[0]->role->rol;
        if ($rol == 'Administrador') {
            $reservas = Reservas::all();
        }else{
            $reservas = Reservas::where('user_id', Auth::id())->get();
        }
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = User::selectRaw('users.id, users.nombre, users.apellido, users.ci, users.telefono,users.direccion, roles.rol')
            ->join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
            ->join('roles', 'usuario_roles.rol_id', '=', 'roles.id')
            ->where('roles.rol', 'cliente')
            ->get();
        $rutas = Rutas::with('destino')->get();
        return view('reservas.create', compact('clientes', 'rutas'));
    }

    public function getAsientos(Request $request)
    {
        $asientos = DetalleReserva::where('ruta_id', $request->id)->get();
        return response()->json($asientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta = Rutas::find($request->ruta);
        $cantidad_asientos = count($request->asientos);
        $reserva = Reservas::create([
            'user_id' => $request->cliente,
            'ruta_id' => $request->ruta,
            'fecha_reserva' => Carbon::now()->format('Y-m-d'),
            'hora_reserva' => Carbon::now()->format('H:i:s'),
            'total' => $ruta->costo * $cantidad_asientos,
            'estado' => 'pendiente de pago',
        ]);

        foreach ($request->asientos as $key => $asiento) {
            $detalle = DetalleReserva::find($asiento);
            $detalle->reserva_id = $reserva->id;
            $detalle->save();
        }

        return response()->json(['success' => true]);
    }
  

    public function pagar(Request $request)
    {
        $reserva = Reservas::find($request->reserva);
        $reserva->estado = 'pagado';
        $reserva->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Reservas::find($id)->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente');
    }
}
