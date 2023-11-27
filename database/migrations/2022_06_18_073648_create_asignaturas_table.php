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
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('idasignatura');
            $table->integer('codigo')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('ciclo')->nullable();
            $table->string('prerequisito')->nullable();
            $table->integer('creditos')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('ht')->nullable();
            $table->integer('hp')->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('papid')->constrained('paps')->references('idpap');
            $table->foreignId('planid')->constrained('plan_estudios')->references('idplan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
};
