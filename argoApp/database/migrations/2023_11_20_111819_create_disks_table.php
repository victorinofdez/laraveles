<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idartist');
            $table->string('title', 60);
            $table->integer('year')->nullable();
            $table->binary('cover')->nullable();
            $table->timestamps();
            
            // Definir la clave foránea
            $table->foreign('idartist')->references('id')->on('artist')->onUpdate('cascade')->onDelete('cascade');
            // Un mismo artista no puede tener dos discos con el mismo titulo
            $table->unique(['idartist', 'title']);
        });
        $sql = 'alter table disk change cover cover longblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disk');
    }
};
