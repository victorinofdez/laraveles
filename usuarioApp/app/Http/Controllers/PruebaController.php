<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pruebaController extends Controller
{
    function __construct() {
        $this->middleware('prueba', ['only' => ['rutaProtegida']]);
         $this->middleware('root', ['only' => ['onlyroot']]);
    }    
    
    function ruta() {
        return view('prueba.ruta');
    }
    function rutaProtegida() {
        return view('prueba.rutaprotegida');
    }
     function onlyroot() {
        return view('prueba.onlyroot');
    }
}
