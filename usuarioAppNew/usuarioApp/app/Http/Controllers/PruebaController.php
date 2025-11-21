<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller {
    
    function __construct() {
        $this->middleware('prueba', ['only' => ['rutaProtegida']]);
        //$this->middleware('prueba', ['except' => ['rutaProtegida']]);
        $this->middleware('verified', ['only' => ['rutaVerificado']]);
        $this->middleware('root', ['only' => ['onlyroot']]);
    }
    
    function onlyroot() {
        return view('prueba.onlyroot');
    }
    
    function ruta() {
        return view('prueba.ruta');
    }
    
    function rutaProtegida() {
        return view('prueba.rutaprotegida');
    }
    
    function rutaVerificado() {
        return view('prueba.rutaverificado');
    }
}
