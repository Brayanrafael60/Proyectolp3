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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('idmatricula');
            $table->string('semestre')->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('estudianteid')->constrained('estudiantes')->references('idestudiante');
            $table->foreignId('seccionid')->constrained('seccions')->references('idseccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
