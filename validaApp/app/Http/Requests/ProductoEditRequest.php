<?php

namespace App\Http\Requests;
use Carbon\carbon; 
use Illuminate\Foundation\Http\FormRequest;

class ProductoEditRequest extends ProductoCreateRequest
{
    function rules(){
        $rules = parent::rules();
        $rules['nombre'] = 'required|string|min:3|max:60|unique:products,nombre,' . $this->product->id;
        return $rules;
    }
}