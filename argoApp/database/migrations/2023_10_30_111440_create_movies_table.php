<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Este método se ejecuta cuando se crea una tabla.
     *
     * @return void
     */
    public function up()
    {
        // id (pk), tittle (unique), director, year, genre (null)
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('tittle', 60)->unique();
            $table->string('director', 110);
            $table->integer('year');
            $table->string('genre', 50)->nullable();
            $table->timestamps();                                   // Marca de tiempo
        });
    }

    /**
     * Este método se ejecuta cuando se borra una tabla.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie');
    }
};