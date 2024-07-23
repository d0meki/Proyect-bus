<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsuarioRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    
    use AuthenticatesUsers;

    public function index(){
        return view('auth.login');
    }
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){
        // dd($request->all());
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
            'rol_id' => 4
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!Auth::validate($credentials)) {
            return redirect('login')->withErrors(['failedAuth' =>'El correo y/o contraseña son incorrectos, verifique e intente nuevamente']);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
