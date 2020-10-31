<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Sede;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::all();
        return view('torneo.index',['torneos'=>$torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('torneo.create',[
            'temporadas'=>Torneo::TEMPORADAS,
            'generos'=>Torneo::GENEROS,
            'modos'=>Torneo::MODOS
            ]);
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
            'nombre'       => 'required',
            'anio' => 'required|numeric',
            'temporada' => 'required',
            'genero' => 'required',
            'modo' => 'required'
        ]);       
        
        // guardar porque es valido
        $torneo = new Torneo();
        $torneo->nombre = request("nombre");
        $torneo->anio = request("anio");
        $torneo->temporada = request("temporada");
        $torneo->genero = request("genero");
        $torneo->modo = request("modo");
        
        $torneo->save();

        // redirect        
        return redirect()->route('torneos.index')->with("message","Se creó el torneo exitosamente");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneo.show',["torneo"=>$torneo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        $sedes = Sede::all();
        return view('torneo.edit',["torneo"=>$torneo, "sedes" => $sedes]);
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
        $request->validate([
            'nombre'       => 'required',
            'anio' => 'required|numeric',
            'temporada' => 'required',
            'genero' => 'required',
            'modo' => 'required'
        ]);      
        
        $torneo = torneo::findOrFail($id);  
        $torneo->nombre = request("nombre");
        $torneo->anio = request("anio");
        $torneo->temporada = request("temporada");
        $torneo->genero = request("genero");
        $torneo->modo = request("modo");
        $torneo->update();
        return redirect()->route("torneos.index")->with(["message"=>"Torneo ".$torneo->nombre." actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route("torneos.index")->with(["message"=>"Torneo ".$torneo->nombre." eliminada con éxito"]);
    }
}
