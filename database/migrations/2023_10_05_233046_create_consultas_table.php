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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('idConsultas');
            $table->string('nombre_consultas');
            $table->text('descripcion');
            $table->date('f_consulta');
            $table->unsignedBigInteger('idPacientes');
            $table->unsignedBigInteger('idDoctores');
            $table->foreign('pacientes_id')->references('idPacientes')->on('pacientes')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('doctores_id')->references('idDoctores')->on('doctores')->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('consultas');
    }
};
