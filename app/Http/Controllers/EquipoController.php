<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Equal;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipo.index',["equipos"=>$equipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $torneos = Torneo::all();
        return view('equipo.create',["torneos"=>$torneos]);
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
            'torneo' => 'required'
        ]);       
        
        // guardar porque es valido
        $equipo = new Equipo();
        $equipo->nombre = request('nombre');
        $equipo->jugadores = request('jugadores');
        $equipo->torneo_id = request('torneo');
        
        $equipo->save();
        
        // redirect        
        return redirect()->route('equipos.index')->with("message","Se creó el equipo exitosamente");
    }

     /**
     * Store several newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBatch(Request $request,$id)
    {           
        $prueba = request('nombre');
        foreach($prueba as $nombreEquipo) {
            if($nombreEquipo != ""){
                $equipo = new Equipo();
                $equipo->nombre = $nombreEquipo;
                $equipo->jugadores = "";
                $equipo->torneo_id = $id;

                $equipo->save();
            }            
        }
        // redirect        
        return redirect()->route('torneos.edit',$id)->with("message","Se crearon los equipos exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneos = Torneo::all();
        $equipo = Equipo::findOrFail($id);
        return view('equipo.show',["torneos"=>$torneos,"equipo"=>$equipo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipo.edit',["equipo"=>$equipo]);
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
            'nombre'       => 'required'
        ]);      
        
        $equipo = equipo::findOrFail($id);  
        $equipo->nombre = request('nombre');
        $equipo->jugadores = request('jugadores');
        $equipo->update();
        return redirect()->route("equipos.index")->with(["message"=>"Equipo ".$equipo->nombre." actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        return redirect()->route("equipos.index")->with(["message"=>"Equipo ".$equipo->nombre." eliminada con éxito"]);
    }
}
