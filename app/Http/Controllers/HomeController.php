<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*Redirecciona a la capa Home */
        // return view('home');

        //Estio muestra todos los usuarios autentificados
        /*$datos = Auth()->user()->all();
        return view('home', compact('datos'));*/

        /*Mostrar el usuario conectado*/
        $datos = User::find(Auth()->user());
        return view('home', compact('datos', $datos));
    }
}
