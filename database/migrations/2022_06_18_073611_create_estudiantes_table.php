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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('idestudiante');
            $table->string('col_egreso')->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('userid')->constrained('users')->references('id');
            $table->foreignId('planid')->constrained('plan_estudios')->references('idplan');
            $table->foreignId('papid')->constrained('paps')->references('idpap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
