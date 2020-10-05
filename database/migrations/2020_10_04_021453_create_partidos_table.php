<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matchday');
            $table->date('fecha');
            $table->time('hora',0);
            $table->foreignId('torneo_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipo1_id');
            $table->foreign('equipo1_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreignId('equipo2_id');
            $table->foreign('equipo2_id')->references('id')->on('equipos')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
