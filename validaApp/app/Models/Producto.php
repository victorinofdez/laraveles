<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $fillable = ['nombre','ancho','alto','precio','peso','fechaAlta','estado'];
    
    function store () {
        $ok = true;
        try {
            $this-> save();
        }catch(\Exception $e){
            $ok = false;
        }
        return $ok;
    }
}
