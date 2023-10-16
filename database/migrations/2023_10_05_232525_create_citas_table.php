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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('idCitas');
            $table->string('nombre_cita');
            $table->string('motivo');
            $table->date('fecha_cita');
            $table->unsignedInteger('idPacientes');
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
        Schema::dropIfExists('citas');
    }
};
