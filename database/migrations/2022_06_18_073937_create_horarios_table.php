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
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('idhorario');
            $table->string('dia')->nullable();
            $table->time('h_inicio')->nullable();
            $table->time('h_fin')->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('seccionid')->constrained('seccions')->references('idseccion');
            $table->foreignId('aulaid')->constrained('aulas')->references('idaula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
