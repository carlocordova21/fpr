<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_proveedor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->string('descripcion')->unique();
            $table->decimal('precio_base', 8, 2);
            $table->string('descripcion_adicional');
            $table->decimal('precio_adicional', 8, 2);
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_proveedor');
    }
}
