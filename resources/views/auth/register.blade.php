@extends('layouts.login')
@section('content')
<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        {{-- <div>
            <h1 class="logo-name">IN+</h1>
        </div> --}}
        <h3>Registrarse en El Dorado SRL</h3>
        <p>Crea una cuenta para verlo en acción.</p>
        <form class="m-t" role="form" action="{{route('auth.register')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="nombre"  placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="ci"  placeholder="Nro de Carnet" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="telefono"  placeholder="+591 700XX00X" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control"  name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Acepte los términos y la política.</label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Guardar mi registro</button>

            <p class="text-muted text-center"><small>Ya tienes una cuenta?</small></p>
            <a class="btn btn-sm btn-info btn-block" href="{{ route('login') }}">Ir a Iniciar Sesion</a>
        </form>
        <small>El Dorado SRL esta app está usando Boostrap 3 &copy; {{ Date('Y') }}</small>
    </div>
</div>

@endsection
