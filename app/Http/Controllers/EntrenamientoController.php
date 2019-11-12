<?php

namespace App\Http\Controllers;

use App\Entrenamiento;
use Illuminate\Http\Request;

// Uso storage, porque a las fotos las e agregado una ruta con php artisan storage:link
use Storage;

class EntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entrenamiento = Entrenamiento::all();

        return view('entrenamiento.index', compact('entrenamiento', $entrenamiento));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('entrenamiento.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Esto es para recoger todos los datos por defecto
        /*$datosEntrenamiento = request()->all();*/

        //Recojemos todos los datos excepto el token
        $datosEntrenamiento = request()->except(['_token']);

        if($request->hasFile('foto')){

            $datosEntrenamiento['foto'] = $request->file('foto')->store('uploads', 'public');

        }

        //Aqui insertamos el objeto sin el token
        Entrenamiento::insert($datosEntrenamiento);

        //Redireccionamos a la misma pagina con mensaje
        return redirect('/entrenamiento/create')->with('mensaje', 'Ejercicio creado correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Entrenamiento  $entrenamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Entrenamiento $entrenamiento)
    {
        //
        //$entrenamiento = Entrenamiento::all();

        $entrenamiento = Entrenamiento::paginate(3);

        return view('entrenamiento.show', compact('entrenamiento', $entrenamiento));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrenamiento  $entrenamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $entrenamiento = Entrenamiento::findOrFail($id);

        return view('entrenamiento.edit', compact('entrenamiento', $entrenamiento));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrenamiento  $entrenamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Recojemos todos los datos excepto el token
        $ejercicioEncontrado = request()->except(['_token', '_method']);

        if($request->hasFile('foto')){

            //Buscamos el objeto para borrar su foto guardada en el sistema
            $entrenamiento = Entrenamiento::findOrFail($id);
            
            Storage::delete('public/'.$entrenamiento->foto);

            $ejercicioEncontrado['foto'] = $request->file('foto')->store('uploads', 'public');

        }

        Entrenamiento::where('id', '=' , $id)->update($ejercicioEncontrado);

        //Redireccionamos a la misma pagina con mensaje
        return back()->with('mensaje', 'Entrenamiento actualizado correctamente');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrenamiento  $entrenamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Buscamos el objeto para borrar su foto guardada en el sistema
        $entrenamiento = Entrenamiento::findOrFail($id);

        if(Storage::delete('public/'.$entrenamiento->foto)){

            Entrenamiento::destroy($id);
        
        }
        //Redireccionamos a la misma pagina con mensaje
        return redirect('/entrenamiento/show')->with('mensaje', 'Entrenamiento borrado correctamente');


    }
}
