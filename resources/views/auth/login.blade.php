@extends('layouts.login')

@section('content')
<div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido a  <strong>El Dorado SRL</strong></h2>

                <p>
                    Ofrecer servicio de transporte terrestre, cómodo, seguro y puntual, al turismo local,
                </p>

                <p>
                    nacional y extranjero, asegurándonos que con nuestro profesionalismo y experiencia 
                </p>

                <p>
                    nuestros clientes queden satisfechos de nuestros servicios.
                </p>

                <p>
                    <small>Convertirnos en la empresa de transporte turístico terrestre que sea la primera opción para nuestros clientes.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="POST" action="{{route('auth.login')}}" >
                    @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Olvidaste tu password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>No tienes una cuenta?</small>
                        </p>
                        <a class="btn btn-sm btn-info btn-block" href="{{ route('register') }}">Registrate y haz tu reserva</a>
                        <a class="btn btn-sm btn-success btn-block" href="{{ route('inicio') }}"><i class="fa fa-home"></i></a>
                    </form>
                    <p class="m-t">
                        <small>El Dorado SRL esta app está usando Boostrap 3 &copy; {{ Date('Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Todos los derechos de autor reservados
            </div>
            <div class="col-md-6 text-right">
               <small>© {{ Date('Y') }}-2025</small>
            </div>
        </div>
    </div>
@endsection
