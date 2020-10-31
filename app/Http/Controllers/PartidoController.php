<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Torneo;
use App\Models\Sede;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all()->sortByDesc('fecha');
        $torneos = Torneo::all();
        return view('partido.index',['partidos'=>$partidos,'torneos'=>$torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $torneo = Torneo::findOrFail(request('torneo'));
        $sedes = Sede::all();
        return view('partido.create',["torneo"=>$torneo,"sedes" => $sedes]);
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
            'torneo'       => 'required',
            'local'       => 'required',
            'visitante'    => 'required',
            'fecha'       => 'required',
            'hora'       => 'required',
            'matchday' => 'required',
            'sede' => 'required'
        ]);       
        
        // guardar porque es valido
        $partido = new Partido();
        $partido->torneo_id = request('torneo');
        $partido->equipo1_id = request('local');        
        $partido->equipo2_id = request('visitante');
        $partido->sede_id = request('sede');
        $partido->fecha = request('fecha');
        $partido->hora = request('hora');
        $partido->matchday = request('matchday');        

        $partido->save();
        
        // redirect        
        return redirect()->route('partidos.index')->with("message","Se creó el partido exitosamente");
    }

     /**
     * Store several newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBatch(Request $request,$id)
    {           
        $locales = request('local');
        $visitantes = request('visitante');
        $fechas = request('fecha');
        $horas = request('hora');
        $matchdays = request('matchday');
        $sedes = request('sede'); 

        for($i=0;$i<count($locales);$i++) {
            $partido = new Partido();
            $partido->torneo_id = $id;
            $partido->equipo1_id = $locales[$i];          
            $partido->equipo2_id = $visitantes[$i];
            $partido->sede_id = $sedes[$i];
            $partido->fecha = $fechas[$i];
            $partido->hora = $horas[$i];
            $partido->matchday = $matchdays[$i];

            $partido->save();
        } 
        return redirect()->route('torneos.edit',$id)->with("message","Se crearon los partidos exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partido = Partido::findOrFail($id);
        return view('partido.show',["partido"=>$partido]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        $sedes = Sede::all();
        return view('partido.edit',["partido"=>$partido,"sedes"=>$sedes]);
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
            'fecha'       => 'required',
            'hora'       => 'required',
            'local'       => 'required',
            'visitante'       => 'required',
            'sede' => 'required'
        ]);      
        
        $partido = Partido::findOrFail($id);
        $partido->fecha = request('fecha');
        $partido->hora = request('hora');
        $partido->matchday = request('matchday');
        $partido->equipo1_id = request('local');
        $partido->equipo2_id = request('visitante');
        $partido->sede_id = request('sede');

        $partido->update();

        return redirect()->route("partidos.index")->with(["message"=>"EL partido se actualizado con éxito"]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();
        return redirect()->route("partidos.index")->with(["message"=>"El partido fue eliminada con éxito"]);
    }


    
}

