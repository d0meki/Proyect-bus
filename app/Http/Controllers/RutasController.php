<?php

namespace App\Http\Controllers;

use App\Models\Autobus;
use App\Models\Destinos;
use App\Models\DetalleReserva;
use App\Models\Rutas;
use App\Models\User;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Rutas::all();
        return view('rutas.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinos = Destinos::all();
        $autobuses = Autobus::all();
        $choferes = User::selectRaw('users.id, users.nombre, users.apellido, users.ci, users.telefono,users.direccion, roles.rol')
        ->join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
        ->join('roles', 'usuario_roles.rol_id', '=', 'roles.id')
        ->where('roles.rol', 'Chofer')
        ->get();
        return view('rutas.create',compact('destinos', 'autobuses','choferes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta = Rutas::create($request->all());
        foreach (range(1, 38) as $asiento) {
            DetalleReserva::create([
                'ruta_id' => $ruta->id,
                'numero_asiento' => $asiento,
            ]);
        }
        return redirect()->route('rutas.index')->with('success', 'Ruta creada correctamente');
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
        $ruta = Rutas::find($id);
        $destinos = Destinos::all();
        $autobuses = Autobus::all();
        $choferes = User::selectRaw('users.id, users.nombre, users.apellido, users.ci, users.telefono,users.direccion, roles.rol')
        ->join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
        ->join('roles', 'usuario_roles.rol_id', '=', 'roles.id')
        ->where('roles.rol', 'Chofer')
        ->get();
        return view('rutas.edit', compact('ruta', 'destinos', 'autobuses', 'choferes'));
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
        Rutas::find($id)->update($request->all());
        return redirect()->route('rutas.index')->with('success', 'Ruta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rutas::find($id)->delete();
        return redirect()->route('rutas.index')->with('success', 'Ruta eliminada correctamente');
    }
    /**
     * Manda a la vista los asientos de la ruta seleccionada
     */
    public function showDetalle($id)
    {
        $asientos = DetalleReserva::where('ruta_id', $id)->get();
        return view('rutas.asientos', compact('asientos'));
    }
}
