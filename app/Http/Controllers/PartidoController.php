<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Torneo;
use Barryvdh\DomPDF\Facade as PDF;

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
        return view('partido.create',["torneo"=>$torneo]);
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
            'matchday' => 'required'
        ]);       
        
        // guardar porque es valido
        $partido = new Partido();
        $partido->torneo_id = request('torneo');
        $partido->equipo1_id = request('local');
        $partido->equipo2_id = request('visitante');
        $partido->fecha = request('fecha');
        $partido->matchday = request('matchday');

        $partido->save();
        
        // redirect        
        return redirect()->route('partidos.index')->with("message","Se creó el partido exitosamente");
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
        return view('partido.edit',["partido"=>$partido]);
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
            'local'       => 'required',
            'visitante'       => 'required'
        ]);      
        
        $partido = Partido::findOrFail($id);
        $partido->fecha = request('fecha');
        $partido->matchday = request('matchday');
        $partido->equipo1_id = request('local');
        $partido->equipo2_id = request('visitante');

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


    /**
     * crear PDF
     */
    public function crearPDF(Request $request) {    
      
      $partidos_keys = request("partidos");
      if($partidos_keys == null) return back()->with("message","Boludo, no seleccionaste nada");
      $data = Partido::find($partidos_keys);
      
      // share data to view
      view()->share('partidos',$data);
      $pdf = PDF::loadView('partido.modelo_planilla_2', $data);

      // download PDF file with download method
      return $pdf->download('partidos.pdf');         
    }
}

