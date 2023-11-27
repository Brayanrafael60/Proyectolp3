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
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('idnota');
            $table->integer('ta1')->nullable();
            $table->integer('ta2')->nullable();
            $table->integer('ta3')->nullable();
            $table->integer('ta4')->nullable();
            $table->integer('ta5')->nullable();
            $table->integer('emc')->nullable();
            $table->integer('efc')->nullable();
            $table->integer('sus')->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('matriculaid')->constrained('matriculas')->references('idmatricula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
