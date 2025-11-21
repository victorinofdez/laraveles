<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductoCreateRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $fechaActual = Carbon::now()->format('Y-m-d');
        $fechaMinima = Carbon::yesterday()->format('Y-m-d');
        return view('producto.create', ['estados' =>  $this->getStates(), 
                                         'fechaActual' => $fechaActual,
                                         'fechaMinima' => $fechaMinima]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoCreateRequest $request) {
        if($request->alto > $request->ancho) {
            return back()->withInput()->withErrors(['ancho' => 'El ancho no puede ser menor que el alto', 
                                                     'alto' => 'El alto no puede ser mayor que el ancho']);
        }
        
        $producto = new Producto($request->all());
        if(!$producto->store()) {
            return back()->withInput()->withErrors(['producto' => 'El producto no se ha podido guardar.']);
        } else {
            return redirect('producto/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto) {
        return view('producto.edit', [ 'estados' => self::getEstados(),
                                       'producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto) {
        dd([$request, $producto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto) {
        //
    }
    
    private function getStates() {
        return [
                'bueno'     =>  'Buen estado',
                'regular'   =>  'Estado regular',
                'malo'      =>  'Mal estado'  
        ];
    }
    
    private static function getEstados() {
        return [
                'bueno'     =>  'Buen estado',
                'regular'   =>  'Estado regular',
                'malo'      =>  'Mal estado'  
        ];
    }
    
}