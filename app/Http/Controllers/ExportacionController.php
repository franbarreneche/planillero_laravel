<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Torneo;
use Barryvdh\DomPDF\Facade as PDF;

class ExportacionController extends Controller
{

    public function index() {
      $partidos = Partido::all()->sortByDesc('fecha');
      return view('exportacion.index',['partidos'=>$partidos]);
    }

    /**
     * crear PDF
     */
    public function exportarPartidosPDF(Request $request) {    
      
        $partidos_keys = request("partidos");
        if($partidos_keys == null) return back()->with("message","Boludo, no seleccionaste nada");
        $data = Partido::find($partidos_keys);
        
        // share data to view
        view()->share('partidos',$data);
        $pdf = PDF::loadView('partido.modelo_planilla_2', $data);
  
        // download PDF file with download method
        return $pdf->download('partidos.pdf');         
      }

    /**
     * crear CSV
     */
      public function exportarPartidosCSV() {
        
    }
}
