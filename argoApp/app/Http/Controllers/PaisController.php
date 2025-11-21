<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaisController extends Controller {
    
    function index() {
        // Consultas en eloquent
        //$paises1 = Pais::all();
        $paises2 = Pais::orderBy('name')->get();            // Base de datos
        //$paises3 = Pais::all()->sortBy('name');
        //$paises3 = Pais::where('name', '>=', 't')
         //           ->orderBy('name', 'desc')->take(10)->get();
                    
        $pais = Pais::find('AGO');
        
        $paises3 = Pais::where('name', '>=', 't')
                    ->orderBy('name', 'desc')->first();
        //dd($paises3);
        //dd($pais);
        
        // Consultas en DB
        $paises1 = DB::select('select * from pais where name >= :name', ['name' => 't']);
        dd($paises1);
    }
}
