<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'ci' => ['required'],
            'telefono' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);
        $user = User::create([
            'nombre' => $request->nombre,
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        UsuarioRole::create([
            'user_id' => $user->id,
            'rol_id' => ($request->rol == 0) ? 4 : $request->rol,
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
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
        $user = User::find($id);
        $roles = Role::all();
        return view('usuarios.edit', compact('user', 'roles'));
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
        User::find($id)->update($request->all());
        UsuarioRole::where('user_id', $id)->update(['rol_id' => $request->rol]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsuarioRole::where('user_id', $id)->delete();
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
