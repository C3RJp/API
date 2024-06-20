<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->bigInteger('cedulaEmpleado');
            $table->bigInteger('cedulaCliente');
            $table->string('adicionales');
            $table->bigInteger('cuotas');
            $table->bigInteger('valorAdicional');
            $table->bigInteger('valorTotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
