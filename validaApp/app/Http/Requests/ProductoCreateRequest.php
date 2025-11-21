<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class OldProductoCreateRequest extends FormRequest {
    
    
    public function attributes() {
        return [
            'alto' => 'Alto del producto',
            'ancho' => 'Ancho del producto',
            'estado' => 'Estado del producto',
            'fechaAlta' => 'Fecha de alta del producto',
            'nombre' => 'Nombre del producto',
            'peso' => 'Peso del producto',
            'precio' => 'Precio del producto',
        ];
    }

    // Es una función relacionada con la gestión de usuarios
    // Hay formas mejores de controlar los accesos
    public function authorize() {
        return true;
    }
    
    public function messages() {
        $gte = 'El valor mínimo del campo :attribute es :value.';
        $integer = 'El campo :attribute tiene que ser un número entero.';
        $lte = 'El valor máximo del campo :attribute es :value.';
        $decimal = 'El campo :attribute tiene que ser un número con un máximo de :decimal decimales.';
        $required = 'El campo :attribute es obligatorio.';
        
        return [
            'alto.integer' => $integer,
            'alto.gte' => $gte,
            'alto.lte' => $lte,
            'ancho.integer' => $integer,
            'ancho.gte' => $gte,
            'ancho.lte' => $lte,
            'estado.required' => $required,
            'estado.in' => 'Los valores permitidos para el campo :attribute son: bueno, regular, malo',
            'fechaAlta.required' => $required,
            'fechaAlta.after_or_equal' => 'El campo :attribute no puede ser anterior a la fecha de ayer',
            'fechaAlta.date' => 'El campo :attribute no tiene formato de fecha válido',
            'nombre.required' => $required,
            'nombre.max' => 'El :attribute no puede tener más de :max caracteres',
            'nombre.min' => 'El :attribute no puede tener menos de :min caracteres',
            'nombre.unique' => 'El :attribute ya está en la base de datos',
            'peso.decimal' => $decimal,
            'peso.required' => $required,
            'peso.gte' => $gte,
            'peso.lte' => $lte,
            'precio.decimal' => $decimal,
            'precio.required' => $required,
            'precio.gte' => $gte,
            'precio.lte' => $lte,
            
        ];
    }
    
    
    //
    public function rules() {
        $yesterday = Carbon::yesterday();
        $string = $yesterday->format('Y/m/d');
        return [
            'alto'          => 'nullable|numeric|gte:0|lte:65535',
            'ancho'         => 'nullable|numeric|gte:0|lte:65535',
            'estado'        => 'required|in:bueno,regular,malo',
            'fechaAlta'     => 'required|date|after_or_equal:' . $string,
            'nombre'        => 'required|string|min:3|max:60|unique:producto,nombre',
            'peso'          => 'nullable|decimal:2|gte:0|lte:99999.99',
            'precio'        => 'required|decimal:2|gte:-999999.99|lte:999999.99',
        ];
    }
}