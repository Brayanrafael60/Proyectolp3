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
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('idpersonal');
            $table->decimal('sueldoxh',8,2)->nullable();
            $table->string('area')->nullable();
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
        Schema::dropIfExists('personals');
    }
};
