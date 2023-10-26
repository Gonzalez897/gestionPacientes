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
        Schema::create('doctores', function (Blueprint $table) {
            $table->id('idDoctores');
            $table->unsignedBigInteger('idEmpleados');
            $table->foreign('idEmpleados')->references('idEmpleados')->on('empleados')->onUpdate('cascade')->onDelete('cascade');
            $table->string('especializacion');
            $table->string('disponibilidad');
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
        Schema::dropIfExists('doctores');
    }
};
