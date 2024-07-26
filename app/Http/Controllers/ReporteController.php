<?php

namespace App\Http\Controllers;

use App\Models\DetalleReserva;
use App\Models\Pago;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas = Pago::all();
        if (isset($request->fecha_inicial) && isset($request->fecha_final)) {
            $ventas = Pago::whereBetween('fecha_pago', [$request->fecha_inicial, $request->fecha_final])->get();
        }
        if (isset($request->ayer)) {
            $ayer = now()->subDay();
            $ventas = Pago::whereDate('fecha_pago', $ayer)->get();
        }
        if (isset($request->semanal)) {
            $semana = now()->subWeek();
            $ventas = Pago::whereDate('fecha_pago', '>=', $semana)->get();
        }
        return view('reportes.index', compact('ventas'));
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
        //
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
        //
    }
}
