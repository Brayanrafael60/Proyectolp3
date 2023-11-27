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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('DNI');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('sexo');
            $table->string('f_nacimiento');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('rolid')->constrained('rols')->references('idrol');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
