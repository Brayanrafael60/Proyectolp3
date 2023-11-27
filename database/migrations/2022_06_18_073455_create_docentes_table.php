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
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('iddocente');
            $table->string('profesion')->nullable();
            $table->decimal('sueldoxh',8,2)->nullable();
            $table->timestamp('datecreated')->useCurrent();
            $table->integer('estado')->default(1);
            $table->foreignId('userid')->constrained('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
